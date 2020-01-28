@extends('layouts.main')

@section('content')
<div class="section section-bg-1 section-cover pt-17 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="mt-3 mb-3">
                    <img src="{{ asset('images/oranges.jpeg') }}" alt="" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mt-4 mb-1 section-pretitle">Welcome to</div>
                <h2 class="section-title mtn-2 mb-3">AgroX Store</h2>
                <p class="mb-4">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non ad quisquam ducimus beatae? Quo praesentium reiciendis distinctio velit? Suscipit odio quae consectetur magni voluptatibus doloremque vero eum id labore rem fugiat, deserunt doloribus illum fuga iusto numquam recusandae modi rerum.
                </p>
                <a class="organik-btn arrow" href="{{ route('shop.index') }}">Our products</a>
            </div>
        </div>
    </div>
</div>
<div class="section border-bottom mt-6 mb-5">
    <div class="container">
        <div class="row">
            <div class="organik-process">
                <div class="col-md-3 col-sm-6 organik-process-small-icon-step">
                    <div class="icon">
                        <i class="organik-delivery"></i>
                    </div>
                    <div class="content">
                        <div class="title">Free shipping</div>
                        <div class="text">All order over $100</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 organik-process-small-icon-step">
                    <div class="icon">
                        <i class="organik-hours-support"></i>
                    </div>
                    <div class="content">
                        <div class="title">Customer support</div>
                        <div class="text">Support 24/7</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 organik-process-small-icon-step">
                    <div class="icon">
                        <i class="organik-credit-card"></i>
                    </div>
                    <div class="content">
                        <div class="title">Secure payments</div>
                        <div class="text">Confirmed</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 organik-process-small-icon-step">
                    <div class="icon">
                        <i class="organik-lettuce"></i>
                    </div>
                    <div class="content">
                        <div class="title">Made with love</div>
                        <div class="text">Best services</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section pt-12 pb-9">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center mb-1 section-pretitle">Discover</div>
                <h2 class="text-center section-title mtn-2">Our products</h2>
                <div class="organik-seperator center">
                    <span class="sep-holder"><span class="sep-line"></span></span>
                    <div class="sep-icon"><i class="organik-flower"></i></div>
                    <span class="sep-holder"><span class="sep-line"></span></span>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="product-grid masonry-grid-post">
                @forelse ($products as $product)
                    <div class="col-md-3 col-sm-6 product-item masonry-item text-center juice">
                        <div class="product-thumb">
                            <a href="{{ route('shop.show', $product['slug'])  }}">
                                @if ($product['quantity'] < 1)
                                <span class="outofstock"><span>Out</span>of stock</span>
                                @endif
                                <img src="{{ asset('/storage/' . $product['featured_image']) }}" alt="" />
                            </a>
                            <div class="product-action">
                                @if ($product['quantity'] > 0)
                                {{ Form::open(['action' => 'CartController@store', 'method' => 'POST', 'id' => 'add_to_cart']) }}
                                    {{ Form::hidden('id', $product['id']) }}
                                    {{ Form::hidden('seller_id', $product['user_id']) }}
                                    {{ Form::hidden('image', $product['featured_image']) }}
                                    {{ Form::hidden('name', $product['name']) }}
                                    {{ Form::hidden('details', $product['details']) }}
                                    {{ Form::hidden('price', $product['price']) }}
                                    {{ Form::hidden('slug', $product['slug']) }}
                                    <span class="add-to-cart">
                                        <button type="submit" data-placement="top" title="Add to cart"></button>
                                    </span>
                                {{ Form::close() }}
                                @endif
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('shop.show', $product['slug'])  }}">
                                <h2 class="title">{{ $product['name'] }}</h2>
                                <span class="price">
                                    
                                    <ins>RS {{ $product['price'] }}</ins>
                                </span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="lead text-center">No Products to show</div>
                @endforelse
            </div>
            <div class="loadmore-contain">
                <a class="organik-btn small" href="{{ route('shop.index') }}"> Show All Products </a>
            </div>
        </div>
    </div>
</div>

<div class="section pt-12">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center mb-1 section-pretitle">Latest</div>
                <h2 class="text-center section-title mtn-2">From our blog</h2>
                <div class="organik-seperator center mb-6">
                    <span class="sep-holder"><span class="sep-line"></span></span>
                    <div class="sep-icon"><i class="organik-flower"></i></div>
                    <span class="sep-holder"><span class="sep-line"></span></span>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($posts as $post)
            <div class="col-md-4">
                <div class="blog-grid-item">
                    <div class="post-thumbnail">
                        <a href="{{ route('blog.show', $post->id) }}"> 
                            <img src="{{ asset('/storage/' . $post->featured_image) }}" alt="" /> 
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-meta">
                            <span class="posted-on">
                                <i class="ion-calendar"></i> 
                                <span>{{ date('F, j y', strtotime($post->created_at)) }}</span>
                            </span>
                            <span class="comment">
                                <i class="ion-chatbubble-working"></i> {{$post->discussions_count}}
                            </span>
                            <span class="comment">
                                <i class="ion-heart"></i> {{ $post->likes_count }}
                            </span>
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <h1 class="entry-title">{{ $post->title }}</h1>
                        </a>
                        <div class="entry-content"> 
                            {{ Str::words($post->excerpt, 20) }}
                        </div>
                        <div class="entry-more">
                            <a href="{{ route('blog.show', $post->slug) }}">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div><div class="lead text-center">No Post Found</div></div>  
            @endforelse
            
        </div>
        <div class="loadmore-contain">
            <a class="organik-btn small" href="{{ route('blog.index') }}"> Show All Posts </a>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <hr class="mt-7 mb-3" />
            </div>
        </div>
    </div>
</div>
<div class="section pt-2 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="client-carousel" data-auto-play="true" data-desktop="5" data-laptop="3" data-tablet="3" data-mobile="2">
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_1.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_2.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_3.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_4.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_5.png') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection