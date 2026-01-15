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

    public function editProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('message', 'Product not found!');
        }
        return view('admin.products_edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with('message', 'Product not found!');
        }

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = $product->image;
        if ($request->hasFile('image')) {
            // Delete old image
            if (file_exists(public_path('uploaded_img/' . $product->image))) {
                unlink(public_path('uploaded_img/' . $product->image));
            }
            // Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploaded_img'), $imageName);
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.products')->with('message', 'Product updated successfully!');
    }
    public function orders()
    {
        $orders = Order::latest()->get();
        return view('admin.orders', compact('orders'));
    }

    public function updatePaymentStatus(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->payment_status = $request->payment_status;
            $order->save();
            return redirect()->back()->with('message', 'Payment status updated!');
        }
        return redirect()->back()->with('message', 'Order not found!');
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return redirect()->back()->with('message', 'Order deleted successfully!');
        }
        return redirect()->back()->with('message', 'Order not found!');
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('message', 'User deleted successfully!');
        }
        return redirect()->back()->with('message', 'User not found!');
    }

    public function messages()
    {
        $messages = Message::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function deleteMessage($id)
    {
        $message = Message::find($id);
        if ($message) {
            $message->delete();
            return redirect()->back()->with('message', 'Message deleted successfully!');
        }
        return redirect()->back()->with('message', 'Message not found!');
    }
}
