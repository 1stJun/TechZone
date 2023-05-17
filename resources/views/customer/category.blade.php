@extends('customer.layout.master')

@section('title', 'Category')

@section('main')
    <div class="home-product">
        <div class="row sm-gutter">
            <!-- Product item -->
            @if (isset($items) && count($items) > 0)
                @foreach ($items as $item)
                    <div class="col l-3 m-4 c-6">
                        <a class="home-product-item" href="{{ url('customer/product/' . $item->productID) }}">
                            <div class="home-product-item__img" style="background-image: url(img/{{ $item->productImage }});">
                            </div>
                            <h4 class="home-product-item__name">
                                {{ $item->productName }}
                            </h4>
                            <ul class="home-product-item__price">
                                <li class="home-product-item__list-price">16.990.000 VND</li>
                                <li class="home-product-item__current-price">
                                    {{ number_format($item->productPrice, 0, ',', '.') }} VND
                                </li>
                            </ul>
                            <div class="home-product-item__favorite">
                                <i class="fa-solid fa-check"></i>
                                <span>Favorite</span>
                            </div>
                            <div class="home-product-item__sale-off">
                                <span class="home-product-item__sale-off-percent">12%</span>
                                <span class="home-product-item__sale-off-label">OFF</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p style="margin: 12px auto 0; font-size: 2em;">There are no products.</p>
            @endif
        </div>
    </div>
    {{ $items->onEachSide(1)->links('vendor.pagination.custom2') }}
@endsection
