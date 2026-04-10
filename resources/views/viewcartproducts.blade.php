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

                @php
                    $price = 0;

                @endphp
                @foreach ($cart as $cart_product)
                    <div class="cart-card">

                        <!-- Product Image -->
                        <div class="cart-img">
                            <img src="{{ asset('products/' . $cart_product->product->product_image) }}" alt="">
                        </div>

                        <!-- Product Info -->
                        <div class="cart-info">
                            <h3>{{ $cart_product->product->product_title }}</h3>

                            <p class="price">৳ {{ $cart_product->product->product_price }}</p>
                        </div>

                        <!-- Actions -->
                        <div class="cart-actions">
                            <a href="{{ route('removecartproduct', $cart_product->id) }}" class="btn-remove">Remove</a>
                        </div>
                    </div>

                    @php
                        $price = $price + $cart_product->product->product_price;
                    @endphp
                @endforeach
                <div class="checkout-container">
                    <div class="summary">
                        <p class="sub-total">Total: $ {{ $price }}</p>
                        
                    </div>

                    <div class="actions">
                        <a href="{{ route('viewallproducts') }}" class="continue-link">Continue Shopping</a>
                        <a href="{{ route('order-details') }}"><button class="checkout-btn">Checkout</button></a>
                    </div>
                </div>
            </div>

            
        @else
            <div class="empty-cart">
                <h3>Your cart is empty!</h3>
                <a href="{{ route('viewallproducts') }}" class="shop-btn">Shop Now</a>
            </div>
        @endif
    </div>

@endsection
