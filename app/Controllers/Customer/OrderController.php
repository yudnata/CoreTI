<?php

namespace App\Controllers\Customer;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function index(): void
    {
        $this->requireCustomer();
        $userId = $this->getUserId();
        $orders = Order::getByUser($userId);
        $cartCount = Cart::countByUser($userId);
        $this->customerView('orders', [
            'title' => 'Orders - CoreTI',
            'orders' => $orders,
            'cartCount' => $cartCount
        ]);
    }

    private function getUserId(): int
    {
        return Session::getUserId() ?? 0;
    }
}
