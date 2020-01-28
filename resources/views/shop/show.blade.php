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
                                <ul class="post-meta w-30" style="display:inline-block">
                                    <li id="post-rating" style="display: inline-block;" class=""> {{ $productRating }} </li>
                                    <li style="display: inline-block; color: #5fbd74" class=""> <i class="star fa fa-star"></i> </li> &nbsp; 
                                </ul>
                                <i>[ {{ count($reviews) }} customer review(s) ]</i>
                            </div>
                            <div class="product-price">
                                
                                <ins>RS {{ $product->price }}</ins>
                            </div>
                            <div class="mb-3">
                                <p>{{ $product->details }}</p>
                            </div>
                            @if ($product->quantity > 0)
                                {{ Form::open(['action' => 'CartController@store', 'method' => 'POST', 'id' => 'add_to_cart', 'style' => 'display: inline-block;']) }}
                                    {{ Form::hidden('id', $product['id']) }}
                                    {{ Form::hidden('seller_id', $product['user_id']) }}
                                    {{ Form::hidden('image', $product['featured_image']) }}
                                    {{ Form::hidden('name', $product['name']) }}
                                    {{ Form::hidden('details', $product['details']) }}
                                    {{ Form::hidden('price', $product['price']) }}
                                    {{ Form::hidden('slug', $product['slug']) }}
                                    <button type="submit" class="single-add-to-cart">ADD TO CART</button>
                                {{ Form::close() }}

                                {{ Form::open(['action' => 'CartController@buy', 'method' => 'POST', 'id' => 'add_to_cart', 'style' => 'display: inline-block;']) }}
                                    {{ Form::hidden('id', $product['id']) }}
                                    {{ Form::hidden('seller_id', $product['user_id']) }}
                                    {{ Form::hidden('image', $product['featured_image']) }}
                                    {{ Form::hidden('name', $product['name']) }}
                                    {{ Form::hidden('details', $product['details']) }}
                                    {{ Form::hidden('price', $product['price']) }}
                                    {{ Form::hidden('slug', $product['slug']) }}
                                    <span class="add-to-cart">
                                        <button type="submit" class="organik-btn small ml-1" data-placement="top" title="Add to cart">Buy</button>
                                    </span>
                                {{ Form::close() }}
                            @else
                                <span class="badge badge-warning">Not Available</span>
                            @endif
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
                                        {!! $product->description !!}
                                    </p>
                                </div>
                                <div id="tab-reviews" class="tab-pane fade">
                                    <div class="single-comments-list mt-0">
                                        <div class="mb-2">
                                            <h2 class="comment-title">{{ count($reviews) }} review(s) for {{ $product->name }}</h2>
                                        </div>
                                        <ul class="comment-list">
                                            @forelse ($reviews as $comment)
                                            <li>
                                                <div class="comment-container">
                                                    <div class="comment-author-vcard">
                                                        <img alt="" src="{{ avatar($comment->user->avatar) }}" />
                                                    </div>
                                                    <div class="comment-author-info">
                                                        <span class="comment-author-name">{{ $comment->user->name }}</span>
                                                        <a href="#" class="comment-date">{{ date('F, j Y', strtotime($comment->created_at)) }}</a>
                                                        <p>{{ $comment->review }}</p>
                                                    </div>
                                                    <div class="reply">
                                                        <a class="comment-reply-link" href="#comment">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                            @empty
                                                <div><p class="lead textcenter">No Reviews</p></div>
                                            @endforelse
                                        </ul>
                                    </div>
                                    @if($userCanReview === true)
                                    <div class="single-comment-form mt-0">
                                        <div class="mb-2">
                                            <h2 style="display:inline-block" class="comment-title">Review Product</h2>
                                            <ul id="rating" style="display: inline-block;" class="post-meta pull-right w-30">
                                                <li>Rate :</li>
                                                <li id="1" class="star-outer"> <i class="star fa fa-star"></i> </li>
                                                <li id="2" class="star-outer"> <i class="star fa fa-star"></i> </li>
                                                <li id="3" class="star-outer"> <i class="star fa fa-star"></i> </li>
                                                <li id="4" class="star-outer"> <i class="star fa fa-star"></i> </li>
                                                <li id="5" class="star-outer"> <i class="star fa fa-star"></i> </li>
                                            </ul>
                                        </div>
                                        {{ Form::open(['method' => 'POST', 'class' => 'comment-form', 'id' => 'create-comment']) }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea id="comment" name="comment" cols="45" rows="5" placeholder="Message *"></textarea>
                                                    <label for="comment" id="comment-error" style="display:none" class="text-danger">Comment field is required</label>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <input name="submit" type="submit" id="submit" class="btn btn-alt btn-border" value="Submit">
                                                </div>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                    @endif
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

@section('page_script')
    <script>
        $(document).ready(function() {

            $('.star-outer').click(function() {
                let url = "{{ route('productRating.store', $product->id) }}";
                let rating = this.id;

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {rating: rating}
                }).done(function(data) {
                    if(data.success) {
                        $('#post-rating').html(data.productRating);
                        unstyle_stars();
                        style_stars(rating);
                    }
                });
            });

            style_stars('{{ $userRating }}');

            function style_stars(count) {
                for (let i = 1; i <= count; i++ ) {
                    document.getElementById(i).style.color='#5fbd74';
                }
            }

            function unstyle_stars() {
                $('.star-outer').css('color', '#aaa');
            }

            $(document).on('submit', '#create-comment', function(e) {
                e.preventDefault();
                let url = '{{ route("product.review", $product->id) }}'

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: $(this).serialize()
                }).done(function(data) {
                    if(data.success) {
                        toastr.success(data.success, 'Success');

                        $('#comment-error').hide();

                        let output = '';

                        $.each(data.reviews, function(key, item) {
                            let avatar = item.user.avatar;
                            let name = item.user.name;
                            let created_at = item.created_at;
                            let review = item.review

                            output += 
                            `
                                <li>
                                    <div class="comment-container">
                                        <div class="comment-author-vcard">
                                            <img alt="" src="{{ avatar('${avatar}') }}" />
                                        </div>
                                        <div class="comment-author-info">
                                            <span class="comment-author-name">${name}</span>
                                            <a href="" class="comment-date">{{ date('F, j Y', time()) }}</a>
                                            <p>${review}</p>
                                        </div>
                                        <div class="reply">
                                            <a class="comment-reply-link" href="comment">Reply</a>
                                        </div>
                                    </div>
                                </li>
                           `
                        });
                        $('.comment-list').html(output)

                        $('#create-comment').trigger("reset");
                    }
                }).fail(function(data) {
                    $('#comment-error').show();
                });
            });
        });
    </script>
@endsection