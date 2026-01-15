<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth; // Kept for consistency if mix used, but prefer helper.

class AdminController extends Controller
{
    public function index()
    {
        $total_pendings = Order::where('payment_status', 'pending')->sum('total_price');
        $total_completed = Order::where('payment_status', 'completed')->sum('total_price');
        $number_of_orders = Order::count();
        $number_of_products = Product::count();
        $number_of_users = User::where('user_type', 'user')->count();
        $number_of_admins = User::where('user_type', 'admin')->count();
        $number_of_messages = Message::count();

        return view('admin.home', compact('total_pendings', 'total_completed', 'number_of_orders', 'number_of_products', 'number_of_users', 'number_of_admins', 'number_of_messages'));
    }

    public function products()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploaded_img'), $imageName);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.products')->with('message', 'Product added successfully!');
    }

    public function deleteProduct($id)
    {
        /** @var \App\Models\Product|null $product */
        $product = Product::find($id);
        if ($product) {
            if (file_exists(public_path('uploaded_img/' . $product->image))) {
                unlink(public_path('uploaded_img/' . $product->image));
            }
            Product::destroy($id);
            return redirect()->back()->with('message', 'Product deleted successfully!');
        }
        return redirect()->back()->with('message', 'Product not found!');
    }
}
