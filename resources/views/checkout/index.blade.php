@extends('layouts.main')

@section('content')
<div class="section section-checkout pt-7 pb-7">
    <div class="container">
        {{ Form::open(['action' => 'CheckoutController@store', 'method' => 'POST']) }}
        <div class="row">
            <div class="col-md-12">
                <h3>Billing details</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name </label>
                            <div class="form-wrap">
                                {{ Form::text('billing_name', null, ['placeholder' => 'Name']) }}
                                @error('billing_name')
                                <label for="billing_name" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Email </label>
                            <div class="form-wrap">
                                {{ Form::email('billing_email', null, ['placeholder' => 'Email']) }}
                                @error('billing_email')
                                <label for="billing_email" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Postal/Zip Code</label>
                            <div class="form-wrap">
                                {{ Form::number('billing_postalcode', null, ['placeholder' => 'Postal Code (Enter your postal code to generate the editable address)']) }}
                                @error('billing_postalcode')
                                <label for="billing_postalcode" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Country</label>
                            <div class="form-wrap">
                                {{ Form::select('country', ['PK' => 'Pakistan', 'US' => 'United States'], null, ['placeholder' => 'Select Country']) }}
                                @error('country')
                                <label for="country" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Province </label>
                            <div class="form-wrap">
                                <div class="form-wrap">
                                    {{ Form::select('billing_province', ['Sindh' => 'Sindh', 'Punjab' => 'Punjab'], null, ['placeholder' => 'Select Province']) }}
                                    @error('billing_province')
                                    <label for="billing_province" class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>City </label>
                            <div class="form-wrap">
                                <div class="form-wrap">
                                    {{ Form::select('billing_city', ['Jamshoro' => 'Jamshoro', 'Hyderabad' => 'Huderabad'], null, ['placeholder' => 'Select City']) }}
                                    @error('billing_city')
                                    <label for="billing_city" class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Billing Address </label>
                            <div class="form-wrap">
                                {{ Form::textarea('billing_address', null, ['rows' => 3]) }}
                                @error('billing_address')
                                    <label for="billing_address" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Shipping Address </label>
                            <div class="form-wrap">
                                {{ Form::textarea('shipping_address', null, ['rows' => 3]) }}
                                @error('shipping_address')
                                    <label for="shipping_address" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone</label>
                            <div class="form-wrap">
                                {{ Form::number('billing_phone', null, ['Placeholder' => 'Phone']) }}
                                @error('billing_phone')
                                    <label for="billing_phone" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="mt-3">Your order</h3>
                <div class="order-review">
                    <table class="checkout-review-order-table">
                        <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Cart::content() as $item)
                            <tr>
                                <td class="product-name">
                                    {{ $item->model->name }}&nbsp;<strong class="product-quantity">× {{$item->qty}} </strong>
                                </td>
                                <td class="product-total">
                                    Rs {{ $item->model->price * $item->qty }}
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Subtotal</th>
                                <td>Rs {{ Cart::subtotal() }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Charges</th>
                                <td>Rs 200</td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td><strong>Rs {{ Cart::total() + 200 }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="checkout-payment">
                    <div class="text-right text-center-sm">
                        <button type="submit" class="organik-btn mt-6">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection