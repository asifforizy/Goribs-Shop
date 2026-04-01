@extends('admin.maindesign')

@section('view_category')
    @if (session('category_message'))
        <div class="success-message">
            {{ session('category_message') }}
        </div>
    @endif


    <div class="container">
        <h2 class="heading">All Categories</h2>

        <div class="table-wrapper">
            <table class="category-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($category as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->category }}</td>
                            <td >
                                <a style="color: red;" href="{{ route('admin.categorydelete', $cat->id) }}">Delete</a>
                                <a style="color: green;" href="{{ route('admin.categoryupdate', $cat->id) }}">Update</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="no-data">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
