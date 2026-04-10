@extends('admin.maindesign')

@section('view_category')

<div class="cart-container">

    <h2 class="cart-title">All Categories</h2>

    @if (session('deletecategory_message'))
        <div class="msg success">
            {{ session('deletecategory_message') }}
        </div>
    @endif

    <div class="cart-list">

        @forelse ($category as $cat)
            <div class="cart-item">

                <!-- CATEGORY INFO -->
                <div class="cart-info">
                    <h3>{{ $cat->category }}</h3>
                    <p>ID: {{ $cat->id }}</p>
                </div>

                <!-- ACTIONS -->
                <div class="cart-actions">
                    <a href="{{ route('admin.categoryupdate', $cat->id) }}" class="btn edit">Update</a>
                    <a href="{{ route('admin.categorydelete', $cat->id) }}" class="btn delete">Delete</a>
                </div>

            </div>
        @empty
            <div class="cart-item">
                <div class="cart-info">
                    <h3>No categories found</h3>
                </div>
            </div>
        @endforelse

    </div>

</div>

@endsection