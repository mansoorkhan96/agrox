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
                                <a href="javascript:;" id="shop_list" class="switcher active">
                                    <i class="ion-navicon"></i>
                                </a> 
                                <a href="shop/grid" id="shop_grid" class="switcher">
                                    <i class="ion-grid"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    @forelse ($products as $product)
                    <div class="product-item">
                        <div class="col-md-4 pl-0">
                            <div class="product-thumb">
                                <a href="/shop/{{ $product->slug }}">
                                    <img src="{{ '/storage/' . $product->featured_image }}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="product-info">
                                <a href="/shop/{{ $product->slug }}">
                                    <h2 class="title">{{ $product->name }}</h2>
                                    <span class="price">
                                        <del>$15.00</del> 
                                        <ins>RS {{ $product->price }}</ins>
                                    </span>
                                </a>
                                <div class="product-rating">
                                    <div class="star-rating">
                                        <span style="width:100%"></span>
                                    </div>
                                    <i>(2 customer reviews)</i>
                                </div>
                                <div class="product-desc">
                                    <p>{{ $product->details }}</p>
                                </div>
                                <div class="product-action-list">
                                    {{ Form::open(['action' => 'CartController@store', 'method' => 'POST', 'id' => 'add_to_cart']) }}
                                        {{ Form::hidden('id', $product['id']) }}
                                        {{ Form::hidden('name', $product['name']) }}
                                        {{ Form::hidden('price', $product['price']) }}
                                        <span class="add-to-cart">
                                            <button type="submit" class="organik-btn small" data-placement="top" title="Add to cart">Add To Cart</button>
                                        </span>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="lead text-center">No Products Found</div>
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
                            <input type="text" class="search-field" placeholder="Search products…" value="" name="s" />
                            <input type="submit" value="Search" />
                        </form>
                    </div>
                    <div class="widget widget-product-categories">
                        <h3 class="widget-title">Product Categories</h3>
                        <ul class="product-categories">
                            @forelse ($categoriesProductCount as $item)
                            <li><a href="#">{{ $item->name }}</a> <span class="count">{{ $item->products_count }}</span></li>  
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
                                    <del>$15.00</del>
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