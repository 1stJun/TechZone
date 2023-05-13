@extends('admin.layout.master')

@section('title', 'Add Product')

@section('main')
    <section class="home">
        <header class="section__header"></header>
        <div class="section__body">
            <div class="container">
                <div class="title">Add Product</div>
                <div class="content">
                    @if (Session::has('success'))
                        <p>{{ Session::get('success') }}</p>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="product-details">
                            <div class="input-box">
                                <span class="details">Name</span>
                                <input type="text" id="name" name="name" placeholder="Enter product name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <span class="details">Image</span>
                                <input type="file" id="image" name="image">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <span class="details">List Price</span>
                                <input type="number" id="list_price" name="list_price"
                                    placeholder="Enter product list price">
                                @if ($errors->has('list_price'))
                                    <span class="text-danger">{{ $errors->first('list_price') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <span class="details">Price</span>
                                <input type="number" id="price" name="price" placeholder="Enter product price">
                                @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <span class="details">Quantity</span>
                                <input type="number" id="quantity" name="quantity" placeholder="Enter product quantity">
                                @if ($errors->has('quantity'))
                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <span class="details">Category</span>
                                <select name="category" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->catID }}">{{ $category->catName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-box">
                                <span class="details">Description</span>
                                <textarea rows="4" id="description" name="description"></textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="button">Create</button>
                        <a href="{{ url('admin/product') }}" class="button">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
