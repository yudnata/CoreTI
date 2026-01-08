<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();
        $orders = Order::all();
        $this->adminView('orders', [
            'title' => 'Orders - Admin Panel',
            'orders' => $orders
        ]);
    }

    public function updateStatus(): void
    {
        $this->requireAdmin();
        $orderId = (int) $this->post('order_id');
        $status = $this->post('update_payment', '');

        if (empty($status)) {
            $this->redirectWith('/admin/orders', 'Please select a status.', 'error');
        }

        Order::updateStatus($orderId, $status);
        $this->redirectWith('/admin/orders', 'Order status updated!', 'success');
    }

    public function delete(string $id): void
    {
        $this->requireAdmin();
        Order::delete((int) $id);
        $this->redirectWith('/admin/orders', 'Order deleted successfully!', 'success');
    }
}
