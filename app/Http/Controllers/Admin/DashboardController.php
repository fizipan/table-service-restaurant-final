<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Product::count();
        $meja = Table::count();
        $user = User::count();
        $menuRecent = Product::with('category')->latest()->take(3)->get();
        return view('pages.admin.dashboard', [
            'menu' => $menu,
            'meja' => $meja,
            'user' => $user,
            'menuRecent' => $menuRecent,

        ]);
    }
}
