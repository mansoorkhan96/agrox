@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <table class="table">
                    <thead style="background:#5fbd74; color:#ffffff">
                        <tr>
                            <th>Order ID</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Order Placed</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @forelse ($order->products as $product)
                                    <div class="row mb-1">
                                        <div class="col-md-4">
                                            <img style="width:70px; height: 70px" src="{{ asset('/storage/' . $product->featured_image) }}" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <p>{{ $product->name }}</p>
                                            <p>Rs {{ $product->price }}</p>
                                            <p>Qty: {{ $product->pivot->quantity }}</p>
                                        </div>
                                    </div>
                                @empty
                                    
                                @endforelse
                            </td>
                            <td>{{ $order->billing_total }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @if ($order->status == 'Pending')
                                    <span id="{{ $order->id }}" class="badge badge-info">{{ $order->status }}</span>
                                @elseif ($order->status == 'Complete')
                                    <span id="{{ $order->id }}" class="badge badge-success">{{ $order->status }}</span>
                                @elseif ($order->status == 'Cancelled')
                                    <span id="{{ $order->id }}" class="badge badge-warning">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-info mb-1">View</a>
                                @if ($order->status == 'Pending')
                                    <a href="#" data-action="Cancelled" order-id="{{ $order->id }}" id="order-action" class="btn btn-sm btn-default">Cancel</a>
                                @elseif($order->status == 'Cancelled')
                                    <a href="#" data-action="Reorder" order-id="{{ $order->id }}" id="order-action" class="btn btn-sm btn-default">Reorder</a>
                                @endif
                                
                            </td>
                        </tr>
                        @empty
                        <tr><td><p class="text-center">No Orders</p></td></tr> 
                        @endforelse
                    </tbody>
                    
                </table>
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

@section('page_script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#order-action', function(e) {
                e.preventDefault();

                let status = $(this).attr('data-action');
                let id = $(this).attr('order-id');

                let url = '{{ route("order.update", ":id") }}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    data: {status},
                    method: 'PUT'
                }).done(function(data) {
                    if(status == 'Cancelled') {
                        $('#order-action').attr('data-action', 'Reorder');
                        $('#order-action').text('Reorder');

                        $('#' + id).removeClass('badge-info');
                        $('#' + id).addClass('badge-warning');
                        $('#' + id).text('Cancelled')
                    } else if(status == 'Reorder') {
                        $('#order-action').attr('data-action', 'Cancelled');
                        $('#order-action').text('Cancel');

                        $('#' + id).removeClass('badge-warning');
                        $('#' + id).addClass('badge-info');
                        $('#' + id).text('Pending')
                    }
                    
                    toastr.success(data.success, 'Success');
                });
            });
        });
    </script>
@endsection