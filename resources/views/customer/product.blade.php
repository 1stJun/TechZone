@extends('customer.layout.master2')

@section('title', 'Product')

@section('main')
    <!-- Content -->
    <div class="app__container">
        <div class="grid wide">
            <div class="row app__content">
                <div class="col l-5">
                    <img class="product-img" src="img/{{ $item->productImage }}" alt="">
                </div>

                <div class="col l-7">
                    <h1 class="product_name">
                        {{ $item->productName }}
                    </h1>
                    <hr>
                    <p>
                        <span style="font-size:18px">✔ Genuine warranty 12 months.</span>
                    </p>
                    <p>
                        <span style="font-size:18px">✔ 7 days renewal support.</span>
                    </p>
                    <p>
                        <span style="font-size:18px">✔ Windows copyright integrated.</span>
                    </p>
                    <p>
                        <span style="font-size:18px">✔ Free delivery nationwide.</span>
                    </p>
                    <hr>
                    <h3 style="font-size:18px">Description</h3>
                    <p style="font-size:16px; line-height: 20px;">{{ $item->productDescription }}</p>
                    <hr>
                    <div class="price-detail">
                        <ul class="price-text">
                            <li>List Price: </li>
                            <li>Price: </li>
                            <li>You Save: </li>
                        </ul>
                        <ul class="price-value">
                            @php
                                $priceDifference = $item->productListPrice - $item->productPrice;
                                $discountAmount = round(($priceDifference / $item->productListPrice) * 100);
                            @endphp
                            <li class="price-value__list-price">
                                {{ number_format($item->productListPrice, 0, ',', '.') }} VND
                            </li>
                            <li class="price-value__current-price">
                                {{ number_format($item->productPrice, 0, ',', '.') }} VND
                            </li>
                            <li class="price-value__save-price">
                                {{ number_format($priceDifference, 0, ',', '.') }} VND ({{ $discountAmount }}%)
                            </li>
                        </ul>
                        <hr>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->productID }}">
                        <div class="qty_control">
                            Quantity
                            <div class="quantity-input">
                                <button type="button" class="btn minus-btn disabled">-</button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1"
                                    max="{{ $item->productQuantity }}" readonly>
                                <button type="button" class="btn plus-btn">+</button>
                            </div>
                        </div>
                        <p id="alert-msg" style="color: red; font-size: 1.4rem; display: none;">The quantity you selected
                            has reached the maximum of this product</p>
                        <div class="shopping-btn">
                            <button type="submit" class="btn btn-large btn-add">
                                <i class="fa-sharp fa-solid fa-cart-plus"></i>
                                Add to Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertMsg = document.querySelector('#alert-msg');
            const minusBtn = document.querySelector('.minus-btn');
            const plusBtn = document.querySelector('.plus-btn');
            const qtyInput = document.querySelector('.quantity-input input');
            const minQty = parseInt(qtyInput.getAttribute('min'));
            const maxQty = parseInt(qtyInput.getAttribute('max'));

            minusBtn.addEventListener('click', decreaseQty);
            plusBtn.addEventListener('click', increaseQty);
            qtyInput.addEventListener('input', inputQty);

            let qty = parseInt(qtyInput.value);

            function inputQty() {
                if (isNaN(qty) || qty < minQty) {
                    qty = minQty;
                } else if (qty > maxQty) {
                    qty = maxQty;
                }
                qtyInput.value = qty;
            }

            function decreaseQty() {
                if (qty > 1) {
                    qty--;
                    qtyInput.value = qty;
                    if (qty == 1) {
                        minusBtn.classList.add('disabled');
                    }
                    if (qty < maxQty) {
                        plusBtn.classList.remove('disabled');
                        alertMsg.style.display = 'none';
                    }
                }
            }

            function increaseQty() {
                if (qty < maxQty) {
                    qty++;
                    qtyInput.value = qty;
                    if (qty > 1) {
                        minusBtn.classList.remove('disabled');
                    }
                    if (qty == maxQty) {
                        plusBtn.classList.add('disabled');
                        alertMsg.style.display = 'block';
                    }
                }
            }
        });
    </script>
@endsection
