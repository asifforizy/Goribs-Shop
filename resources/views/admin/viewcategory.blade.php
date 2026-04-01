@extends('admin.maindesign')

@section('view_category')
<link rel="stylesheet" href="{{ asset('css/admin-category.css') }}">

<div class="container">
    <h2 class="heading">All Categories</h2>

    @if (session('category_message'))
        <div class="success-message">
            {{ session('category_message') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table class="category-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->category }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="no-data">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection