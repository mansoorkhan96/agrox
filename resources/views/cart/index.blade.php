@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
        @if (MCart::count() > 0)
            <div class="col-md-8">
                <table class="table shop-cart">
                    <tbody>
                        @forelse (MCart::content() as $item)
                        <tr class="cart_item">
                            <td class="product-remove">
                                {{ Form::open(['route' => ['cart.destroy', $item['rowId']], 'method' => 'DELETE']) }}
                                    <button type="submit" class="remove">x</button>
                                {{ Form::close() }}
                            </td>
                            <td class="product-thumbnail">
                                <a href="{{ route('shop.show', $item['slug']) }}">
                                    <img src="{{ '/storage/' . $item['image'] }}" alt="">
                                </a>
                            </td>
                            <td class="product-info">
                                <a href="{{ route('shop.show', $item['slug']) }}">{{ $item['name'] }}</a>
                                <span class="sub-title">{{ $item['details'] }}</span>
                            </td>
                            <td class="product-quantity">
                                <div class="quantity">
                                    <input type="number" min="1" cart-row-id="{{ $item['rowId'] }}" name="number" value="{{ $item['qty'] }}" class="input-text qty text cart-quantity" size="4">
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="amount">Rs {{ $item['price'] }}</span>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                        <tr>
                            <td colspan="5" class="actions">
                                <a class="organik-btn" href="{{ route('shop.index') }}"> Continue Shopping</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="cart-totals">
                    <table>
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td>Rs {{ MCart::total() }}</td>
                            </tr>
                            <tr class="shipping">
                                <th>Shipping</th>
                                <td>Rs 200</td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td><strong>Rs {{ MCart::total() + 200 }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="proceed-to-checkout">
                        <a href="{{ route('checkout.index') }}">Proceed to Checkout</a>
                    </div>
                </div>
                <div class="coupon-shipping">
                    <div class="coupon">
                        <form>
                            <input type="text" name="coupon_code" class="coupon-code" id="coupon_code" value="" placeholder="Coupon code" />
                            <input type="submit" class="apply-coupon" name="apply_coupon" value="Apply Coupon" />
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="col-sm-12">
                <div class="commerce">
                    <p class="cart-empty"> Your cart is currently empty.</p>
                    <a class="organik-btn small" href="{{ route('shop.index') }}"> Return to shop </a>
                </div>
            </div>
        @endif
        </div>
    </div>
</div>
@endsection

@section('page_script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '.cart-quantity', function(e) {
                e.preventDefault();

                let id = $(this).attr('cart-row-id');
                let quantity = $(this).val();

                $.ajax({
                    url: `/cart/${id}`,
                    method: 'PUT',
                    data: {quantity: quantity}
                }).done(function(data) {
                    if(data.status == true) {
                        $(this).val(data.quantity);
                        toastr.success('Quantity was updated successfully!')
                    }
                }).fail(function(error) {
                    console.log(error)
                });
            })
        });
    </script>
@endsection