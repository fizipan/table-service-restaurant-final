<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->take(4)->get();
        return view('pages.home', [
            'products' => $products,
        ]);
    }
}
