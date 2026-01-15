@extends('layouts.app')

@section('title', 'Checkout - CoreTI')

@section('content')
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-8 sticky top-24">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 uppercase">Order Summary</h2>
                    <div class="space-y-4 mb-6">
                        @php $grand_total = 0; @endphp
                        @foreach($cart_items as $item)
                            @php $grand_total += ($item->price * $item->quantity); @endphp
                            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $item->name }}</p>
                                    <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                </div>
                                <p class="text-gray-800 font-semibold">Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t-2 border-gray-800 pt-4">
                        <div class="flex justify-between items-center">
                            <p class="text-2xl font-bold text-gray-800 uppercase">Grand Total:</p>
                            <p class="text-3xl font-bold text-blue-600">Rp. {{ number_format($grand_total, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <form action="{{ route('place_order') }}" method="post" class="bg-white rounded-lg shadow-sm p-8">
                    @csrf
                    <h3 class="text-3xl font-bold text-gray-800 mb-8 uppercase">Place Your Order</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Name:</label>
                            <input type="text" name="name" required placeholder="Enter your name"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Number:</label>
                            <input type="number" name="number" required placeholder="Enter your number"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Email:</label>
                            <input type="email" name="email" required placeholder="Enter your email"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Payment Method:</label>
                            <select name="method"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none capitalize">
                                <option value="cash on delivery">Cash on Delivery</option>
                                <option value="credit card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Address Line 01:</label>
                            <input type="text" name="flat" required placeholder="e.g. flat no."
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Address Line 02:</label>
                            <input type="text" name="street" required placeholder="e.g. street name"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">City:</label>
                            <input type="text" name="city" required placeholder="e.g. Denpasar"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">State:</label>
                            <input type="text" name="state" required placeholder="e.g. Bali"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Country:</label>
                            <input type="text" name="country" required placeholder="e.g. Indonesia"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pin Code:</label>
                            <input type="number" min="0" name="pin_code" required placeholder="e.g. 80114"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full mt-8 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-lg transition-all duration-300 uppercase text-lg">
                        Order Now
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection