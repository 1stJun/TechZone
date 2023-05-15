@extends('admin.layout.master')

@section('title', 'Edit Category')

@section('main')
    <section class="home">
        <header class="section__header"></header>
        <div class="section__body">
            <div class="container">
                <div class="title">Edit Category</div>
                <div class="content">
                    @if (Session::has('success'))
                        <p>{{ Session::get('success') }}</p>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="product-details">
                            <div class="input-box category">
                                <span class="details">Name</span>
                                <input type="text" id="name" name="name" placeholder="Enter category name"
                                    value="{{ $category->catName }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="button">Update</button>
                        <a href="{{ url('admin/category') }}" class="button">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
