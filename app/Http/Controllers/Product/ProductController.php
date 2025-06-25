<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::paginate(12);
        return view('products.index', compact('products'));
    }

    // Add a product to the authenticated user's cart
    public function addToCart(Request $request, Product $product)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Find or create an active cart for the user
        $cart = Cart::firstOrCreate([
            'user_id' => $user->id,
        ]);

        // Add or update the cart item
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product added to cart!');
    }
} 