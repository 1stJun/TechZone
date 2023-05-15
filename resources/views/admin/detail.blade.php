@extends('admin.layout.master')

@section('title', 'Order')

@section('main')
    <section class="home">
        <div class="section__body">
            <div class="detail-content">
                <a href="{{ url('admin/order') }}" class="btn back">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                    Back
                </a>
                <div class="order-wrapper">
                    <div class="detail-info">
                        <div class="order-info">
                            <h2>Order Detail</h2>
                            <hr style="margin-bottom: 4px;">
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
                            <h2>Customer Detail</h2>
                            <hr style="margin-bottom: 4px;">
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
                        <h2>Order Items</h2>
                        <hr style="margin-top: 4px;">
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
                                    <tr style="font-weight:500;">
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
    </section>
@endsection
