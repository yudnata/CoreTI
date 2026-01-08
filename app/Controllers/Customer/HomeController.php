<?php

namespace App\Controllers\Customer;

use App\Core\Controller;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->requireCustomer();
        $products = Product::latest(6);
        $cartCount = Cart::countByUser($this->getUserId());
        $this->customerView('home', [
            'title' => 'Home - CoreTI',
            'products' => $products,
            'cartCount' => $cartCount
        ]);
    }

    public function about(): void
    {
        $this->requireCustomer();
        $cartCount = Cart::countByUser($this->getUserId());
        $this->customerView('about', [
            'title' => 'About Us - CoreTI',
            'cartCount' => $cartCount
        ]);
    }

    private function getUserId(): int
    {
        return \App\Core\Session::getUserId() ?? 0;
    }
}
