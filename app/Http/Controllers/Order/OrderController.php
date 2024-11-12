<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createOrder()
    {
        $this->orderService->createOrder();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан');
    }

    public function index()
    {
        $data = $this->orderService->getAllOrders();

        return view('orders.index', $data);
    }
}
