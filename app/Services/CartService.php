<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ];
        }

        Session::put('cart', $cart);
    }

    public function getCart()
    {
        $cartItems = Session::get('cart', []);
        $totalPrice = collect($cartItems)->reduce(function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ];
    }
}
