@extends('admin.maindesign') 

@section('view_product')
<div class="container-fluid">
    <h2>All Products</h2>

    @if(session('product_message'))
        <div class="scs-msg">{{ session('product_message') }}</div>
    @endif

     @if(session('delete_product_message'))
        <div class="scs-msg">{{ session('delete_product_message') }}</div>
    @endif

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_title }}</td>
                <td>{{ $product->product_quantity }}</td>
                <td>{{ $product->product_price }}</td>
               <td>{{ $product->product_category }}</td>
                <td>
                    @if($product->product_image)
                        <img src="{{ asset('products/'.$product->product_image) }}" width="80" alt="Product Image">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a style="color: red;" href="{{ route('admin.deleteproduct',$product->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach

            {{ $products->links() }}
        </tbody>
    </table>
</div>
@endsection