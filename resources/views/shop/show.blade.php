@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="single-product">
                    <div class="col-md-6">
                        <div class="image-gallery">
                            <div class="image-gallery-inner">
                                <div>
                                    <div class="image-thumb">
                                        <a href="{{ asset('/storage/' . $product->featured_image) }}" data-rel="prettyPhoto[gallery]">
                                            <img src="{{ asset('/storage/' . $product->featured_image) }}" alt="" />
                                        </a> 
                                    </div>
                                </div>
                                @php
                                    $product_images = explode(',', $product->images);
                                @endphp
                                
                                @forelse ($product_images as $product_image)
                                <div>
                                    <div class="image-thumb">
                                        <a href="{{ asset('/storage/' . $product_image) }}" data-rel="prettyPhoto[gallery]">
                                            <img src="{{ asset('/storage/' . $product_image) }}" alt="" />
                                        </a> 
                                    </div>
                                </div>
                                @empty
                                    
                                @endforelse
                                
                            </div>
                        </div>
                        <div class="image-gallery-nav">
                            <div class="image-nav-item">
                                <div class="image-thumb">
                                    <img src="{{ asset('/storage/' . $product->featured_image) }}" alt="" />
                                </div>
                            </div>
                            @forelse ($product_images as $product_image)
                            <div class="image-nav-item">
                                <div class="image-thumb">
                                    <img src="{{ asset('/storage/' . $product_image) }}" alt="" />
                                </div>
                            </div>
                            @empty
                                
                            @endforelse
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="summary">
                            <h1 class="product-title">{{ $product->name }}</h1>
                            <div class="product-rating">
                                <div class="star-rating">
                                    <span style="width:100%"></span>
                                </div>
                                <i>(2 customer reviews)</i>
                            </div>
                            <div class="product-price">
                                <del>$15.00</del>
                                <ins>RS {{ $product->price }}</ins>
                            </div>
                            <div class="mb-3">
                                <p>Relish the goodness of hand-picked oranges from the finest orchards. Foster a healthy lifestyle with the benefits of oranges. 100 percent orange juice with no added sugar for a healthy you.</p>
                            </div>
                            <form class="cart">
                                <div class="quantity-chooser">
                                    <div class="quantity">
                                        <span class="qty-minus" data-min="1"><i class="ion-ios-minus-outline"></i></span>
                                        <input type="text" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
                                        <span class="qty-plus" data-max=""><i class="ion-ios-plus-outline"></i></span>
                                    </div>
                                </div>
                                <button type="submit" class="single-add-to-cart">ADD TO CART</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="commerce-tabs tabs classic">
                            <ul class="nav nav-tabs tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab-description" aria-expanded="true">Description</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#tab-reviews" aria-expanded="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab-description">
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <div id="tab-reviews" class="tab-pane fade">
                                    <div class="single-comments-list mt-0">
                                        <div class="mb-2">
                                            <h2 class="comment-title">2 reviews for Orange Juice</h2>
                                        </div>
                                        <ul class="comment-list">
                                            <li>
                                                <div class="comment-container">
                                                    <div class="comment-author-vcard">
                                                        <img alt="" src="{{ asset('images/avatar/avatar.png') }}" />
                                                    </div>
                                                    <div class="comment-author-info">
                                                        <span class="comment-author-name">admin</span>
                                                        <a href="#" class="comment-date">July 27, 2016</a>
                                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                                    </div>
                                                    <div class="reply">
                                                        <a class="comment-reply-link" href="#">Reply</a>
                                                    </div>
                                                </div>
                                                <ul class="children">
                                                    <li>
                                                        <div class="comment-container">
                                                            <div class="comment-author-vcard">
                                                                <img alt="" src="{{ asset('images/avatar/avatar.png') }}" />
                                                            </div>
                                                            <div class="comment-author-info">
                                                                <span class="comment-author-name">admin</span>
                                                                <a href="#" class="comment-date">July 27, 2016</a>
                                                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                                            </div>
                                                            <div class="reply">
                                                                <a class="comment-reply-link" href="#">Reply</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="comment-container">
                                                    <div class="comment-author-vcard">
                                                        <img alt="" src="{{ asset('images/avatar/avatar.png') }}" />
                                                    </div>
                                                    <div class="comment-author-info">
                                                        <span class="comment-author-name">admin</span>
                                                        <a href="#" class="comment-date">July 27, 2016</a>
                                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                                    </div>
                                                    <div class="reply">
                                                        <a class="comment-reply-link" href="#">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="single-comment-form mt-0">
                                        <div class="mb-2">
                                            <h2 class="comment-title">LEAVE A REPLY</h2>
                                        </div>
                                        <form class="comment-form">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea id="comment" name="comment" cols="45" rows="5" placeholder="Message *"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input id="author" name="author" type="text" value="" size="30" placeholder="Name *" class="mb-2">
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="email" name="email" type="email" value="" size="30" placeholder="Email *" class="mb-2">
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="url" name="url" type="text" value="" placeholder="Website">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <input name="submit" type="submit" id="submit" class="btn btn-alt btn-border" value="Submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related">
                            <div class="related-title">
                                <div class="text-center mb-1 section-pretitle fz-34">Related</div>
                                <h2 class="text-center section-title mtn-2 fz-24">Products</h2>
                            </div>
                            <div class="product-carousel p-0" data-auto-play="true" data-desktop="3" data-laptop="2" data-tablet="2" data-mobile="1">
                            @forelse ($related_products as $related_product)
                                <div class="product-item text-center">
                                    <div class="product-thumb">
                                        <a href="/shop/{{ $related_product->slug }}">
                                            <img src="{{ asset('/storage/' . $related_product->featured_image) }}" alt="" />
                                        </a>
                                        <div class="product-action">
                                            <span class="add-to-cart">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="/shop/{{ $related_product->slug }}">
                                            <h2 class="title">{{ $related_product->name }}</h2>
                                            <span class="price">RS {{ $related_product->price }}</span>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="lead text-center">No Related Products Found</div>
                            @endforelse
                                
                            </div>
                        </div>
                    </div>
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