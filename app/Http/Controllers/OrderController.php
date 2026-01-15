<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id', $user_id)->get();
        return view('orders', compact('orders'));
    }

    public function checkout()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $grand_total = 0;
        foreach ($cart_items as $item) {
            $grand_total += ($item->price * $item->quantity);
        }

        return view('checkout', compact('cart_items', 'grand_total'));
    }

    public function placeOrder(Request $request)
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();

        if ($cart_items->count() == 0) {
            return redirect()->route('shop')->with('message', 'your cart is empty');
        }

        // Logic to combine cart items info into strings/totals as per legacy DB structure
        $total_products = [];
        $total_price = 0;
        foreach ($cart_items as $item) {
            $total_products[] = $item->name . ' (' . $item->quantity . ')';
            $total_price += ($item->price * $item->quantity);
        }

        Order::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'method' => $request->input('method'),
            'address' => 'flat no. ' . $request->flat . ', ' . $request->street . ', ' . $request->city . ', ' . $request->country . ' - ' . $request->pin_code,
            'total_products' => implode(', ', $total_products),
            'total_price' => $total_price,
            'placed_on' => date('d-M-Y'),
            'payment_status' => 'pending',
        ]);

        // Clear cart using DB facade to avoid linter ambiguity
        // Ensure \Illuminate\Support\Facades\DB is imported or used fully qualified
        \Illuminate\Support\Facades\DB::table('cart')->where('user_id', $user_id)->delete();

        return redirect()->route('orders')->with('message', 'order placed successfully!');
    }
}
