@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-list">
                    @forelse ($posts as $post)
                    <div class="blog-list-item">
                        <div class="col-md-6">
                            <div class="post-thumbnail">
                                <a href="{{ route('blog.show', $post['slug']) }}"> 
                                    <img src="{{ asset('/storage/' . $post['featured_image']) }}" alt="" /> 
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-content">
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <i class="ion-calendar"></i> 
                                        <span>{{ date('F, j Y', strtotime($post['created_at'])) }}</span>
                                    </span>
                                    <span class="comment">
                                        <i class="ion-chatbubble-working"></i> 0
                                    </span>
                                </div>
                                <a href="{{ route('blog.show', $post['slug']) }}">
                                    <h1 class="entry-title">{{ $post['title'] }}</h1>
                                </a>
                                <div class="entry-content"> 
                                    {{ Str::words($post['excerpt'], 20) }}
                                </div>
                                <div class="entry-more">
                                    <a href="{{ route('blog.show', $post['slug']) }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div><p class="lead text-center">No Post Found</p></div>
                    @endforelse
                </div>
                <div class="pagination"> 
                    <a class="prev page-numbers" href="#">Prev</a>
                    <a class="page-numbers" href="#">1</a>
                    <span class="page-numbers current">2</span> 
                    <a class="page-numbers" href="#">3</a> 
                    <a class="next page-numbers" href="#">Next</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="widget widget-product-search">
                        <form class="form-search">
                            <input type="text" class="search-field" placeholder="Search posts…" value="" name="s" />
                            <input type="submit" value="Search" />
                        </form>
                    </div>
                    <div class="widget widget-product-categories">
                        <h3 class="widget-title">Post Categories</h3>
                        <ul class="product-categories">
                            @forelse ($categoriesPostCount as $item)
                            <li><a href="#">{{ $item->name }}</a> <span class="count">{{ $item->posts_count }}</span></li>  
                            @empty
                                
                            @endforelse
                        </ul>
                    </div>
                    <div class="widget widget_posts_widget">
                        <h3 class="widget-title">Popular Posts</h3>
                        @forelse ($popular as $item) 
                        <div class="item">
                            <div class="thumb"> 
                                <img src="{{ asset('/storage/' . $item['featured_image']) }}" alt="" />
                            </div>
                            <div class="info">
                                <span class="title">
                                    <a href="{{ route('blog.show', $item['slug']) }}"> {{ $item['title'] }} </a> 
                                </span> 
                                <span class="date"> {{ date('F, j Y', strtotime($item['created_at'])) }} </span>
                            </div>
                        </div>
                        @empty
                            <div><p class="lead text-center">No Posts Found</p></div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection