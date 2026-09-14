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
        $merchantName  = config('services.bakong.merchant_name');
        $merchantCity  = config('services.bakong.merchant_city');

        // Tag 00: Payload Format Indicator
        $payload = $this->tlv('00', '01');

        // Tag 01: Point of Initiation (12 = dynamic QR with amount)
        $payload .= $this->tlv('01', '12');

        // Tag 29: Merchant Account Information (Bakong)
        $merchantAccount  = $this->tlv('00', config('services.bakong.merchant_id', 'khqr@dev.bakong'));
        $merchantAccount .= $this->tlv('01', $bakongId);
        $payload .= $this->tlv('29', $merchantAccount);

        // Tag 52: Merchant Category Code
        $payload .= $this->tlv('52', '5999');

        // Tag 53: Transaction Currency (840 = USD, 116 = KHR)
        $currencyCode = strtoupper($currency) === 'KHR' ? '116' : '840';
        $payload .= $this->tlv('53', $currencyCode);

        // Tag 54: Transaction Amount
        $payload .= $this->tlv('54', number_format($amount, 2, '.', ''));

        // Tag 58: Country Code
        $payload .= $this->tlv('58', 'KH');

        // Tag 59: Merchant Name
        $payload .= $this->tlv('59', mb_substr($merchantName, 0, 25));

        // Tag 60: Merchant City
        $payload .= $this->tlv('60', mb_substr($merchantCity, 0, 15));

        // Tag 62: Additional Data (Bill Number)
        if ($billNumber !== '') {
            $additional = $this->tlv('01', mb_substr($billNumber, 0, 25));
            $payload .= $this->tlv('62', $additional);
        }

        // Tag 63: CRC16 — MUST be computed BEFORE appending 6304
        $crc = $this->crc16($payload);
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