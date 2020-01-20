@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-xl-8">
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
    <div class="col-xl-4">
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
@endsection