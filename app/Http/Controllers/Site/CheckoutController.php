<?php

namespace App\Http\Controllers\Site;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation
        $order = $this->orderRepository->storeOrderDetails($request->all());

        return redirect()->back();
    }
}
