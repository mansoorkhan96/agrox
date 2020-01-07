@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
        @if (Cart::count() > 0)
            <div class="col-md-8">
                <table class="table shop-cart">
                    <tbody>
                        @forelse (Cart::content() as $item)
                        <tr class="cart_item">
                            <td class="product-remove">
                                {{ Form::open(['route' => ['cart.destroy', $item->rowId], 'method' => 'DELETE']) }}
                                    <button type="submit" class="remove">x</button>
                                {{ Form::close() }}
                            </td>
                            <td class="product-thumbnail">
                                <a href="{{ route('shop.show', $item->model->slug) }}">
                                    <img src="{{ '/storage/' . $item->model->featured_image }}" alt="">
                                </a>
                            </td>
                            <td class="product-info">
                                <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                <span class="sub-title">{{ $item->model->details }}</span>
                            </td>
                            <td class="product-quantity">
                                <div class="quantity">
                                    <input id="qty-1" type="number" min="0" name="number" value="1" class="input-text qty text" size="4">
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="amount">Rs {{ $item->model->price }}</span>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                        <tr>
                            <td colspan="5" class="actions">
                                <a class="organik-btn" href="{{ route('shop.index') }}"> Continue Shopping</a>
                                <input type="submit" style="line-height: 1.5" class="organik-btn pull-right" name="update_cart" value="Update Cart" />
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
                                <td>Rs {{ Cart::subtotal() }}</td>
                            </tr>
                            <tr class="shipping">
                                <th>Shipping</th>
                                <td>Free Shipping</td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td><strong>Rs {{ Cart::total() }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="proceed-to-checkout">
                        <a href="#">Proceed to Checkout</a>
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