@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('main')
    <section class="home">
        <header class="section__header"></header>
        <div class="section__body">
            <h1>Dashboard</h1>
            <div class="small-box__wrapper">
                <div class="small-box bg-customer">
                    <div class="inner">
                        <span class="inner-info">
                            <h2>{{ $customers }}</h2>
                            <p>Customers</p>
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-user"></i>
                        </span>
                    </div>

                    <div class="small-box-footer">
                        <a href="{{ url('admin/customer') }}">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="small-box bg-category">
                    <div class="inner">
                        <span class="inner-info">
                            <h2>{{ $category }}</h2>
                            <p>Categories</p>
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-table-list"></i>
                        </span>
                    </div>

                    <div class="small-box-footer">
                        <a href="{{ url('admin/category') }}">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="small-box bg-product">
                    <div class="inner">
                        <span class="inner-info">
                            <h2>{{ $product }}</h2>
                            <p>Products</p>
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-laptop"></i>
                        </span>
                    </div>

                    <div class="small-box-footer">
                        <a href="{{ url('admin/product') }}">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="small-box bg-order">
                    <div class="inner">
                        <span class="inner-info">
                            <h2>{{ $order }}</h2>
                            <p>Orders</p>
                        </span>
                        <span class="icon">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </span>
                    </div>

                    <div class="small-box-footer">
                        <a href="{{ url('admin/order') }}">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
