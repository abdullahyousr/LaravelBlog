<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Show all items in the user's cart
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        $items = $cart ? $cart->cartItems()->with('product')->get() : collect();
        return view('cart.index', compact('items'));
    }

    // Order all products in the cart
    public function order(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        DB::beginTransaction();
        try {
            $total = 0;
            $order = Order::create([
                'user_id' => $user->id,
                'total' => 0, // will update after items
            ]);
            foreach ($cart->cartItems as $cartItem) {
                $product = $cartItem->product;
                if ($product->stock < $cartItem->quantity) {
                    DB::rollBack();
                    return redirect()->route('cart.index')->with('error', 'Not enough stock for ' . $product->name);
                }
                $product->stock -= $cartItem->quantity;
                $product->save();
                $total += $cartItem->quantity * $product->price;
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $cartItem->quantity,
                    'price' => $product->price,
                ]);
            }
            $order->total = $total;
            $order->save();
            // Clear the cart
            $cart->cartItems()->delete();
            DB::commit();
            return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Order failed: ' . $e->getMessage());
        }
    }
} 