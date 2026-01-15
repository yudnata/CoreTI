@extends('layouts.admin')

@section('title', 'Products - Admin Panel')

@section('content')
    <section class="mb-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 uppercase text-center">shop products</h1>
        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm p-8 max-w-2xl mx-auto border border-gray-100">
            @csrf
            <h3 class="text-2xl font-bold text-gray-700 mb-6 text-center border-b pb-4">Add Product</h3>
            <div class="space-y-4">
                <input type="text" name="name" class="w-full px-5 py-3 rounded-lg border border-gray-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700 bg-gray-50 focus:bg-white" placeholder="enter product name" required>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 font-medium">Rp.</span>
                    </div>
                    <input type="number" min="0" name="price" class="w-full pl-10 pr-5 py-3 rounded-lg border border-gray-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700 bg-gray-50 focus:bg-white" placeholder="enter product price" required>
                </div>
                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="w-full px-5 py-3 rounded-lg border border-gray-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700 bg-gray-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                <input type="submit" value="add product" name="add_product" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 cursor-pointer uppercase tracking-wider">
            </div>
        </form>
    </section>

    <section class="pb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow transition-shadow duration-300 border border-gray-100 flex flex-col text-center group">
                    <img src="{{ asset('uploaded_img/' . $product->image) }}" alt="" class="w-full h-48 object-cover rounded-lg mb-4 group-hover:scale-105 transition-transform duration-300">
                    <div class="text-lg font-semibold text-gray-800 mb-2 truncate">{{ $product->name }}</div>
                    <div class="text-xl font-bold text-red-500 mb-4">Rp. {{ number_format($product->price, 0, ',', '.') }}/-</div>
                    <div class="flex gap-2 mt-auto">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 rounded-lg transition-colors capitalize">update</a>
                        <a href="{{ route('admin.products.delete', $product->id) }}" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-medium py-2 rounded-lg transition-colors capitalize" onclick="return confirm('delete this product?');">delete</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 bg-white rounded-xl shadow-sm border border-gray-100">
                    <p class="text-xl text-gray-500">no products added yet!</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection