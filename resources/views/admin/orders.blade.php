@extends('layouts.admin')

@section('title', 'Placed Orders - Admin Panel')

@section('content')
    <section class="mb-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 uppercase text-center">placed orders</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse($orders as $order)
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow transition-shadow duration-300">
                    <div class="space-y-3 mb-6">
                        <p class="text-gray-600"> user id : <span class="font-semibold text-blue-600">{{ $order->user_id }}</span> </p>
                        <p class="text-gray-600"> placed on : <span class="font-semibold text-gray-800">{{ $order->placed_on }}</span> </p>
                        <p class="text-gray-600"> name : <span class="font-semibold text-gray-800">{{ $order->name }}</span> </p>
                        <p class="text-gray-600"> number : <span class="font-semibold text-gray-800">{{ $order->number }}</span> </p>
                        <p class="text-gray-600"> email : <span class="font-semibold text-gray-800">{{ $order->email }}</span> </p>
                        <p class="text-gray-600"> address : <span class="font-semibold text-gray-800">{{ $order->address }}</span> </p>
                        <p class="text-gray-600"> total products : <span class="font-semibold text-gray-800">{{ $order->total_products }}</span> </p>
                        <p class="text-gray-600"> total price : <span class="font-semibold text-gray-800">Rp. {{ number_format($order->total_price, 0, ',', '.') }}/-</span> </p>
                        <p class="text-gray-600"> payment method : <span class="font-semibold text-gray-800">{{ $order->method }}</span> </p>
                    </div>

                    <form action="{{ route('admin.orders.update', $order->id) }}" method="post" class="space-y-4">
                        @csrf
                        <select name="payment_status" class="w-full px-4 py-2 rounded-lg border border-gray-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 bg-gray-50 text-gray-700">
                            <option value="" selected disabled>{{ $order->payment_status }}</option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                        <div class="flex gap-3">
                            <input type="submit" value="update" name="update_payment"
                                class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 rounded-lg transition-colors capitalize cursor-pointer">
                            <a href="{{ route('admin.orders.delete', $order->id) }}" onclick="return confirm('delete this order?');"
                                class="flex-1 bg-red-500 hover:bg-red-600 text-white font-medium py-2 rounded-lg transition-colors capitalize text-center">delete</a>
                        </div>
                    </form>
                </div>
            @empty
                <div class="col-span-full text-center py-10 bg-white rounded-xl shadow-sm border border-gray-100">
                    <p class="text-xl text-gray-500">no orders placed yet!</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection