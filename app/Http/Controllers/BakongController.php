<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use KHQR\BakongKHQR;
use KHQR\Helpers\KHQRData;
use KHQR\Models\IndividualInfo;

class BakongController extends Controller
{
    /**
     * Generate a Bakong KHQR code.
     */
    public function generate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'ref'    => 'nullable|string|max:25',
        ]);

        try {
            // =====================================================
            // CONFIG
            // =====================================================
            $accountId    = config('bakong.account_id');
            $merchantName = config('bakong.merchant_name', 'Farm Fresh');
            $merchantCity = config('bakong.merchant_city', 'PHNOM PENH');
            $currency     = strtoupper(config('bakong.currency', 'USD'));
            $token        = config('bakong.token');

            if (empty($accountId)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bakong Account ID is missing. Check BAKONG_ACCOUNT_ID in .env',
                ], 500);
            }

            // =====================================================
            // AMOUNT (must be float)
            // =====================================================
            $amount = (float) round((float) $request->amount, 2);

            // =====================================================
            // REFERENCE
            // =====================================================
            $reference = $request->ref ?: 'FF-' . substr((string) time(), -8);

            // =====================================================
            // CURRENCY (int constant)
            // =====================================================
            $khqrCurrency = ($currency === 'KHR')
                ? KHQRData::CURRENCY_KHR
                : KHQRData::CURRENCY_USD;

            if ($currency !== 'KHR') {
                $currency = 'USD';
            }

            // =====================================================
            // INDIVIDUAL INFO
            // =====================================================
            // Exact positional signature from the vendor package:
            //   #1  string  $bakongAccountID
            //   #2  string  $merchantName
            //   #3  string  $merchantCity
            //   #4  ?string $acquiringBank
            //   #5  ?string $accountInformation
            //   #6  ?int    $currency
            //   #7  float   $amount
            //   #8  ?string $billNumber
            //   #9  ?string $storeLabel
            //   #10 ?string $terminalLabel
            //   #11 ?string $mobileNumber
            //   #12 ?string $purposeOfTransaction
            //   #13 ?string $languagePreference
            //   #14 ?string $merchantNameAlternateLanguage
            //   #15 ?string $merchantCityAlternateLanguage
            //   #16 ?string $upiMerchantAccount
            // =====================================================
        $individualInfo = new IndividualInfo(
    $accountId,        // #1
    $merchantName,     // #2
    $merchantCity,     // #3
    null,              // #4  acquiringBank
    null,              // #5  accountInformation
    $khqrCurrency,     // #6  currency
    (float) $amount,   // #7  amount
    null,              // #8  billNumber
    null,              // #9  storeLabel
    null,              // #10 terminalLabel
    null,              // #11 mobileNumber
    null,              // #12 purposeOfTransaction
    null,              // #13 languagePreference
    null,              // #14 merchantNameAlternateLanguage
    null,              // #15 merchantCityAlternateLanguage
    null               // #16 upiMerchantAccount
);

            // =====================================================
            // GENERATE
            // =====================================================
            $bakong = new BakongKHQR($token);
            $result = $bakong->generateIndividual($individualInfo);

            Log::info('BAKONG GENERATE RESULT', ['result' => $result]);

            // =====================================================
            // PARSE THE KHQRResponse WRAPPER
            // =====================================================
            // The package wraps the response inside a
            // KHQRResponse object. Its properties are exposed
            // as a JSON string under the key:
            //   "KHQR\Models\KHQRResponse"
            // =====================================================
            $decoded = $this->decodeKhqrResponse($result);

            if (!is_array($decoded)) {
                Log::error('BAKONG RESPONSE UNPARSEABLE', ['result' => $result]);

                return response()->json([
                    'success' => false,
                    'message' => 'Bakong returned an unrecognizable response.',
                ], 422);
            }

            // =====================================================
            // CHECK STATUS
            // =====================================================
            $statusCode = $decoded['status']['code'] ?? null;

            if ($statusCode !== 0) {
                $message = $decoded['status']['message']
                    ?? $decoded['status']['errorCode']
                    ?? 'Bakong KHQR generation failed.';

                Log::error('BAKONG GENERATE ERROR', [
                    'status' => $decoded['status'] ?? null,
                    'data'   => $decoded['data']   ?? null,
                ]);

                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'status'  => $decoded['status'] ?? null,
                ], 422);
            }

            // =====================================================
            // EXTRACT QR + MD5
            // =====================================================
            $data = $decoded['data'] ?? null;

            if (!is_array($data) || empty($data['qr']) || empty($data['md5'])) {
                Log::error('BAKONG DATA INVALID', ['data' => $data]);

                return response()->json([
                    'success' => false,
                    'message' => 'Bakong did not return a valid QR/MD5.',
                    'debug'   => $data,
                ], 422);
            }

            Log::info('BAKONG QR SUCCESS', [
                'amount'    => $amount,
                'currency'  => $currency,
                'reference' => $reference,
                'md5'       => $data['md5'],
            ]);

            return response()->json([
                'success'   => true,
                'qr'        => $data['qr'],
                'md5'       => $data['md5'],
                'amount'    => $amount,
                'currency'  => $currency,
                'reference' => $reference,
            ]);

        } catch (\Throwable $e) {

            Log::error('BAKONG GENERATE EXCEPTION', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Bakong QR generation failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Check a Bakong transaction by its MD5.
     */
    public function check(Request $request)
    {
        $request->validate([
            'md5' => ['required', 'string', 'regex:/^[a-fA-F0-9]{32}$/'],
        ]);

        try {
            $token = config('bakong.token');

            if (empty($token)) {
                return response()->json([
                    'success' => false,
                    'is_paid' => false,
                    'message' => 'BAKONG_TOKEN is missing in .env',
                ], 500);
            }

            $bakong = new BakongKHQR($token);
            $result = $bakong->checkTransactionByMD5($request->md5);

            Log::info('BAKONG PAYMENT CHECK', [
                'md5'    => $request->md5,
                'result' => $result,
            ]);

            $isPaid = false;
            $status = 'PENDING';

            // =====================================================
            // PARSE RESPONSE
            // =====================================================
            // Bakong returns either:
            //   { responseCode: 0, data: { status: "PAID" } }   (paid)
            //   { responseCode: 1, data: null }                 (not yet)
            // =====================================================

            $responseCode = null;
            $data         = null;

            if (is_object($result)) {
                // Preferred: direct properties
                if (property_exists($result, 'responseCode')) {
                    $responseCode = $result->responseCode;
                    $data         = $result->data ?? null;
                } else {
                    // Fallback: try the KHQRResponse wrapper
                    $decoded = $this->decodeKhqrResponse($result);

                    if (is_array($decoded)) {
                        $responseCode = $decoded['responseCode']
                            ?? $decoded['status']['code']
                            ?? null;

                        $data = $decoded['data'] ?? null;
                    }
                }
            }

            if ($responseCode === 0 && is_array($data)) {
                $txStatus = $data['status']
                    ?? $data['transactionStatus']
                    ?? null;

                if ($txStatus) {
                    $status = strtoupper(trim((string) $txStatus));
                    $isPaid = in_array($status, ['PAID', 'SUCCESS', 'COMPLETED'], true);
                }
            }

            return response()->json([
                'success' => true,
                'is_paid' => $isPaid,
                'status'  => $status,
                'md5'     => $request->md5,
            ]);

        } catch (\Throwable $e) {

            Log::error('BAKONG CHECK EXCEPTION', [
                'md5'     => $request->md5,
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);

            return response()->json([
                'success' => false,
                'is_paid' => false,
                'message' => 'Unable to check Bakong payment.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Decode the KHQRResponse wrapper returned by the
     * bakong-khqr-php package. The package stores its
     * payload inside a JSON string under the key
     * "KHQR\Models\KHQRResponse".
     */
    private function decodeKhqrResponse($result): ?array
    {
        if (!is_object($result)) {
            return null;
        }

        // 1. Try the exact wrapper key
        if (isset($result->{'KHQR\\Models\\KHQRResponse'})) {
            $raw = $result->{'KHQR\\Models\\KHQRResponse'};
            $decoded = json_decode($raw, true);

            if (is_array($decoded)) {
                return $decoded;
            }
        }

        // 2. Fallback: scan all properties for a JSON string
        $arr = (array) $result;

        foreach ($arr as $value) {
            if (is_string($value) && str_starts_with(trim($value), '{')) {
                $candidate = json_decode($value, true);

                if (is_array($candidate)
                    && (isset($candidate['status']) || isset($candidate['data']))
                ) {
                    return $candidate;
                }
            }
        }

        // 3. Last resort: treat as-is if it already has status/data
        if (isset($arr['status']) || isset($arr['data'])) {
            return $arr;
        }

        return null;
    }
}