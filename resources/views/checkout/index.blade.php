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
                                {{ Form::text('billing_name', auth()->user()->name, ['placeholder' => 'Name']) }}
                                @error('billing_name')
                                <label for="billing_name" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Email </label>
                            <div class="form-wrap">
                                {{ Form::email('billing_email', auth()->user()->email, ['placeholder' => 'Email']) }}
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
                                {{ Form::number('billing_postalcode', null, ['placeholder' => 'Postal Code (Enter your postal code to generate the editable address)','id' => 'billing_postal']) }}
                                @error('billing_postalcode')
                                <label for="billing_postalcode" class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Country</label>
                            <div class="form-wrap">
                                {{ Form::select('country', $countries, null, ['placeholder' => 'Select Country', 'id' => 'billing_country']) }}
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
                                    {{ Form::select('billing_province', $provinces, null, ['placeholder' => 'Select Province', 'id' => 'billing_province']) }}
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
                                    {{ Form::select('billing_city', $cities, auth()->user()->city_id, ['placeholder' => 'Select City', 'id' => 'billing_city']) }}
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
                                {{ Form::textarea('billing_address', auth()->user()->address, ['rows' => 3, 'id' => 'billing_address']) }}
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
                                {{ Form::textarea('shipping_address', auth()->user()->address, ['rows' => 3, 'shipping_address']) }}
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
                                {{ Form::text('billing_phone', auth()->user()->phone, ['Placeholder' => 'Phone']) }}
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
                            @forelse (MCart::content() as $item)
                            <tr>
                                <td class="product-name">
                                    {{ $item['name'] }}&nbsp;<strong class="product-quantity">× {{ $item['qty'] }} </strong>
                                </td>
                                <td class="product-total">
                                    Rs {{ $item['price'] * $item['qty'] }}
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Subtotal</th>
                                <td>Rs {{ MCart::total() }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Charges</th>
                                <td>Rs 200</td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td><strong>Rs {{ MCart::total() + 200 }}</strong></td>
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

@section('page_script')
    <script>
        let app = document.URL.indexOf( 'http://' ) === -1 && document.URL.indexOf( 'https://' ) === -1;
            if(app) {  
                /**
                * Get Current Location
                *
                */
                navigator.geolocation.getCurrentPosition(onSuccess, onError, { enableHighAccuracy: true });

                /**
                * Get Latitude and Longitude Cordinates and pass to getCity() to fetch the cityname
                *
                */
                function onSuccess(position) {
                    timestamp = position.timestamp;

                    getCity(
                        position.coords.latitude,
                        position.coords.longitude
                    );
                }

                /**
                * Get cityname from Lat, Long and pass the cityname to getSalatDetails() to get the Salat Details
                *
                */
                function getCity(latitude, longitude) {
                    $.ajax({
                        url: `https://geocode.xyz/${latitude},${longitude}?geoit=json`
                    }).done(function(data) {
                        let postal = data.postal ? data.postal : 000000;
                        
                        $('#billing_postal').val(postal)
                        $('#billing_country option:contains('+data.country+')').attr("selected", "selected");
                        $('#billing_province').val(data.region);
                        $('#billing_city').val(data.city);
                        $('#billing_address').val(data.staddress);
                        $('#shipping_address').val(data.staddress);
                        
                    }).fail(function(data) {
                        alert('Something Went Wrong While Fetching the city name..');
                    });
                }
            
                function onError(error) {
                    console(error)
                }
            }
    </script>
@endsection