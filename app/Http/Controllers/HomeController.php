<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::take(6)->get(); // Show latest 6 products (simulating 'limit 6')
        return view('home', compact('products'));
    }

    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
