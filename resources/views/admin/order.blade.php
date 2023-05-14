@extends('admin.layout.master')

@section('title', 'Order')

@section('main')
    <section class="home">
        <header class="section__header">
            <form action="{{ url('admin/order/search') }}" method="GET" class="search-box">
                <i class="bx bx-search icon"></i>
                <input type="text" name="search" placeholder="Search...">
            </form>
        </header>

        <div class="section__body">
            <h1>Orders</h1>
            <div class="main-content">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Total Amount</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($orders) && count($orders) > 0)
                            @foreach ($orders as $order)
                                <tr>
                                    <td data-title="ID">{{ $order->orderID }}</td>
                                    <td data-title="Customer Name">{{ $order->customerName }}</td>
                                    <td data-title="Total Amount">
                                        {{ number_format($order->total_amount, 0, ',', '.') }} VND
                                    </td>
                                    <td data-title="Date">{{ $order->order_date }}</td>
                                    <td data-title="Status">IN PROGRESS</td>
                                    <td data-title="View">
                                        <label for="hidden-check" class="btn view">
                                            <i class="fa-solid fa-trash"></i>
                                            View
                                        </label>
                                    </td>
                                    <td data-title="Delete">
                                        <a href="{{ url('admin/order/delete/' . $order->orderID) }}" class="btn delete"
                                            onclick="confirmation(event)">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" style="text-align: center;">There are no data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $orders->onEachSide(1)->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

    <input type="checkbox" hidden class="hidden-check" id="hidden-check">

    <div class="modal">
        <label for="hidden-check" class="modal__overlay"></label>
        <div class="modal__body">
            <div class="order-wrapper">
                <div class="detail-info">
                    <div class="order-info">
                        <h3>Order Detail</h3>
                        <hr>
                        <li>Order ID:
                            <span>{{ $order->orderID }}</span>
                        </li>
                        <li>Order Date:
                            <span>{{ $order->order_date }}</span>
                        </li>
                        <li>Total Amount:
                            <span>{{ number_format($order->total_amount, 0, ',', '.') }} VND</span>
                        </li>
                        <li>Status:
                            <span style="color: green; font-weight: bold;">IN PROGRESS</span>
                        </li>
                    </div>
                    <div class="customer-info">
                        <h3>Customer Detail</h3>
                        <hr>
                        <li>Name:
                            <span>{{ $order->customerName }}</span>
                        </li>
                        <li>Email:
                            <span>{{ $order->customerEmail }}</span>
                        </li>
                        <li>Phone:
                            <span>{{ $order->customerPhone }}</span>
                        </li>
                    </div>
                </div>
                <div class="order-items">
                    <h3>Order Items</h3>
                    <hr>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td data-title="ID">{{ $item->productID }}</td>
                                    <td data-title="Image">
                                        <img src="img/{{ $item->productImage }}" width="60px" height="60px">
                                    </td>
                                    <td data-title="Product">{{ $item->productName }}</td>
                                    <td data-title="Price">
                                        {{ number_format($item->productPrice, 0, ',', '.') }} VND
                                    </td>
                                    <td data-title="Quantity">{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
