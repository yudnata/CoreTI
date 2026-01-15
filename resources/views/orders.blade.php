@extends('layouts.app')

@section('title', 'Orders - CoreTI')

@section('content')
<section class="py-16 px-4 bg-gray-50 min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12 uppercase">Placed Orders</h1>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @forelse($orders as $order)
            <div class="bg-white rounded-lg shadow-md p-8 border border-gray-200 hover:shadow-xl transition-all duration-300">
                <div class="space-y-4">
                    <p class="text-lg text-gray-600">
                        Placed on: <span class="text-gray-800 font-semibold">{{ $order->placed_on }}</span>
                    </p>
                    <p class="text-lg text-gray-600">
                        Name: <span class="text-gray-800 font-semibold">{{ $order->name }}</span>
                    </p>
                    <p class="text-lg text-gray-600">
                        Number: <span class="text-gray-800 font-semibold">{{ $order->number }}</span>
                    </p>
                    <p class="text-lg text-gray-600">
                        Email: <span class="text-gray-800 font-semibold">{{ $order->email }}</span>
                    </p>
                    <p class="text-lg text-gray-600">
                        Address: <span class="text-gray-800 font-semibold">{{ $order->address }}</span>
                    </p>
                    <p class="text-lg text-gray-600">
                        Payment Method: <span class="text-gray-800 font-semibold">{{ $order->method }}</span>
                    </p>
                    <p class="text-lg text-gray-600">
                        Your Orders: <span class="text-gray-800 font-semibold">{{ $order->total_products }}</span>
                    </p>
                    <p class="text-lg text-gray-600">
                        Total Price: <span class="text-gray-800 font-semibold">Rp{{ number_format($order->total_price, 0, ',', '.') }}/-</span>
                    </p>
                    <p class="text-lg text-gray-600">
                        Payment Status:
                        <span class="font-semibold px-4 py-1.5 rounded-full inline-block {{ $order->payment_status == 'pending' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-2xl text-red-500 border-2 border-red-500 bg-red-50 rounded-lg py-6 px-4 inline-block">
                    No orders placed yet!
                </p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection