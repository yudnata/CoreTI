<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();
        $products = Product::all();
        $updateProduct = null;
        if (isset($_GET['update'])) {
            $updateProduct = Product::find((int) $_GET['update']);
        }
        $this->adminView('products/index', [
            'title' => 'Products - Admin Panel',
            'products' => $products,
            'updateProduct' => $updateProduct
        ]);
    }

    public function add(): void
    {
        $this->requireAdmin();
        $name = trim($this->post('name', ''));
        $price = (int) $this->post('price', 0);

        if (empty($name) || $price <= 0) {
            $this->redirectWith('/admin/products', 'Please fill in all fields correctly.', 'error');
        }

        if (Product::nameExists($name)) {
            $this->redirectWith('/admin/products', 'Product name already exists!', 'error');
        }

        $image = $this->uploadFile('image');
        if (!$image) {
            $this->redirectWith('/admin/products', 'Please upload a valid image.', 'error');
        }

        Product::create(['name' => $name, 'price' => $price, 'image' => $image]);
        $this->redirectWith('/admin/products', 'Product added successfully!', 'success');
    }

    public function edit(string $id): void
    {
        $this->requireAdmin();
        $this->redirect('/admin/products?update=' . $id);
    }

    public function update(): void
    {
        $this->requireAdmin();
        $id = (int) $this->post('update_p_id');
        $name = trim($this->post('update_name', ''));
        $price = (int) $this->post('update_price', 0);
        $oldImage = $this->post('update_old_image', '');

        if (empty($name) || $price <= 0) {
            $this->redirectWith('/admin/products', 'Please fill in all fields correctly.', 'error');
        }

        if (Product::nameExists($name, $id)) {
            $this->redirectWith('/admin/products', 'Product name already exists!', 'error');
        }

        $data = ['name' => $name, 'price' => $price];

        if (isset($_FILES['update_image']) && $_FILES['update_image']['error'] === UPLOAD_ERR_OK) {
            $newImage = $this->uploadFile('update_image');
            if ($newImage) {
                $data['image'] = $newImage;
                $this->deleteFile($oldImage);
            }
        }

        Product::update($id, $data);
        $this->redirectWith('/admin/products', 'Product updated successfully!', 'success');
    }

    public function delete(string $id): void
    {
        $this->requireAdmin();
        $product = Product::find((int) $id);
        
        if ($product) {
            $this->deleteFile($product['image']);
            Product::delete((int) $id);
            Session::flash('Product deleted successfully!', 'success');
        } else {
            Session::flash('Product not found!', 'error');
        }

        $this->redirect('/admin/products');
    }
}
