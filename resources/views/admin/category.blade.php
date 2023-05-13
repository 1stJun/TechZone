@extends('admin.layout.master')

@section('title', 'Category')

@section('main')
    <section class="home">
        <header class="section__header">
            <form action="{{ url('admin/category/search') }}" method="GET" class="search-box">
                <i class="bx bx-search icon"></i>
                <input type="text" name="search" placeholder="Search...">
        </form>
        </header>

        <div class="section__body">
            <h1>Categories</h1>
            <div class="main-content">
                <a href="{{ url('admin/category/add') }}" class="btn add">
                    <i class="fa-solid fa-plus"></i>
                    Add new
                </a>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($categories) && count($categories) > 0)
                            @foreach ($categories as $category)
                                <tr>
                                    <td data-title="ID">{{ $category->catID }}</td>
                                    <td data-title="Category Name">{{ $category->catName }}</td>
                                    <td data-title="Edit">
                                        <a href="{{ url('admin/category/edit/' . $category->catID) }}" class="btn edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                    </td>
                                    <td data-title="Delete">
                                        <a href="{{ url('admin/category/delete/' . $category->catID) }}" class="btn delete"
                                            onclick="confirmation(event)">
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
                {{ $categories->onEachSide(1)->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
