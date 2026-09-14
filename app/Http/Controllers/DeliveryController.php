<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DeliveryController extends Controller
{
    /**
     * List all delivery orders (admin view)
     */
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = Order::query();

        if ($status) {
            $query->where('delivery_status', $status);
        }

        $orders = $query->latest()->get();

        $grouped = $orders->groupBy(function ($order) {
            return md5($order->customer_name . '|' . $order->customer_phone . '|' . $order->customer_address . '|' . $order->customer_city . '|' . ($order->delivery_date ? $order->delivery_date->format('Y-m-d') : ''));
        })->map(function ($items) {
            return $items->sortBy('created_at');
        });

        $page = $request->get('page', 1);
        $perPage = 15;
        $paginatedItems = $grouped->forPage($page, $perPage);
        $total = $grouped->count();

        $groupedOrders = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedItems,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admincontroll.delivery', compact('groupedOrders', 'status'));
    }


    /**
     * Update the delivery status of an order and all orders in the same group
     */
    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'delivery_status' => ['required', Rule::in(['waiting', 'accepted', 'completed'])],
        ]);

        $query = Order::where('customer_name', $order->customer_name)
            ->where('customer_phone', $order->customer_phone)
            ->where('customer_address', $order->customer_address)
            ->where('customer_city', $order->customer_city);

        if ($order->delivery_date) {
            $query->whereDate('delivery_date', $order->delivery_date);
        } else {
            $query->whereNull('delivery_date');
        }

        $query->update(['delivery_status' => $data['delivery_status']]);

        return back()->with('success', 'Delivery status updated.');
    }


    /**
     * =========================================================
     *  DELIVERY STATUS — Customer polling endpoint
     *
     *  Placed LAST because it's a public endpoint used by the
     *  checkout page to detect when the admin has accepted
     *  the order so it can show the QR payment modal.
     *
     *  Route: GET /orders/delivery-status
     *  Name:  orders.delivery-status
     * =========================================================
     */
    public function deliveryStatus(Request $request)
    {
        $orderIds = $request->input('order_ids', []);

        $orders = Order::whereIn('id', $orderIds)->get();

        $accepted = $orders->isNotEmpty() && $orders->every(function ($order) {
            return in_array($order->delivery_status, ['accepted', 'completed'], true);
        });

        return response()->json([
            'accepted' => $accepted,
        ]);
    }
}   