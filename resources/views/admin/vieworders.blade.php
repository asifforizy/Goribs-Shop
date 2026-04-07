@extends('admin.maindesign')

@section('view_orders')
    <div class="admin-orders">

        <h2 class="page-title">Orders Management</h2>

        {{-- Success Message --}}
        @if (session('message'))
            <div class="success-msg">
                {{ session('message') }}
            </div>
        @endif

        <div class="table-container">
            <table class="orders-table">

                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $order)
                        <tr>

                            {{-- Customer Info --}}
                            <td>{{ $order->receiver_name ?? 'N/A' }}</td>
                            <td>{{ $order->receiver_phone ?? 'N/A' }}</td>
                            <td>{{ $order->receiver_address ?? 'N/A' }}</td>
                            <td class="product-image-cell">
                                <div class="product-image-box">
                                    <img src="{{ asset('products/' . $order->product->product_image) }}" alt="product">
                                </div>
                            </td>

                            {{-- Price --}}
                            <td>$ {{ $order->product->product_price ?? '0' }}</td>

                            {{-- Status --}}
                            <td>
                                <span class="status {{ $order->status }}">
                                    {{ ucfirst($order->status ?? 'pending') }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="actions">

                                @if ($order->status == 'pending')
                                    <a href="{{ url('order/delivered/' . $order->id) }}" class="btn delivered">
                                        ✔ Delivered
                                    </a>

                                    <a href="{{ url('order/cancel/' . $order->id) }}" class="btn cancel">
                                        ✖ Cancel
                                    </a>
                                @endif

                                @if ($order->status == 'delivered')
                                    <span class="done">✔ Delivered</span>
                                @endif

                                @if ($order->status == 'cancelled')
                                    <span class="cancelled">✖ Cancelled</span>
                                @endif

                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="no-data">
                                No orders found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
@endsection
