@extends('layouts.admin')

@section('title', 'Update Product - Admin Panel')

@section('content')
    <section class="mb-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 uppercase text-center">update product</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm p-8 max-w-2xl mx-auto border border-gray-100">
            @csrf
            <h3 class="text-2xl font-bold text-gray-700 mb-6 text-center border-b pb-4">Edit Details</h3>

            <div class="space-y-4">
                <div>
                    <input type="text" name="name" value="{{ $product->name }}"
                        class="w-full px-5 py-3 rounded-lg border border-gray-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700 bg-gray-50 focus:bg-white"
                        placeholder="enter product name" required>
                </div>

                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 font-medium">Rp.</span>
                        </div>
                        <input type="number" min="0" name="price" value="{{ $product->price }}"
                            class="w-full pl-10 pr-5 py-3 rounded-lg border border-gray-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700 bg-gray-50 focus:bg-white"
                            placeholder="enter product price" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-2 ml-1">Current Image:</label>
                    <img src="{{ asset('uploaded_img/' . $product->image) }}" alt="" class="h-24 w-auto rounded-lg border border-gray-200 mb-3">
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png"
                        class="w-full px-5 py-3 rounded-lg border border-gray-200 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-all text-gray-700 bg-gray-50 focus:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-xs text-gray-500 mt-1 ml-1">Leave empty to keep current image</p>
                </div>

                <div class="flex gap-4 pt-2">
                    <a href="{{ route('admin.products') }}"
                        class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 rounded-lg transition-colors text-center uppercase tracking-wider">cancel</a>
                    <input type="submit" value="update product" name="update_product"
                        class="flex-1 bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 cursor-pointer uppercase tracking-wider">
                </div>
            </div>
        </form>
    </section>
@endsection