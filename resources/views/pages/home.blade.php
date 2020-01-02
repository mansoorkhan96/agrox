@extends('layouts.main')

@section('content')
<div class="section section-bg-1 section-cover pt-17 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="mt-3 mb-3">
                    <img src="{{ asset('images/oranges.png') }}" alt="" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1 section-pretitle default-left">Welcome to</div>
                <h2 class="section-title mtn-2 mb-3">Organik Store</h2>
                <p class="mb-4">
                    Organic store opened its doors in 1990, it was Renée Elliott's dream to offer the best and widest range of organic foods available, and her mission to promote health in the community and to bring a sense of discovery and adventure into food shopping.
                </p>
                <a class="organik-btn arrow" href="#">Our products</a>
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
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="text-center">
                    <ul class="masonry-filter">
                        <li><a href="#" data-filter="" class="active">All</a></li>
                        <li><a href="#" data-filter=".dried">Dried</a></li>
                        <li><a href="#" data-filter=".fruits">Fruits</a></li>
                        <li><a href="#" data-filter=".vegetables">Vegetables</a></li>
                        <li><a href="#" data-filter=".juice">Juice</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-grid masonry-grid-post">
                <div class="col-md-3 col-sm-6 product-item masonry-item text-center juice">
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
                <div class="col-md-3 col-sm-6 product-item masonry-item text-center fruits">
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
                <div class="col-md-3 col-sm-6 product-item masonry-item text-center dried">
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
                <div class="col-md-3 col-sm-6 product-item masonry-item text-center fruits">
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
                <div class="col-md-3 col-sm-6 product-item masonry-item text-center vegetables">
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
                <div class="col-md-3 col-sm-6 product-item masonry-item text-center vegetables">
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
                <div class="col-md-3 col-sm-6 product-item masonry-item text-center vegetables">
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
                <div class="col-md-3 col-sm-6 product-item masonry-item text-center fruits">
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
            <div class="loadmore-contain">
                <a class="organik-btn small" href="#"> Load more </a>
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
            <div class="col-md-4">
                <div class="blog-grid-item">
                    <div class="post-thumbnail">
                        <a href="blog-detail.html"> 
                            <img src="{{ asset('images/blog/blog_1.jpg') }}" alt="" /> 
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-meta">
                            <span class="posted-on">
                                <i class="ion-calendar"></i> 
                                <span>August 9, 2016</span>
                            </span>
                            <span class="comment">
                                <i class="ion-chatbubble-working"></i> 0
                            </span>
                        </div>
                        <a href="blog-detail.html">
                            <h1 class="entry-title">How to steam &amp; purée your sugar pie pumkin</h1>
                        </a>
                        <div class="entry-content"> 
                            Cut the halves into smaller pieces and place in a large pot of water with a steam basket to keep the pumpkin pieces from touching…
                        </div>
                        <div class="entry-more">
                            <a href="blog-detail.html">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid-item">
                    <div class="post-thumbnail">
                        <a href="blog-detail.html"> 
                            <img src="{{ asset('images/blog/blog_2.jpg') }}" alt="" /> 
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-meta">
                            <span class="posted-on">
                                <i class="ion-calendar"></i> 
                                <span>August 9, 2016</span>
                            </span>
                            <span class="comment">
                                <i class="ion-chatbubble-working"></i> 0
                            </span>
                        </div>
                        <a href="blog-detail.html">
                            <h1 class="entry-title">Great bulk recipes to help use all your organic vegetables</h1>
                        </a>
                        <div class="entry-content"> 
                            A fridge full of organic vegetables purchased or harvested with the best of intentions, and then life gets busy, leaving no time to peel,
                        </div>
                        <div class="entry-more">
                            <a href="blog-detail.html">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid-item">
                    <div class="post-thumbnail">
                        <a href="blog-detail.html"> 
                            <img src="{{ asset('images/blog/blog_1.jpg') }}" alt="" /> 
                        </a>
                    </div>
                    <div class="post-content">
                        <div class="entry-meta">
                            <span class="posted-on">
                                <i class="ion-calendar"></i> 
                                <span>August 9, 2016</span>
                            </span>
                            <span class="comment">
                                <i class="ion-chatbubble-working"></i> 0
                            </span>
                        </div>
                        <a href="blog-detail.html">
                            <h1 class="entry-title">How can salmon be raised organically in fish farms?</h1>
                        </a>
                        <div class="entry-content"> 
                            Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look
                        </div>
                        <div class="entry-more">
                            <a href="blog-detail.html">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
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