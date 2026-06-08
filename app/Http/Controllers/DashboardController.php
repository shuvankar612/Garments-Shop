<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $cartItems = Cart::count();

        $totalOrders = Order::count();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'cartItems',
            'totalOrders'
        ));
    }
}