@extends('admin.maindesign')

<base href="/public">
@section('update_product')

@if (session('product_message'))
    <div class="scs-msg">
        {{ session('product_message') }}
    </div>
@endif

<div class="container-fluid">
    <form action="{{ route('admin.postupdateproduct', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="product_title" value="{{ $product->product_title }}" placeholder="Product Title">

        <input type="number" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="Product Quantity">

        <input type="number" name="product_price" value="{{ $product->product_price }}" placeholder="Product Price">

        <select name="product_category">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->category }}"
                    {{ $product->product_category == $category->category ? 'selected' : '' }}>
                    {{ $category->category }}
                </option>
            @endforeach
        </select>

        <input type="file" name="product_image">

        <input type="submit" value="Update Product">
    </form>
</div>

@endsection