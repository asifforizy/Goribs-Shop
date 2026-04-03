@extends('maindesign')

<base href="/public">


@section('product_card')

@if (session('cart_message'))
    <div class="scs-msg">
        {{ session('cart_message') }}
    </div>
@endif




<div class="product-container">

    <!-- Big Image -->
    <a href="{{route('index')}}" class="back-btn">←</a>
    <div class="image-container"><img src="{{ asset('products/'.$product->product_image) }}" alt="Product Image" class="product-img"></div>

    <!-- Title + Price -->
    <div class="title-price">
        <h1 class="product-title" >{{ $product->product_title }}</h1>
        <h1 class="product-price">$ {{ $product->product_price}}</h1>
    </div>
    <hr>
    <!-- Category + Quantity -->
    <div class="category-quantity">
        <div class="product-info"><strong>Category:</strong> {{ $product->product_category }}</div>
        <div class="product-info"><strong>Quantity:</strong> {{ $product->product_quantity }}</div>
    </div>

    <a href="{{ route('add_to_cart',$product->id) }}"><button class="product-btn">Add to Cart</button></a>

</div>
@endsection

