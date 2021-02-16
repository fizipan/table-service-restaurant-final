<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->latest()->paginate(12);
        return view('pages.product', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function category($slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $categoryFirst = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with('category')->where('categories_id', $category->id)->latest()->paginate(12);

        return view('pages.product', [
            'products' => $products,
            'categories' => $categories,
            'categoryFirst' => $categoryFirst,
        ]);

    }
}
