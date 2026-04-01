@extends('admin.maindesign')


@section('add_category')
    @if (session('category_message'))
        <div class="scs-msg">
            {{ session('category_message') }}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{ route('admin.postaddcategory') }}" method="POST">
            @csrf
            <input type="text" name="category" placeholder="Add category">
            <input type="submit" name="submit" value="Add Category">
        </form>
    </div>
@endsection
