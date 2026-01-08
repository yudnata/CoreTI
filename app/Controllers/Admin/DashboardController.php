<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();
        $stats = [
            'total_pendings' => Order::getTotalByStatus('pending'),
            'total_completed' => Order::getTotalByStatus('completed'),
            'total_orders' => Order::count(),
            'total_products' => Product::count(),
            'total_users' => User::countByType('user'),
            'total_admins' => User::countByType('admin'),
            'total_accounts' => User::count(),
            'total_messages' => Message::count()
        ];
        $this->adminView('dashboard', [
            'title' => 'Dashboard - Admin Panel',
            'stats' => $stats
        ]);
    }
}
