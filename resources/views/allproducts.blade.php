@extends('maindesign')

@section('all_products')
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                All Products
            </h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">

                        <a href="{{ route('product_details', $product->id) }}">
                            <div class="img-box">
                                <img src="{{ asset('products/' . $product->product_image) }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>{{ $product->product_title }}</h6>
                                <h6>
                                    Price
                                    <span>$ {{ $product->product_price }}</span>
                                </h6>
                            </div>
                        </a>

                        <div class="cart-btn-container">
                            <a href="{{ route('add_to_cart', $product->id) }}">
                                <button type="submit" class="add-cart-btn">
                                🛒 Add to Cart
                            </button>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
        <div class="btn-box">
            <a class="view-latest-product" href="{{ route('index') }}">
                View Latest Products
            </a>
        </div>
    </div>
@endsection()
