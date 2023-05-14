@extends('admin.layout.master')

@section('title', 'Customer')

@section('main')
    <section class="home">
        <header class="section__header">
            <form action="{{ url('admin/customer/search') }}" method="GET" class="search-box">
                <i class="bx bx-search icon"></i>
                <input type="text" name="search" placeholder="Search...">
            </form>
        </header>

        <div class="section__body">
            <h1>Customers</h1>
            <div class="main-content">
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($customers) && count($customers) > 0)
                            @foreach ($customers as $customer)
                                <tr>
                                    <td data-title="ID">{{ $customer->customerID }}</td>
                                    <td data-title="Customer Name">{{ $customer->customerName }}</td>
                                    <td data-title="Phone">{{ $customer->customerPhone }}</td>
                                    <td data-title="Email">{{ $customer->customerEmail }}</td>
                                    <td data-title="Edit">
                                        <a href="{{ url('admin/customer/edit/' . $customer->customerID) }}"
                                            class="btn edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>
                                    </td>
                                    <td data-title="Delete">
                                        <a href="{{ url('admin/customer/delete/' . $customer->customerID) }}"
                                            class="btn delete" onclick="confirmation(event)">
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
                {{ $customers->onEachSide(1)->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
