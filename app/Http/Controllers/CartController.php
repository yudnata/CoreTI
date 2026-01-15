<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        // Calculate total inside view or here
        return view('cart', compact('cart_items'));
    }

    public function addToCart(Request $request)
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('login');
        }

        $check_cart = Cart::where('name', $request->name)->where('user_id', $user_id)->first();

        if ($check_cart) {
            return redirect()->back()->with('message', 'already added to cart!');
        }

        Cart::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image
        ]);

        return redirect()->back()->with('message', 'product added to cart!');
    }

    public function updateCart(Request $request)
    {
        $cart_id = $request->cart_id;
        $cart_quantity = $request->cart_quantity;

        /** @var \App\Models\Cart|null $cart */
        $cart = Cart::find($cart_id);
        if ($cart) {
            $cart->update(['quantity' => $cart_quantity]);
            return redirect()->back()->with('message', 'cart quantity updated!');
        }

        return redirect()->back()->with('message', 'cart item not found!');
    }

    public function delete($id)
    {
        /** @var \App\Models\Cart|null $cart */
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('message', 'cart item deleted!');
        }
        return redirect()->back()->with('message', 'cart item not found!');
    }
}
