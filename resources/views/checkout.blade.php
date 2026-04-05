@extends('maindesign')

@section('checkout')

<div class="checkout-container">

    <!-- LEFT: FORM -->
    <div class="checkout-left">
        <h3>Shipping Details</h3>

        <form action="{{ route('confirm_order') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address" placeholder="Enter your full address" required></textarea>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" placeholder="01XXXXXXXXX" required>
            </div>

            <button type="submit" class="order-btn">
                ✅ Place Order
            </button>
        </form>
    </div>


    <!-- RIGHT: ORDER SUMMARY -->
    <div class="checkout-right">
        <h3>Order Summary</h3>

        @php $total = 0; @endphp

        @foreach($cart as $item)
            <div class="summary-item">
                <img src="{{ asset('products/' . $item->product->product_image) }}">
                
                <div>
                    <p>{{ $item->product->product_title }}</p>
                    <span>$ {{ $item->product->product_price }}</span>
                </div>
            </div>

            @php $total += $item->product->product_price; @endphp
        @endforeach

        <hr>

        <div class="total">
            <span>Total:</span>
            <span>$ {{ $total }}</span>
        </div>
    </div>

</div>

@endsection