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
            // FIX: use NAMED arguments matching the package's own
            // documented API (see https://github.com/fidele007/bakong-khqr-php
            // and its forks — every published example uses named args,
            // never a 16-positional constructor). Using named args also
            // means that if YOUR installed version's IndividualInfo has
            // different/renamed parameters, PHP throws an immediate,
            // readable "Unknown named parameter" error here instead of
            // silently shifting values into the wrong fields and
            // producing a QR that "generates" but won't scan.
            //
            // If this throws that error for you, open
            // vendor/<package>/src/Models/IndividualInfo.php and match
            // this call to whatever __construct() actually declares —
            // paste it here and I'll fix the exact names.
            $individualInfoArgs = [
                'bakongAccountID' => $accountId,
                'merchantName'    => $merchantName,
                'merchantCity'    => $merchantCity,
                'currency'        => $khqrCurrency,
                'amount'          => $amount,
            ];

            // Some versions (v1.1.0+ of fidele007/bakong-khqr-php) REQUIRE
            // expirationTimestamp (ms since epoch, as a string) for any
            // dynamic KHQR (i.e. one that carries an amount). Harmless to
            // include even on versions where it's optional.
            if (property_exists(IndividualInfo::class, 'expirationTimestamp')
                || (new \ReflectionMethod(IndividualInfo::class, '__construct'))
                    ->getNumberOfParameters() > 0
            ) {
                $ctorParams = array_map(
                    fn ($p) => $p->getName(),
                    (new \ReflectionMethod(IndividualInfo::class, '__construct'))->getParameters()
                );

                if (in_array('expirationTimestamp', $ctorParams, true)) {
                    $individualInfoArgs['expirationTimestamp'] = (string) (
                        (int) floor(microtime(true) * 1000) + 5 * 60 * 1000 // valid 5 minutes
                    );
                }
            }

            $individualInfo = new IndividualInfo(...$individualInfoArgs);

            // =====================================================
            // GENERATE
            // =====================================================
            // NOTE: every published example calls this STATICALLY —
            // BakongKHQR::generateIndividual($individualInfo) — with no
            // token needed (a token is only required for API calls like
            // checkTransactionByMD5). If `new BakongKHQR($token)` below
            // throws, switch to the static call form.
            $bakong = new BakongKHQR($token);
            $result = $bakong->generateIndividual($individualInfo);

            Log::info('BAKONG GENERATE RESULT', ['result' => $result]);

            // =====================================================
            // PARSE THE KHQRResponse WRAPPER
            // =====================================================
            // KHQRResponse exposes plain public "status" and "data"
            // properties (see package docs) — decodeKhqrResponse's final
            // fallback (casting to array) already handles this correctly,
            // left as-is below.
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

            $responseCode = null;
            $data         = null;

            // checkTransactionByMD5() is typed to return array<string,mixed>
            // Handle both array (normal) and object (fallback) responses.
            if (is_array($result)) {
                $responseCode = $result['responseCode'] ?? null;
                $data         = $result['data'] ?? null;
            } elseif (is_object($result)) {
                if (property_exists($result, 'responseCode')) {
                    $responseCode = $result->responseCode;
                    $data         = $result->data ?? null;
                } else {
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
     * Decode the KHQRResponse wrapper returned by the bakong-khqr-php
     * package. In every published version, KHQRResponse simply has
     * public "status" and "data" properties — so (array) $result
     * already yields the right shape and step 3 below is what actually
     * runs. Steps 1-2 are speculative fallbacks kept for safety but are
     * not expected to match a real response.
     */
    private function decodeKhqrResponse($result): ?array
    {
        if (!is_object($result)) {
            return null;
        }

        if (isset($result->{'KHQR\\Models\\KHQRResponse'})) {
            $raw = $result->{'KHQR\\Models\\KHQRResponse'};
            $decoded = json_decode($raw, true);

            if (is_array($decoded)) {
                return $decoded;
            }
        }

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

        if (isset($arr['status']) || isset($arr['data'])) {
            return $arr;
        }

        return null;
    }
}