@extends('layouts.admin')

@section('title', 'Products - Admin Panel')

@section('content')
<section class="add-products">
    <h1 class="title">shop products</h1>
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3>add product</h3>
        <input type="text" name="name" class="box" placeholder="enter product name" required>
        <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
        <input type="submit" value="add product" name="add_product" class="btn">
    </form>
</section>

<section class="show-products">
    <div class="box-container">
        @forelse($products as $product)
            <div class="box">
                <img src="{{ asset('uploaded_img/' . $product->image) }}" alt="">
                <div class="name">{{ $product->name }}</div>
                <div class="price">Rp{{ number_format($product->price, 0, ',', '.') }}/-</div>
                <a href="#" class="option-btn">update</a>
                <a href="{{ route('admin.products.delete', $product->id) }}" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
            </div>
        @empty
            <p class="empty">no products added yet!</p>
        @endforelse
    </div>
</section>
@endsection
