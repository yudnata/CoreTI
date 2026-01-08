<?php

namespace App\Controllers\Customer;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(): void
    {
        $this->requireCustomer();
        $userId = $this->getUserId();
        $cartItems = Cart::getByUser($userId);
        $grandTotal = Cart::getTotal($userId);
        $cartCount = count($cartItems);
        $this->customerView('cart', [
            'title' => 'Cart - CoreTI',
            'cartItems' => $cartItems,
            'grandTotal' => $grandTotal,
            'cartCount' => $cartCount
        ]);
    }

    public function add(): void
    {
        $this->requireCustomer();
        $userId = $this->getUserId();
        $productName = $this->post('product_name');
        $productPrice = (int) $this->post('product_price');
        $productImage = $this->post('product_image');
        $productQuantity = (int) $this->post('product_quantity', 1);

        if (Cart::exists($userId, $productName)) {
            Session::flash('Product already in cart!', 'error');
        } else {
            Cart::add($userId, [
                'name' => $productName,
                'price' => $productPrice,
                'image' => $productImage,
                'quantity' => $productQuantity
            ]);
            Session::flash('Product added to cart!', 'success');
        }

        $referer = $_SERVER['HTTP_REFERER'] ?? url('/shop');
        header('Location: ' . $referer);
        exit;
    }

    public function update(): void
    {
        $this->requireCustomer();
        $cartId = (int) $this->post('cart_id');
        $quantity = (int) $this->post('cart_quantity', 1);
        if ($quantity < 1) {
            $quantity = 1;
        }
        Cart::updateQuantity($cartId, $quantity);
        Session::flash('Cart updated!', 'success');
        $this->redirect('/cart');
    }

    public function delete(string $id): void
    {
        $this->requireCustomer();
        Cart::delete((int) $id);
        Session::flash('Item removed from cart!', 'success');
        $this->redirect('/cart');
    }

    public function clear(): void
    {
        $this->requireCustomer();
        Cart::clearByUser($this->getUserId());
        Session::flash('Cart cleared!', 'success');
        $this->redirect('/cart');
    }

    private function getUserId(): int
    {
        return Session::getUserId() ?? 0;
    }
}
