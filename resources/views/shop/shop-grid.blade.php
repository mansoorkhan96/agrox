@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="shop-filter">
                    <div class="col-md-6">
                        <p class="result-count"></p>
                    </div>
                    <div class="col-md-6">
                        <div class="shop-filter-right">
                            <div class="switch-view">
                                <a href="/shop" id="shop_list" class="switcher">
                                    <i class="ion-navicon"></i>
                                </a> 
                                <a href="javascript:;" id="shop_grid" class="switcher active">
                                    <i class="ion-grid"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid">
                    @forelse ($products as $product)
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="{{ route('shop.show', $product->slug) }}">
                                @if ($product['quantity'] < 1)
                                <span class="outofstock"><span>Out</span>of stock</span>
                                @endif
                                <img src="{{ asset('/storage/' . $product->featured_image) }}" alt="" />
                            </a>
                            <div class="product-action">
                                @if ($product->quantity > 0)
                                {{ Form::open(['action' => 'CartController@store', 'method' => 'POST', 'id' => 'add_to_cart']) }}
                                    {{ Form::hidden('id', $product['id']) }}
                                    {{ Form::hidden('seller_id', $product['user_id']) }}
                                    {{ Form::hidden('image', $product['featured_image']) }}
                                    {{ Form::hidden('name', $product['name']) }}
                                    {{ Form::hidden('details', $product['details']) }}
                                    {{ Form::hidden('price', $product['price']) }}
                                    {{ Form::hidden('slug', $product['slug']) }}
                                    <span class="add-to-cart">
                                        <button type="submit" class="organik-btn small" data-placement="top" title="Add to cart">Add To Cart</button>
                                    </span>
                                {{ Form::close() }}
                                @endif
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('shop.show', $product->slug) }}">
                                <h2 class="title">{{ $product->name }}</h2>
                                <span class="price">
                                     
                                    <ins>RS {{ $product->price }}</ins>
                                </span>
                            </a>
                        </div>
                    </div>  
                    @empty
                        <div class="lead text-center">No Products To Show</div>
                    @endforelse
                </div>
                <div class="pagination"> 
                    {{ $products->links() }}
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="widget widget-product-search">
                        <form class="form-search">
                            <input type="text" class="search-field" placeholder="Search products…" value="{{ request()->search_query ?? '' }}" name="search_query" />
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