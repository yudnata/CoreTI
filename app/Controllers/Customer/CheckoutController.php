<?php

namespace App\Controllers\Customer;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Cart;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index(): void
    {
        $this->requireCustomer();
        $userId = $this->getUserId();
        $cartItems = Cart::getByUser($userId);
        $grandTotal = Cart::getTotal($userId);
        $cartCount = count($cartItems);

        if ($cartCount === 0) {
            $this->redirectWith('/shop', 'Your cart is empty!', 'error');
        }

        $this->customerView('checkout', [
            'title' => 'Checkout - CoreTI',
            'cartItems' => $cartItems,
            'grandTotal' => $grandTotal,
            'cartCount' => $cartCount
        ]);
    }

    public function placeOrder(): void
    {
        $this->requireCustomer();
        $userId = $this->getUserId();
        $cartSummary = Cart::getSummary($userId);

        if ($cartSummary['total'] === 0) {
            $this->redirectWith('/shop', 'Your cart is empty!', 'error');
        }

        $address = sprintf(
            'flat no. %s, %s, %s, %s - %s',
            $this->post('flat', ''),
            $this->post('street', ''),
            $this->post('city', ''),
            $this->post('country', ''),
            $this->post('pin_code', '')
        );

        $orderData = [
            'user_id' => $userId,
            'name' => trim($this->post('name', '')),
            'number' => $this->post('number', ''),
            'email' => trim($this->post('email', '')),
            'method' => $this->post('method', 'cash on delivery'),
            'address' => $address,
            'total_products' => $cartSummary['products_string'],
            'total_price' => $cartSummary['total'],
            'placed_on' => date('d-M-Y'),
            'payment_status' => 'pending'
        ];

        if (Order::isDuplicate($orderData)) {
            $this->redirectWith('/orders', 'Order already placed!', 'error');
        }

        Order::create($orderData);
        Cart::clearByUser($userId);
        $this->redirectWith('/orders', 'Order placed successfully!', 'success');
    }

    private function getUserId(): int
    {
        return Session::getUserId() ?? 0;
    }
}
