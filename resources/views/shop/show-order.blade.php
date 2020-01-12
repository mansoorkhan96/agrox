@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="accordion icon-left" id="accordion1">
                    <div class="accordion-group toggle" style="border: 1px solid #bcb9b9ee">
                        <div class="accordion-heading toggle_title active">
                            <a class="accordion-toggle" data-toggle="collapse" aria-expanded="true" aria-controls="collapse1" href="#collapse1">
                                <h5 style="color: #fff">Order ID: {{ $order->id }}</h5>
                            </a>
                        </div>
                        <div id="collapse1" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <table class="table table-custom">
                                    <tr>
                                        <td>
                                            <p class="lead font-weight-bold">Name</p>
                                        </td>
                                        <td>
                                            <p class="lead font-weight-bold">
                                                {{ $order->billing_name }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="lead font-weight-bold">Shipping Address</p>
                                        </td>
                                        <td>
                                            <p class="lead font-weight-bold">
                                                {{ $order->shipping_address }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="lead font-weight-bold">
                                                Billing Address
                                            </p>
                                        </td>
                                        <td>
                                            <p class="lead font-weight-bold">
                                                {{ $order->billing_address }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="lead font-weight-bold">City</p>
                                        </td>
                                        <td>
                                            <p class="lead font-weight-bold">
                                                {{ $order->billing_city }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="lead font-weight-bold">Subtotal</p>
                                        </td>
                                        <td>
                                            <p class="lead font-weight-bold">
                                                Rs {{ $order->billing_subtotal }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="lead font-weight-bold">Shipping Fee</p>
                                        </td>
                                        <td>
                                            <p class="lead font-weight-bold">
                                                Rs {{ $order->shipping_charges }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="lead font-weight-bold">Total</p>
                                        </td>
                                        <td>
                                            <p class="lead font-weight-bold">
                                                Rs {{ $order->billing_total }}
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion icon-left" id="accordion1">
                    <div class="accordion-group toggle" style="border: 1px solid #bcb9b9ee">
                        <div class="accordion-heading toggle_title active">
                            <a class="accordion-toggle" data-toggle="collapse" aria-expanded="true" aria-controls="collapse1" href="#collapse1">
                                <h5 style="color: #fff">Order Items</h5>
                            </a>
                        </div>
                        <div id="collapse1" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                @forelse ($products as $product)
                                    <div class="row mb-1">
                                        <div class="col-md-4">
                                            <img style="width:100px; height: 100px" src="{{ asset('/storage/' . $product->featured_image) }}" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <p>Name: {{ $product->name }}</p>
                                            <p>Price: Rs {{ $product->price }}</p>
                                            <p>Quantity: {{ $product->pivot->quantity }}</p>
                                        </div>
                                    </div>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="loadmore-contain">
                    <a class="organik-btn small" href="{{ route('order.index') }}"> Back To Orders </a>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="widget widget-product-search">
                        <form class="form-search">
                            <input type="text" class="search-field" placeholder="Search products…" value="" name="s" />
                            <input type="submit" value="Search" />
                        </form>
                    </div>
                    <div class="widget widget-product-categories">
                        <h3 class="widget-title">Product Categories</h3>
                        <ul class="product-categories">
                            @forelse ($categoriesProductCount as $category)
                            <li><a class="{{ request()->category == $category->slug ? 'active' : '' }}" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a> <span class="count">{{ $category->products_count }}</span></li>  
                            @empty
                                
                            @endforelse
                        </ul>
                    </div>
                    <div class="widget widget-products">
                        <h3 class="widget-title">Might Also Like</h3>
                        <ul class="product-list-widget">
                            @forelse ($mightAlsoLike as $item)
                                <li>
                                    <a href="/shop/{{ $item['slug'] }}">
                                        <img src="{{ asset('/storage/' . $item['featured_image']) }}" alt="" />
                                        <span class="product-title">{{ $item['name'] }}</span>
                                    </a>
                                    
                                    <ins>RS {{ $item['price'] }}</ins>
                                </li> 
                            @empty
                                
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection