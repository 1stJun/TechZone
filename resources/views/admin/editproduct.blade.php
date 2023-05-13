@extends('admin.layout.master')

@section('title', 'Edit Product')

@section('main')
    <section class="home">
        <header class="section__header"></header>
        <div class="section__body">
            <div class="container">
                <div class="title">Edit Product</div>
                <div class="content">
                    @if (Session::has('success'))
                        <p>{{ Session::get('success') }}</p>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="product-details">
                            <div class="input-box">
                                <span class="details">Name</span>
                                <input type="text" id="name" name="name" placeholder="Enter product name"
                                    value="{{ $product->productName }}">
                            </div>
                            <div class="input-box">
                                <span class="details">Image</span>
                                <input type="file" id="image" name="image" value="{{ $product->productImage }}">
                            </div>
                            <div class="input-box">
                                <span class="details">List Price</span>
                                <input type="number" id="list_price" name="list_price" placeholder="Enter product list price"
                                    value="{{ $product->productListPrice }}">
                            </div>
                            <div class="input-box">
                                <span class="details">Price</span>
                                <input type="number" id="price" name="price" placeholder="Enter product price"
                                    value="{{ $product->productPrice }}">
                            </div>
                            <div class="input-box">
                                <span class="details">Quantity</span>
                                <input type="number" id="quantity" name="quantity" placeholder="Enter product quantity"
                                    value="{{ $product->productQuantity }}">
                            </div>                            
                            <div class="input-box">
                                <span class="details">Category</span>
                                <select name="category" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->catID }}">{{ $category->catName }}</option>
                                    @endforeach
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->catID }}"
                                            {{ $category->catID == $product->catID ? 'selected' : '' }}>
                                            {{ $category->catName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-box">
                                <span class="details">Description</span>
                                <textarea rows="4" id="description" name="description">{{ $product->productDescription }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="button">Update</button>
                        <a href="{{ url('admin/product') }}" class="button">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
