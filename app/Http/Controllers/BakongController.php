<?php

namespace App\Http\Controllers;

use App\Providers\BakongKhqrService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BakongController extends Controller
{
    public function __construct(
        protected BakongKhqrService $khqr
    ) {}

    public function pay(Request $request)
    {
        $amount   = (float) $request->query('amount', 0);
        $orderIds = (array) $request->query('order_ids', []);

        abort_if($amount <= 0, 400, 'Invalid amount.');

        return view('pages.bakong-pay', [
            'amount'   => $amount,
            'orderIds' => $orderIds,
        ]);
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'ref'    => 'nullable|string|max:25',
        ]);

        $amount = (float) $validated['amount'];
        $ref    = $validated['ref'] ?? ('FF-' . now()->format('YmdHis'));

        $khqr = $this->khqr->generateKhqr($amount, 'USD', $ref);
        $md5  = $this->khqr->md5($khqr);

        Cache::put("bakong_payment_{$md5}", [
            'ref'    => $ref,
            'amount' => $amount,
            'status' => 'pending',
        ], now()->addMinutes(30));

        return response()->json([
            'success'   => true,
            'khqr'      => $khqr,
            'md5'       => $md5,
            'reference' => $ref,
            'qr_image'  => 'https://api.qrserver.com/v1/create-qr-code/'
                          . '?size=440x440&margin=10&data=' . urlencode($khqr),
        ]);
    }

    public function check(Request $request)
    {
        $validated = $request->validate([
            'md5' => 'required|string|size:32',
        ]);

        $result = $this->khqr->checkTransaction($validated['md5']);

        $isPaid = false;
        if ($result['success'] && isset($result['data']['responseCode'])) {
            $isPaid = ((int) $result['data']['responseCode']) === 0;
        }

        if ($isPaid) {
            Cache::put(
                "bakong_payment_{$validated['md5']}.status",
                'paid',
                now()->addMinutes(30)
            );
        }

        return response()->json([
            'success' => true,
            'is_paid' => $isPaid,
            'data'    => $result['data'] ?? null,
        ]);
    }
}