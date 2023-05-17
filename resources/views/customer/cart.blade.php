@extends('customer.layout.master2')

@section('title', 'Cart')

@section('main')
    <!-- Content -->
    <div class="app__container">
        <div class="grid wide">
            <div class="row app__content">
                <div class="col l-12 m-12 c-12">
                    @empty($cartItems)
                        <h1 class="cart-title">Cart</h1>
                        <p class="text-center">There are no products in the cart!</p>
                        <p class="text-center">
                            <a href="{{ url('customer/index') }}">
                                <i class="fa fa-reply"></i>
                                Continue shopping
                            </a>
                        </p>
                    @else
                        <form action="{{ url('customer/cart/update') }}" method="POST">
                            @csrf
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th class="image">Product</th>
                                        <th class="item">Name</th>
                                        <th class="quantity">Quantity</th>
                                        <th class="price">Price</th>
                                        <th class="remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td class="image">
                                                <div class="product_image">
                                                    <a href="{{ url('customer/product/' . $item->product['productID']) }}">
                                                        <img src="img/{{ $item->product['productImage'] }}">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="item">
                                                <a href="{{ url('customer/product/' . $item->product['productID']) }}">
                                                    <strong>{{ $item->product['productName'] }}</strong>
                                                </a>
                                            </td>
                                            <td class="qty">
                                                <div class="qty__wrapper">
                                                    <button type="button" class="btn minus">-</button>
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                        min="1" max="{{ $item->product['productQuantity'] }}">
                                                    <button type="button" class="btn plus">+</button>
                                                </div>
                                            </td>
                                            <td class="price">
                                                {{ number_format($item->product['productPrice'], 0, ',', '.') }} VND
                                            </td>
                                            <td class="remove">
                                                <a href="{{ url('customer/cart/delete/' . $item->product['productID']) }}"
                                                    class="cart btn" onclick="confirmation(event)">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="summary">
                                        <td colspan="5" style="font-weight: bold; font-size: 20px;">
                                            <span>Total:</span>
                                            <span class="total">
                                                <strong>{{ number_format($subtotal, 0, ',', '.') }} VND</strong>
                                            </span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="payment-btn">
                                <a href="{{ url('customer/cart/pay') }}" class="btn btn-large"
                                    onclick="event.preventDefault(); document.getElementById('pay-form').submit();">
                                    Pay
                                </a>
                                <button type="submit" class="btn btn-large">Update</button>
                            </div>
                        </form>
                        <form id="pay-form" action="{{ url('customer/cart/pay') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endempty
                </div>
            </div>
        </div>
    </div>

    <script>
        const minusBtn = document.querySelector('.minus');
        const plusBtn = document.querySelector('.plus');
        const qtyInput = document.querySelector('.qty__wrapper input');
        const minQty = parseInt(qtyInput.getAttribute('min'));
        const maxQty = parseInt(qtyInput.getAttribute('max'));

        minusBtn.addEventListener('click', decrQty);
        plusBtn.addEventListener('click', incrQty);

        let qty = parseInt(qtyInput.value);

        if (qty == minQty) {
            minusBtn.classList.add('disabled');
        }

        function decrQty() {
            if (qty > 1) {
                qty--;
                qtyInput.value = qty;
                if (qty == 1) {
                    minusBtn.classList.add('disabled');
                }
                if (qty < maxQty) {
                    plusBtn.classList.remove('disabled');
                }
            }
        }

        function incrQty() {
            if (qty < maxQty) {
                qty++;
                qtyInput.value = qty;
                if (qty > 1) {
                    minusBtn.classList.remove('disabled');
                }
                if (qty == maxQty) {
                    plusBtn.classList.add('disabled');
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script>
        function confirmation(e) {
            e.preventDefault();
            var urlToRedirect = e.currentTarget.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            })
        }
    </script>
@endsection
