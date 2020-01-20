@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-lg-4 col-md-6">
        <div class="card mb-4">
            <div class="card-body flexbox-b">
                <div class="easypie mr-4" data-percent="73" data-bar-color="#18C5A9" data-size="80" data-line-width="8">
                    <span class="easypie-data text-success" style="font-size:28px;"><i class="ti-shopping-cart"></i></span>
                </div>
                <div>
                    <h3 class="font-strong text-success">{{$ordersCount}}</h3>
                    <div class="text-muted">TODAY'S ORDERS</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card mb-4">
            <div class="card-body flexbox-b">
                <div class="easypie mr-4" data-percent="42" data-bar-color="#5c6bc0" data-size="80" data-line-width="8">
                    <span class="easypie-data text-primary" style="font-size:32px;"><i class="la la-money"></i></span>
                </div>
                <div>
                    <h3 class="font-strong text-primary">Rs {{ $salesSum }}</h3>
                    <div class="text-muted">TODAY'S SALES</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card mb-4">
            <div class="card-body flexbox-b">
                <div class="easypie mr-4" data-percent="70" data-bar-color="#ff4081" data-size="80" data-line-width="8">
                    <span class="easypie-data text-pink" style="font-size:32px;"><i class="la la-users"></i></span>
                </div>
                <div>
                    <h3 class="font-strong text-pink">{{ $newCustomersCount }}</h3>
                    <div class="text-muted">TODAY'S CUSTOMERS</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-7">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">LATEST ORDERS</div>
            </div>
            <div class="ibox-body">
                <div class="flexbox mb-4">
                    <div class="flexbox">
                        
                    </div>
                    <a class="flexbox" href="{{ route('orders.index') }}" target="_blank">VIEW ALL<i class="ti-arrow-circle-right ml-2 font-18"></i></a>
                </div>
                <div class="ibox-fullwidth-block">
                    <table class="table table-hover">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th class="pl-4">Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th class="pr-4" style="width:91px;">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestOrders as $item)
                            <tr>
                                <td class="pl-4">
                                    <a href="{{ route('orders.show', $item->id) }}" target="_blank">#{{ $item->id }}</a>
                                </td>
                                <td>{{ $item->billing_name }}</td>
                                <td>Rs {{ $item->billing_total }}</td>
                                <td>
                                    @if ($item->status == 'Pending')
                                        <span id="{{ $item->id }}" class="badge badge-pill badge-info">{{ $item->status }}</span>
                                    @elseif ($item->status == 'Complete')
                                        <span id="{{ $item->id }}" class="badge badge-pill badge-success">{{ $item->status }}</span>
                                    @elseif ($item->status == 'Cancelled')
                                        <span id="{{ $item->id }}" class="badge badge-pill badge-warning">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td class="pr-4">{{ date('d.m.Y',strtotime($item->created_at)) }}</td>
                            </tr>     
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">POPULAR CATEGORIES</div>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('categories.create') }}" class="dropdown-item"> <i class="ti-pencil"></i>Create</a>
                    </div>
                </div>
            </div>
            <div class="ibox-body">
                <ul class="media-list media-list-divider">
                    @forelse ($popularCategories as $item)
                    <li class="media flexbox">
                        <div>
                            <div class="media-heading">{{ $item->name }}</div>
                        </div>
                        <h4 class="font-strong mb-0 ml-3 text-primary">{{ $item->products_count }}</h4>
                    </li>
                    @empty
                    <li class="media flexbox">
                        <div>
                            <div class="media-heading">No Data Found</div>
                        </div>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">LATEST POSTS</div>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('posts.create') }}" class="dropdown-item"><i class="ti-pencil"></i>Create</a>
                    </div>
                </div>
            </div>
            <div class="ibox-body">
                <ul class="media-list media-list-divider">
                    @forelse ($latestPosts as $item)
                    <li class="media">
                        <a class="media-img pr-4" href="{{ route('posts.show', $item->id) }}">
                            <img src="{{ asset('/storage/' . $item->featured_image) }}" alt="image" width="120" />
                        </a>
                        <div class="media-body d-flex">
                            <div class="flex-1">
                                <h5 class="media-heading">
                                    <a href="{{ route('posts.show', $item->id) }}">{{ $item->title }}</a>
                                </h5>
                                <p class="font-13 text-light">{{ Str::limit($item->excerpt, 250) }}</p>
                                <div class="font-13">
                                    <span class="mr-4">Created:
                                        <a class="text-success" href="javascript:;">{{ date('F, j Y', strtotime($item->create_at)) }}</a>
                                    </span>
                                    <span class="text-muted mr-4"><i class="fa fa-heart mr-2"></i>{{ $item->likes_count }}</span>
                                    <span class="text-muted"><i class="fa fa-comment mr-2"></i>{{ $item->discussions_count }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @empty
                        <p class="lead">No Post to show</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection