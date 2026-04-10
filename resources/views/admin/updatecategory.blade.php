@extends('admin.maindesign')

<base href="/public">
@section('update_category')
    @if (session('category_updated_message'))
        <div class="scs-msg">
            {{ session('category_updated_message') }}
        </div>
    @endif
    <div class="update-category-box">
        <form action="{{ route('admin.postupdatecategory', $category->id) }}" method="POST">
            @csrf
            <input type="text" name="category" value="{{ $category->category }}">
            <input type="submit" name="submit" value="Update Category">
        </form>
    </div>
@endsection
