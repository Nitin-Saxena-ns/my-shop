<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function history()
    {
        $orders = Order::with('orderItems.product')
                       ->where('user_id', Auth::id())
                       ->latest()
                       ->get();

        return view('frontend.order-history', compact('orders'));
    }
     public function success()
    {
        return view('frontend.success');
    }
}
