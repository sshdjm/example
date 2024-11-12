<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

class OrderService
{
    public function createOrder()
    {
        $cart = Session::get('cart', []);
        $totalPrice = collect($cart)->reduce(function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $products = collect($cart)->map(function ($item) {
            return [
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ];
        });

        Order::create([
            'products' => $products->toArray(),
            'total_price' => $totalPrice,
        ]);

        Session::forget('cart');
    }

    public function getAllOrders()
    {
        $orders = Order::all();
        $totalOrdersPrice = $orders->sum('total_price');

        return [
            'orders' => $orders,
            'totalOrdersPrice' => $totalOrdersPrice,
        ];
    }
}
