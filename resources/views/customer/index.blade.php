@extends('customer.layout.master')

@section('title', 'Home')

@section('main')
    <div class="home-product">
        <div class="row sm-gutter">
            <!-- Product item -->
            @foreach ($products as $product)
                <div class="col l-3 m-4 c-6">
                    <a class="home-product-item" href="{{ url('customer/product/' . $product->productID) }}">
                        <div class="home-product-item__img" style="background-image: url(img/{{ $product->productImage }});">
                        </div>
                        <h4 class="home-product-item__name">
                            {{ $product->productName }}
                        </h4>
                        <ul class="home-product-item__price">
                            <li class="home-product-item__list-price">
                                {{ number_format($product->productListPrice, 0, ',', '.') }} VND
                            </li>
                            <li class="home-product-item__current-price">
                                {{ number_format($product->productPrice, 0, ',', '.') }} VND
                            </li>
                        </ul>
                        <div class="home-product-item__favorite">
                            <i class="fa-solid fa-check"></i>
                            <span>Favorite</span>
                        </div>
                        <div class="home-product-item__sale-off">
                            @php
                                $priceDifference = $product->productListPrice - $product->productPrice;
                                $discountAmount = round(($priceDifference / $product->productListPrice) * 100);
                            @endphp
                            <span class="home-product-item__sale-off-percent">{{ $discountAmount }}%</span>
                            <span class="home-product-item__sale-off-label">OFF</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{ $products->appends(request()->all())->links('vendor.pagination.custom2') }}
@endsection
