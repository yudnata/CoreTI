<?php

namespace App\Controllers\Customer;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Product;
use App\Models\Cart;

class ShopController extends Controller
{
    public function index(): void
    {
        $this->requireCustomer();
        if ($this->post('add_to_cart')) {
            $this->addToCart();
        }
        $products = Product::all();
        $cartCount = Cart::countByUser($this->getUserId());
        $this->customerView('shop', [
            'title' => 'Shop - CoreTI',
            'products' => $products,
            'cartCount' => $cartCount
        ]);
    }

    public function search(): void
    {
        $this->requireCustomer();
        if ($this->post('add_to_cart')) {
            $this->addToCart();
        }
        $keyword = $this->post('search', $this->get('q', ''));
        $products = [];
        $searched = false;
        if (!empty($keyword)) {
            $products = Product::search($keyword);
            $searched = true;
        }
        $cartCount = Cart::countByUser($this->getUserId());
        $this->customerView('search', [
            'title' => 'Search - CoreTI',
            'products' => $products,
            'keyword' => $keyword,
            'searched' => $searched,
            'cartCount' => $cartCount
        ]);
    }

    private function addToCart(): void
    {
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
    }

    private function getUserId(): int
    {
        return Session::getUserId() ?? 0;
    }
}
