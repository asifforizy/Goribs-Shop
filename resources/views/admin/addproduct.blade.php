@extends('admin.maindesign')


@section('add_product')
    @if (session('product_message'))
        <div class="scs-msg">
            {{ session('product_message') }}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{ route('admin.postaddproduct') }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <input type="text" name="product_title" placeholder="Product title">
            <input type="number" name="product_quantity" placeholder="Product quantity">
            <input type="number" name="product_price" placeholder="Product price">
            
            <select name="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>
            <input type="file" name="product_image" >
            <input type="submit" name="submit" value="Add Product">
        </form>
    </div>
@endsection
