<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // 
        $numberOfActiveProducts = Product::where('is_active', 1)->count();
        $numberOfInactiveProducts = Product::where('is_active', 0)->count();
        $numberOfOrdersDelivered = Order::where('status', 'delivered')->count();
        $numberOfCanceledOrders = Order::where('status', 'canceled')->count();

        return view('dashboard', compact('numberOfActiveProducts', 'numberOfInactiveProducts' ,'numberOfOrdersDelivered', 'numberOfCanceledOrders'));
    }

    public function showActiveProducts()
    {

        $activeProducts = Product::where('is_active', 1)->get();
        return view('dashboard.showActiveProducts', compact('activeProducts'));

    }

    public function showInactiveProducts()
    {

        $inactiveProducts = Product::where('is_active', 0)->get();
        return view('dashboard.showInactiveProducts', compact('inactiveProducts'));

    }

    public function showOrdersDelivered()
    {

        // Carregar os pedidos (orders) com os produtos relacionados
        $orders = Order::with('products')->where('status', 'delivered')->get();
        return view('dashboard.showOrdersDelivered', compact('orders'));

    }

    public function showCanceledOrders()
    {

        // Carregar os pedidos (orders) com os produtos relacionados
        $orders = Order::with('products')->where('status', 'canceled')->get();
        return view('dashboard.showCanceledOrders', compact('orders'));

    }
}
