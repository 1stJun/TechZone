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
@endsection
