<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function deliveryStatus(Request $request)
    {
        $data = $request->validate([
            'order_ids' => ['required', 'array', 'min:1'],
            'order_ids.*' => ['integer', 'exists:orders,id'],
        ]);

        $orders = Order::whereIn('id', $data['order_ids'])
            ->get(['id', 'delivery_status']);

        return response()->json([
            'accepted' => $orders->isNotEmpty()
                && $orders->every(fn (Order $order) => in_array($order->delivery_status, ['accepted', 'completed'], true)),
        ]);
    }

    /**
     * Store checkout order
     */
    public function store(Request $request)
    {
        // =====================================================
        // VALIDATION
        // =====================================================
        $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_phone'   => 'required|string|max:50',
            'customer_email'   => 'nullable|email|max:255',
            'customer_address' => 'required|string',
            'customer_city'    => 'required|string|max:255',
            'postal_code'      => 'nullable|string|max:20',
            'delivery_date'    => 'nullable|date',
            'order_notes'      => 'nullable|string',
        ]);

        // =====================================================
        // GET CART
        // =====================================================
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty.'
            ], 400);
        }

        DB::beginTransaction();
        
        try {
            $orders = [];

            // =================================================
            // LOOP ALL CART ITEMS
            // =================================================
            foreach ($cart as $cartId => $item) {
                
                $category = $this->getCategory($cartId, $item);
                $quantity = (int) ($item['quantity'] ?? 0);
                $price    = (float) ($item['price'] ?? 0);

                if ($quantity <= 0) {
                    continue;
                }

                // Extract Product ID ពី Cart ID (ឧទាហរណ៍៖ vegetable_5 => 5)
                $productId = $this->getProductIdFromCartId($cartId, $item);

                // =============================================
                // ADDED: REDUCE STOCK LOGIC (កាត់ស្តុក)
                // =============================================
                if ($productId) {
                    // ទាញយក Model Class ផ្អែកតាម Category
                    $modelClass = $this->getModelClassByCategory($category);

                    if ($modelClass && class_exists($modelClass)) {
                        // ប្រើ lockForUpdate() ដើម្បីការពារ Race Condition
                        $product = $modelClass::where('id', $productId)->lockForUpdate()->first();

                        if ($product) {
                            // ផ្ទៀងផ្ទាត់ស្តុកមុននឹងកាត់
                            if ($product->qty < $quantity) {
                                DB::rollBack();
                                return response()->json([
                                    'success' => false,
                                    'message' => "ផលិតផល '{$product->name}' មិនមានស្តុកគ្រប់គ្រាន់ទេ! (សល់ត្រឹម: {$product->qty})"
                                ], 400);
                            }

                            // កាត់ស្តុក: qty(old) - qty(new)
                            $product->decrement('qty', $quantity);
                        }
                    }
                }

                // =============================================
                // TOTAL & CREATE ORDER
                // =============================================
                $totalPrice = $price * $quantity;

                $order = Order::create([
                    'customer_name'    => $request->customer_name,
                    'customer_phone'   => $request->customer_phone,
                    'customer_email'   => $request->customer_email,
                    'customer_address' => $request->customer_address,
                    'customer_city'    => $request->customer_city,
                    'postal_code'      => $request->postal_code,
                    'delivery_date'    => $request->delivery_date,
                    'order_notes'      => $request->order_notes,
                    'category'          => $category,
                    'item_name'         => $item['name'] ?? 'Unknown Product',
                    'quantity'          => $quantity,
                    'total_price'       => $totalPrice,
                ]);

                $orders[] = $order;
            }

            // CHECK ORDERS
            if (empty($orders)) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => 'No valid products found in cart.'
                ], 400);
            }

            // COMMIT & CLEAR CART
            DB::commit();
            session()->forget('cart');

            return response()->json([
                'success' => true,
                'message' => 'Order placed successfully!',
                'orders'  => $orders,
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Map Category to Eloquent Model Class
     */
    private function getModelClassByCategory(string $category): ?string
    {
        return match ($category) {
            'Vegetable'   => \App\Models\Vegetable::class,
            'Fresh Nut'   => \App\Models\FreshNut::class,
            'Fruit'       => \App\Models\Fruit::class,
            'Egg'         => \App\Models\Egg::class,
            'Farm Animal' => \App\Models\Farm_Animal::class,
            default       => null,
        };
    }

    /**
     * Helper to extract real ID from cart item or cart ID key
     */
    private function getProductIdFromCartId(string $cartId, array $item): ?int
    {
        if (isset($item['id']) && is_numeric($item['id'])) {
            return (int) $item['id'];
        }

        // ឧទាហរណ៍៖ "vegetable_12" ឬ "fresh-nut_5" => ទាញយក 12 ឬ 5
        if (preg_match('/_(\d+)$/', $cartId, $matches)) {
            return (int) $matches[1];
        }

        return null;
    }

    /**
     * Detect product category
     */
    private function getCategory(string $cartId, array $item): string
    {
        $model = strtolower(trim($item['model'] ?? ''));

        if ($model !== '') {
            return match ($model) {
                'vegetable', 'vegetables' => 'Vegetable',
                'freshnut', 'fresh_nut', 'fresh-nut', 'fresh nuts', 'fresh nut' => 'Fresh Nut',
                'fruit', 'fruits' => 'Fruit',
                'egg', 'eggs' => 'Egg',
                'farmanimal', 'farm_animal', 'farm-animal', 'farm animals', 'farm animal' => 'Farm Animal',
                default => $this->categoryFromCartId($cartId),
            };
        }

        return $this->categoryFromCartId($cartId);
    }

    /**
     * Detect category from cart ID
     */
    private function categoryFromCartId(string $cartId): string
    {
        $id = strtolower(trim($cartId));

        if (str_starts_with($id, 'vegetable_') || str_starts_with($id, 'vegetable-')) {
            return 'Vegetable';
        }
        if (str_starts_with($id, 'freshnut_') || str_starts_with($id, 'freshnut-') || str_starts_with($id, 'fresh_nut_') || str_starts_with($id, 'fresh-nut_') || str_starts_with($id, 'fresh-nut-')) {
            return 'Fresh Nut';
        }
        if (str_starts_with($id, 'fruit_') || str_starts_with($id, 'fruit-')) {
            return 'Fruit';
        }
        if (str_starts_with($id, 'egg_') || str_starts_with($id, 'egg-')) {
            return 'Egg';
        }
        if (str_starts_with($id, 'farmanimal_') || str_starts_with($id, 'farmanimal-') || str_starts_with($id, 'farm_animal_') || str_starts_with($id, 'farm-animal_') || str_starts_with($id, 'farm-animal-')) {
            return 'Farm Animal';
        }

        return 'Product';
    }
}
