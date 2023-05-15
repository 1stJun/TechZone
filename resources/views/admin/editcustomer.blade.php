@extends('admin.layout.master')

@section('title', 'Edit Customer')

@section('main')
    <section class="home">
        <header class="section__header"></header>
        <div class="section__body">
            <div class="container">
                <div class="title">Edit Customer</div>
                <div class="content">
                    @if (Session::has('success'))
                        <p>{{ Session::get('success') }}</p>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="product-details">
                            <div class="input-box">
                                <span class="details">Name</span>
                                <input type="text" id="customerName" name="customerName"
                                    placeholder="Enter customer name" value="{{ old('customerName') }}">
                                @if ($errors->has('customerName'))
                                    <span class="text-danger">{{ $errors->first('customerName') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input type="email" id="customerEmail" name="customerEmail"
                                    placeholder="Enter customer email" value="{{ old('customerEmail') }}">
                                @if ($errors->has('customerEmail'))
                                    <span class="text-danger">{{ $errors->first('customerEmail') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <span class="details">Phone</span>
                                <input type="text" id="customerPhone" name="customerPhone"
                                    placeholder="Enter customer phone" value="{{ old('customerPhone') }}">
                                @if ($errors->has('customerPhone'))
                                    <span class="text-danger">{{ $errors->first('customerPhone') }}</span>
                                @endif
                            </div>
                            <div class="input-box">
                                <span class="details">Password</span>
                                <input type="text" id="customerPass" name="customerPass">
                                @if ($errors->has('customerPass'))
                                    <span class="text-danger">{{ $errors->first('customerPass') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="button">Update</button>
                        <a href="{{ url('admin/customer') }}" class="button">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
