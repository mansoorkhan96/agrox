@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="product-grid">
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="shop-detail.html">
                                <div class="badges">
                                    <span class="hot">Hot</span>
                                    <span class="onsale">Sale!</span>
                                </div>
                                <img src="{{ asset('images/shop/shop_1.jpg') }}" alt="" />
                            </a>
                            <div class="product-action">
                                <span class="add-to-cart">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                </span>
                                <span class="wishlist">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                </span>
                                <span class="quickview">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                </span>
                                <span class="compare">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h2 class="title">Orange Juice</h2>
                                <span class="price">
                                    <del>$15.00</del> 
                                    <ins>$12.00</ins>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="shop-detail.html">
                                <div class="badges">
                                    <span class="hot">Hot</span>
                                </div>
                                <img src="{{ asset('images/shop/shop_2.jpg') }}" alt="" />
                            </a>
                            <div class="product-action">
                                <span class="add-to-cart">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                </span>
                                <span class="wishlist">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                </span>
                                <span class="quickview">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                </span>
                                <span class="compare">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h2 class="title">Aurore Grape</h2>
                                <span class="price">$9.00</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="shop-detail.html">
                                <div class="badges">
                                    <span class="hot">Hot</span>
                                </div>
                                <img src="{{ asset('images/shop/shop_3.jpg') }}" alt="" />
                            </a>
                            <div class="product-action">
                                <span class="add-to-cart">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                </span>
                                <span class="wishlist">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                </span>
                                <span class="quickview">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                </span>
                                <span class="compare">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h2 class="title">Blueberry Jam</h2>
                                <span class="price">$15.00</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="shop-detail.html">
                                <img src="{{ asset('images/shop/shop_4.jpg') }}" alt="" />
                            </a>
                            <div class="product-action">
                                <span class="add-to-cart">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                </span>
                                <span class="wishlist">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                </span>
                                <span class="quickview">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                </span>
                                <span class="compare">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h2 class="title">Passionfruit</h2>
                                <span class="price">$35.00</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="shop-detail.html">
                                <div class="badges">
                                    <span class="hot">Hot</span>
                                </div>
                                <img src="{{ asset('images/shop/shop_5.jpg') }}" alt="" />
                            </a>
                            <div class="product-action">
                                <span class="add-to-cart">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                </span>
                                <span class="wishlist">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                </span>
                                <span class="quickview">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                </span>
                                <span class="compare">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h2 class="title">Carrot</h2>
                                <span class="price">$12.00</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="shop-detail.html">
                                <span class="outofstock"><span>Out</span>of stock</span>
                                <img src="{{ asset('images/shop/shop_6.jpg') }}" alt="" />
                            </a>
                            <div class="product-action">
                                <span class="add-to-cart">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                </span>
                                <span class="wishlist">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                </span>
                                <span class="quickview">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                </span>
                                <span class="compare">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h2 class="title">Sprouting Broccoli</h2>
                                <span class="price">$6.00</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="shop-detail.html">
                                <img src="{{ asset('images/shop/shop_7.jpg') }}" alt="" />
                            </a>
                            <div class="product-action">
                                <span class="add-to-cart">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                </span>
                                <span class="wishlist">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                </span>
                                <span class="quickview">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                </span>
                                <span class="compare">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h2 class="title">Chinese Cabbage</h2>
                                <span class="price">$9.00</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 product-item text-center mb-3">
                        <div class="product-thumb">
                            <a href="shop-detail.html">
                                <div class="badges">
                                    <span class="hot">Hot</span>
                                </div>
                                <img src="{{ asset('images/shop/shop_8.jpg') }}" alt="" />
                            </a>
                            <div class="product-action">
                                <span class="add-to-cart">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                </span>
                                <span class="wishlist">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                </span>
                                <span class="quickview">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                </span>
                                <span class="compare">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="shop-detail.html">
                                <h2 class="title">Tieton Cherry</h2>
                                <span class="price">$9.00</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pagination"> 
                    <a class="prev page-numbers" href="#">Prev</a>
                    <a class="page-numbers" href="#">1</a>
                    <span class="page-numbers current">2</span> 
                    <a class="page-numbers" href="#">3</a> 
                    <a class="next page-numbers" href="#">Next</a>
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
                    <div class="widget widget-tags">
                        <h3 class="widget-title">Product Tags</h3>
                        <div class="tagcloud">
                            <a href="#">bread</a> <a href="#">food</a> <a href="#">fruits</a> <a href="#">green</a> <a href="#">healthy</a> <a href="#">natural</a> <a href="#">organic store</a> <a href="#">vegatable</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection