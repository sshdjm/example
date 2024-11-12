<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $orders = Order::all();
        $totalOrdersPrice = $orders->sum('total_price');

        return view('admin.index', compact('orders', 'totalOrdersPrice'));
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Заказ успешно удален');
    }

}
