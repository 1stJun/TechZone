@extends('admin.layout.master')

@section('title', 'Product')

@section('main')
    <section class="home">
        <header class="section__header">
            <form action="{{ url('admin/product/search') }}" method="GET" class="search-box">
                <i class="bx bx-search icon"></i>
                <input type="text" name="search" placeholder="Search...">
            </form>
        </header>

        <div class="section__body">
            <h1>Products</h1>
            <div class="main-content">
                <a href="{{ url('admin/product/add') }}" class="btn add">
                    <i class="fa-solid fa-plus"></i>
                    Add new
                </a>
                @if (Session::has('error'))
                    <p style="color: red;">{{ Session::get('error') }}</p>
                @endif
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            {{-- <th>Quantity</th>
                            <th>Description</th>
                            <th>Category</th> --}}
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($products) && count($products) > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td data-title="ID">{{ $product->productID }}</td>
                                    <td data-title="Product Name">{{ $product->productName }}</td>
                                    <td data-title="Image" class="image">
                                        <img src="img/{{ $product->productImage }}" width="60px" height="60px">
                                    </td>
                                    <td data-title="Price">{{ number_format($product->productPrice, 0, ',', '.') }} VND</td>
                                    {{-- <td data-title="Quantity">{{ $product->productQuantity }}</td>
                                     <td data-title="Description">{{ $product->productDescription }}</td>
                                     <td data-title="Category">{{ $product->catName }}</td> --}}
                                    <td data-title="Edit">
                                        <a href="{{ url('admin/product/edit/' . $product->productID) }}" class="btn edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                    </td>
                                    <td data-title="Delete">
                                        <a href="{{ url('admin/product/delete/' . $product->productID) }}"
                                            class="btn delete" onclick="confirmation(event)">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" style="text-align: center;">There are no data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $products->onEachSide(1)->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
