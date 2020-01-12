@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center mb-5">
    <span class="mr-4 static-badge badge-pink"><i class="ti-shopping-cart-full"></i></span>
    <div>
        <h5 class="font-strong">Order #{{ $order->id }}</h5>
        <div class="text-light">{{ $order->billing_name }},  {{ $order->status }}</div>
    </div>
</div>
<div class="row">
    <div class="col-xl-7">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-5">Products List</h5>
                <table class="table table-bordered table-hover">
                    <thead class="thead-default thead-lg">
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img class="mr-3" src="{{ asset('/storage/' . $product->featured_image) }}" alt="image" width="60" />
                                $product->name
                            </td>
                            <td>Rs {{ $product->price }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <div class="text-right" style="width:300px;">
                        <div class="row mb-2">
                            <div class="col-6">Subtotal Price</div>
                            <div class="col-6">Rs {{ $order->billing_subtotal }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">Shipping Charges</div>
                            <div class="col-6">Rs 200</div>
                        </div>
                        <div class="row font-strong font-20">
                            <div class="col-6">Total Price:</div>
                            <div class="col-6">
                                <div class="h3 font-strong">Rs {{ $order->billing_total }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">Order Information</h5>
                <div class="row align-items-center mb-3">
                    <div class="col-4 text-light">Total Price</div>
                    <div class="col-8 h3 font-strong text-pink mb-0">Rs {{ $order->billing_total }}</div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-4 text-light">Date</div>
                    <div class="col-8">{{ date('F, j Y', strtotime($order->created_at)) }}</div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-4 text-light">Delivered</div>
                    <div class="col-8">{{ date('F, j Y', strtotime($order->updated_at)) }}</div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-4 text-light">Status</div>
                    <div class="col-8">
                        @if ($order->status == 'Complete')
                            <span class="badge badge-success badge-pill">Shipped</span>
                        @elseif ($order->status == 'Pending')
                            <span class="badge badge-info badge-pill">Pending</span>
                        @elseif ($order->status == 'Cancelled')
                            <span class="badge badge-secondary badge-pill">Cancelled</span>
                        @endif
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-4 text-light">Payment</div>
                    <div class="col-8">
                        Cash On Delivery
                    </div>
                </div>
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">Buyer Information</h5>
                <div class="row align-items-center mb-3">
                    <div class="col-4 text-light">Customer</div>
                    <div class="col-8">{{ $order->billing_name }}</div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-4 text-light">Billing Address</div>
                    <div class="col-8">{{ $order->billing_address }}</div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-4 text-light">Shipping Address</div>
                    <div class="col-8">{{ $order->shipping_address }}</div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-4 text-light">Email</div>
                    <div class="col-8">{{ $order->billing_email }}</div>
                </div>
                <div class="row align-items-center">
                    <div class="col-4 text-light">Phone</div>
                    <div class="col-8">{{ $order->billing_phone }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection