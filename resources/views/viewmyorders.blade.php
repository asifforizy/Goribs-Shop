@extends('dashboard') {{-- or your main layout --}}

@section('view_orders')

<style>
.my-orders {
    padding: 20px;
    color: #fff;
    max-width: 1000px;
    margin: auto;
}

.my-orders h2 {
    margin-bottom: 20px;
    text-align: center;
    font-size: 28px;
    font-weight: 600;
}

.success-msg {
    background: #28a745;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    text-align: center;
}

.table-container {
    overflow-x: auto;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.4);
}

.orders-table {
    width: 100%;
    border-collapse: collapse;
    background: #1e1e2f;
}

.orders-table th,
.orders-table td {
    padding: 12px;
    border-bottom: 1px solid #333;
    text-align: left;
    vertical-align: middle;
}

.orders-table th {
    background: #111;
    color: #fff;
}

.status {
    padding: 3px 8px;
    border-radius: 5px;
    font-size: 12px;
    font-weight: 600;
}

.status.pending { background: yellow; color: black; }
.status.delivered { background: green; color: white; }
.status.cancelled { background: red; color: white; }

/* Flex container for image + title */
.product-info {
    display: flex;
    align-items: center;
}

.product-image-box {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    overflow: hidden;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
    margin-right: 10px;
    flex-shrink: 0;
}

.product-image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.3s;
}

.product-image-box:hover img {
    transform: scale(1.1);
}

.product-image-box:hover {
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    border-color: #2563eb;
}

.no-data {
    text-align: center;
    padding: 20px;
    color: #aaa;
}
</style>

<div class="my-orders">
    <h2>My Orders</h2>

    @if(session('message'))
        <div class="success-msg">
            {{ session('message') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <p class="no-data">You have not placed any orders yet.</p>
    @else
        <div class="table-container">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Placed On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                <div class="product-info">
                                    <div class="product-image-box">
                                        <img src="{{ asset('products/' . $order->product->product_image) }}" alt="{{ $order->product->product_title ?? 'Deleted Product' }}">
                                    </div>
                                    <div class="product-title">{{ $order->product->product_title ?? 'Deleted Product' }}</div>
                                </div>
                            </td>
                            <td>$ {{ $order->product->product_price ?? '0' }}</td>
                            <td>
                                <span class="status {{ $order->status }}">
                                    {{ ucfirst($order->status ?? 'pending') }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection