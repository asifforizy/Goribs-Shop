@extends('maindesign')

@section('view-cart')

    <div class="cart-container">
        <h2 class="cart-title">🛒 Your Cart</h2>

        @if (session('cart_message'))
            <div class="success-msg">
                {{ session('cart_message') }}
            </div>
        @endif

        @if ($cart->count() > 0)
            <div class="cart-grid">
                @foreach ($cart as $item)
                    <div class="cart-card">

                        <!-- Product Image -->
                        <div class="cart-img">
                            <img src="{{ asset('products/' . $item->product->product_image) }}" alt="">
                        </div>

                        <!-- Product Info -->
                        <div class="cart-info">
                            <h3>{{ $item->product->product_title }}</h3>

                            <p class="price">৳ {{ $item->product->product_price }}</p>
                        </div>

                        <!-- Actions -->
                        <div class="cart-actions">
                            <a href="" class="btn-remove">Remove</a>
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-cart">
                <h3>Your cart is empty 😢</h3>
                <a href="{{ route('viewallproducts') }}" class="shop-btn">Shop Now</a>
            </div>
        @endif
    </div>

@endsection
