<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        $this->cartService->addToCart($request);

        return redirect()->back()->with('success', 'Товар добавлен в корзину');
    }

    public function getCart()
    {
        $data = $this->cartService->getCart();

        return view('cart.index', $data);
    }
}
