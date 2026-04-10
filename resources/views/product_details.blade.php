@extends('maindesign')

<base href="/public">

@section('product_card')

@if (session('cart_message'))
    <div class="alert alert-success text-center">
        {{ session('cart_message') }}
    </div>
@endif

<section class="product-details-section py-5">
    <div class="container">

        <a href="{{ route('viewallproducts') }}" class="back-btn mb-4 d-inline-block">← Back to Shop</a>

        <div class="row align-items-center g-5">

            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="product-image-box">
                    <img src="{{ asset('products/'.$product->product_image) }}"
                        alt="Product Image"
                        class="img-fluid rounded-4 shadow-lg product-img">
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info-box">

                    <span class="product-category-badge">
                        {{ $product->product_category }}
                    </span>

                    <h1 class="product-title mt-3">
                        {{ $product->product_title }}
                    </h1>

                    <h2 class="product-price mt-3">
                        ${{ $product->product_price }}
                    </h2>

                    <p class="stock-text mt-2">
                        <strong>Available Stock:</strong> {{ $product->product_quantity }}
                    </p>

                    <hr>

                    <!-- Static Description -->
                    <div class="product-description">
                        <h5>Description</h5>
                        <p>
                            Premium quality product crafted with comfort, durability, and style in mind.
                            Designed for everyday wear with modern aesthetics and reliable materials.
                            Perfect for customers looking for both performance and fashion.
                        </p>

                        <ul>
                            <li>✔ High Quality Material</li>
                            <li>✔ Comfortable Fit</li>
                            <li>✔ Durable & Long Lasting</li>
                            <li>✔ Trendy Modern Design</li>
                        </ul>
                    </div>

                    <a href="{{ route('add_to_cart',$product->id) }}">
                        <button class="add-cart-btn mt-4">
                            Add To Cart
                        </button>
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection