<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BakongKhqrService
{
    /**
     * Generate a full KHQR payload string (EMVCo-compliant)
     * that Bakong apps can scan.
     */
    public function generateKhqr(
        float  $amount,
        string $currency = 'USD',
        string $billNumber = ''
    ): string {
        $bakongId      = config('services.bakong.account_id');
        $merchantName  = $this->sanitizeAscii(config('services.bakong.merchant_name'), 25);
        $merchantCity  = $this->sanitizeAscii(config('services.bakong.merchant_city'), 15);

        // Tag 00: Payload Format Indicator
        $payload = $this->tlv('00', '01');

        // Tag 01: Point of Initiation (12 = dynamic QR with amount)
        $payload .= $this->tlv('01', '12');

        // Tag 29: Merchant Account Information (Bakong)
        //
        // NOTE: double-check this sub-tag order (00/01) against NBC's
        // official KHQR sample/SDK for your account type. Different
        // reference implementations disagree on whether sub-00 is a
        // fixed GUID or the account ID itself — if the CRC fix below
        // doesn't fully resolve scanning, this is the next thing to
        // verify against the spec document you were given when you
        // registered for Bakong.
        $merchantAccount  = $this->tlv('00', config('services.bakong.merchant_id', 'khqr@dev.bakong'));
        $merchantAccount .= $this->tlv('01', $bakongId);
        $payload .= $this->tlv('29', $merchantAccount);

        // Tag 52: Merchant Category Code
        $payload .= $this->tlv('52', '5999');

        // Tag 53: Transaction Currency (840 = USD, 116 = KHR)
        $currencyCode = strtoupper($currency) === 'KHR' ? '116' : '840';
        $payload .= $this->tlv('53', $currencyCode);

        // Tag 54: Transaction Amount
        // KHR has no decimal places on Bakong; USD uses 2.
        $amountString = strtoupper($currency) === 'KHR'
            ? (string) (int) round($amount)
            : number_format($amount, 2, '.', '');
        $payload .= $this->tlv('54', $amountString);

        // Tag 58: Country Code
        $payload .= $this->tlv('58', 'KH');

        // Tag 59: Merchant Name
        $payload .= $this->tlv('59', $merchantName);

        // Tag 60: Merchant City
        $payload .= $this->tlv('60', $merchantCity);

        // Tag 62: Additional Data (Bill Number)
        if ($billNumber !== '') {
            $additional = $this->tlv('01', $this->sanitizeAscii($billNumber, 25));
            $payload .= $this->tlv('62', $additional);
        }

        // Tag 63: CRC16
        //
        // FIX: the checksum must be computed over the payload PLUS the
        // literal "6304" prefix (tag+length of the CRC field itself),
        // not over the bare payload. This was the bug — every QR you
        // generated had an invalid checksum because these 4 characters
        // were missing from the CRC input.
        $crc = $this->crc16($payload . '6304');
        $payload .= '6304' . $crc;

        return $payload;
    }

    /**
     * TLV encoder.
     */
    private function tlv(string $id, string $value): string
    {
        return $id . str_pad((string) strlen($value), 2, '0', STR_PAD_LEFT) . $value;
    }

    /**
     * CRC-16/CCITT-FALSE (required by EMVCo / KHQR).
     */
    private function crc16(string $data): string
    {
        $crc = 0xFFFF;
        for ($i = 0; $i < strlen($data); $i++) {
            $crc ^= ord($data[$i]) << 8;
            for ($j = 0; $j < 8; $j++) {
                $crc = ($crc & 0x8000) ? (($crc << 1) ^ 0x1021) : ($crc << 1);
                $crc &= 0xFFFF;
            }
        }
        return strtoupper(str_pad(dechex($crc), 4, '0', STR_PAD_LEFT));
    }

    /**
     * KHQR text fields must be plain ASCII. Khmer script, emoji, or
     * accented characters in merchant name/city/bill number will
     * silently corrupt the TLV length bytes for that field and can
     * break parsing for the rest of the string.
     */
    private function sanitizeAscii(string $value, int $maxLength): string
    {
        $ascii = preg_replace('/[^\x20-\x7E]/', '', $value ?? '');
        return mb_substr(trim($ascii), 0, $maxLength);
    }

    /**
     * MD5 hash of the KHQR string (used by Bakong API to track transactions).
     */
    public function md5(string $khqr): string
    {
        return md5($khqr);
    }

    /**
     * Check payment status via Bakong Open API.
     */
    public function checkTransaction(string $md5): array
    {
        $token = config('services.bakong.token');
        $url   = rtrim(config('services.bakong.api_url'), '/')
               . '/v1/check_transaction_by_md5';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Content-Type'  => 'application/json',
            ])->post($url, ['md5' => $md5]);

            return [
                'success' => $response->successful(),
                'code'    => $response->status(),
                'data'    => $response->json(),
            ];
        } catch (\Throwable $e) {
            Log::error('Bakong check failed', ['error' => $e->getMessage()]);
            return [
                'success' => false,
                'code'    => 500,
                'data'    => ['error' => $e->getMessage()],
            ];
        }
    }
}