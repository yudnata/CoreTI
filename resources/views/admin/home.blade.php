@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')

@section('content')
    <section class="pb-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 uppercase text-center border-b-2 border-gray-200 pb-4">dashboard</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow transition-shadow duration-300 group ring-1 ring-gray-50 hover:ring-blue-100">
                <h3 class="text-2xl font-bold text-blue-600 mb-2 group-hover:scale-105 transition-transform">Rp. {{ number_format($total_pendings, 0, ',', '.') }}/-</h3>
                <p class="text-gray-500 font-medium bg-blue-50 px-4 py-1 rounded-full text-sm">total pendings</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow transition-shadow duration-300 group ring-1 ring-gray-50 hover:ring-green-100">
                <h3 class="text-2xl font-bold text-green-600 mb-2 group-hover:scale-105 transition-transform">Rp. {{ number_format($total_completed, 0, ',', '.') }}/-</h3>
                <p class="text-gray-500 font-medium bg-green-50 px-4 py-1 rounded-full text-sm">completed payments</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow transition-shadow duration-300 group ring-1 ring-gray-50 hover:ring-purple-100">
                <h3 class="text-2xl font-bold text-purple-600 mb-2 group-hover:scale-105 transition-transform">{{ $number_of_orders }}</h3>
                <p class="text-gray-500 font-medium bg-purple-50 px-4 py-1 rounded-full text-sm">order placed</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow transition-shadow duration-300 group ring-1 ring-gray-50 hover:ring-orange-100">
                <h3 class="text-2xl font-bold text-orange-600 mb-2 group-hover:scale-105 transition-transform">{{ $number_of_products }}</h3>
                <p class="text-gray-500 font-medium bg-orange-50 px-4 py-1 rounded-full text-sm">products added</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow transition-shadow duration-300 group ring-1 ring-gray-50 hover:ring-indigo-100">
                <h3 class="text-2xl font-bold text-indigo-600 mb-2 group-hover:scale-105 transition-transform">{{ $number_of_users }}</h3>
                <p class="text-gray-500 font-medium bg-indigo-50 px-4 py-1 rounded-full text-sm">normal users</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow transition-shadow duration-300 group ring-1 ring-gray-50 hover:ring-pink-100">
                <h3 class="text-2xl font-bold text-pink-600 mb-2 group-hover:scale-105 transition-transform">{{ $number_of_admins }}</h3>
                <p class="text-gray-500 font-medium bg-pink-50 px-4 py-1 rounded-full text-sm">admin users</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col items-center justify-center text-center hover:shadow transition-shadow duration-300 group ring-1 ring-gray-50 hover:ring-teal-100">
                <h3 class="text-2xl font-bold text-teal-600 mb-2 group-hover:scale-105 transition-transform">{{ $number_of_messages }}</h3>
                <p class="text-gray-500 font-medium bg-teal-50 px-4 py-1 rounded-full text-sm">new messages</p>
            </div>
        </div>
    </section>
@endsection