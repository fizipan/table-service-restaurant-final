<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $products = Product::count();
        $orders = Order::count();
        $carts = Cart::count();

        $orderRecent = Order::with('table')->latest()->take(3)->get();

        return view('pages.waiter.dashboard', [
            'products' => $products,
            'orders' => $orders,
            'carts' => $carts,
            'orderRecent' => $orderRecent,
        ]);
    }
}
