@extends('admin.maindesign')

@section('view_product')
<div class="cart-container">

 

    @if (session('product_message'))
        <div class="msg success">{{ session('product_message') }}</div>
    @endif

    @if (session('delete_product_message'))
        <div class="msg success">{{ session('delete_product_message') }}</div>
    @endif
       <h2 class="cart-title">All Products</h2>

    <div class="cart-list">

        @foreach ($products as $product)
            <div class="cart-item">

                <!-- IMAGE -->
                <div class="cart-img">
                    @if ($product->product_image)
                        <img src="{{ asset('products/' . $product->product_image) }}">
                    @else
                        <span>No Image</span>
                    @endif
                </div>

                <!-- INFO -->
                <div class="cart-info">
                    <h3>{{ $product->product_title }}</h3>
                    <p>Category: {{ $product->product_category }}</p>
                </div>

                <!-- PRICE -->
                <div class="cart-price">
                    ${{ $product->product_price }}
                </div>

                <!-- QTY -->
                <div class="cart-qty">
                    Qty: {{ $product->product_quantity }}
                </div>

                <!-- ACTIONS -->
                <div class="cart-actions">
                    <a href="{{ route('admin.updateproduct', $product->id) }}" class="btn edit">Edit</a>
                    <a href="{{ route('admin.deleteproduct', $product->id) }}" class="btn delete">Delete</a>
                </div>

            </div>
        @endforeach

    </div>

    <div class="pagination">
        {{ $products->links() }}
    </div>

</div>
@endsection