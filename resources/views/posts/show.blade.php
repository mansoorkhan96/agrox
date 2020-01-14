@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 centered">
        <div class="ibox">
            <div class="ibox-body">
                <div class="flexbox">
                    <div class="flexbox">
                        <div class="article-date mr-4 text-primary bg-primary-50">
                            <h5 class="font-strong mb-0">{{ date('j', strtotime($post->created_at)) }}</h5>
                            <span class="font-13">{{ date('M', strtotime($post->created_at)) }}</span>
                        </div>
                        <div class="d-inline-flex">
                            <span class="text-muted pl-3 pr-3 text-center" style="border-right:1px solid rgba(0,0,0,.1);"><i class="fa fa-heart-o d-block font-16 mb-2"></i>124</span>
                            <span class="text-muted pl-3 pr-3 text-center"><i class="fa fa-comment-o d-block font-16 mb-2"></i>56</span>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-outline-secondary btn-icon-only btn-circle btn-air mr-2"><i class="fa fa-facebook"></i></button>
                        <button class="btn btn-outline-secondary btn-icon-only btn-circle btn-air mr-2"><i class="fa fa-twitter"></i></button>
                        <button class="btn btn-outline-secondary btn-icon-only btn-circle btn-air mr-2"><i class="fa fa-dribbble"></i></button>
                        <button class="btn btn-outline-secondary btn-icon-only btn-circle btn-air"><i class="fa fa-linkedin"></i></button>
                    </div>
                </div>
                <h1 class="text-center my-5">{{ $post->title }}</h1>
                <p>{{ $post->excerpt }}</p>
                <div class="row">
                    <div class="col-lg-6 mb-4 mt-4">
                        <img src="{{ asset('/storage/' . $post->featured_image) }}" alt="image" />
                    </div>
                </div>
                
                <p> {!! $post->body !!} </p>
                <hr class="my-4">

                <div class="flexbox">
                    <div>
                        <h5>Attachments: </h5>
                        @if ($post->attachments)
                        @php
                            $attachments = explode(',', $post->attachments)
                        @endphp
                            <ul class="list-unstyled">
                                @foreach ($attachments as $key => $item)
                                <li>
                                    <a href="{{ asset('/storage/' . $item) }}" download> Attachment - {{$key + 1}}</a>
                                </li>
                                @endforeach
                            </ul>
                        @else 
                            <p class="lead">No Attachment</p>
                        @endif
                    </div>
                </div>
                <hr class="my-4">

                <div class="flexbox">
                    <div>
                        <b>Categories: </b>
                        @forelse ($post_categories as $category)
                            <span class="badge badge-primary mr-2">{{ $category }}</span>
                        @empty
                            <span class="badge badge-secondary">Uncategorized</span>
                        @endforelse
                    </div>
                </div>
                <hr class="my-4">
                <h5 class="font-strong mb-3"><i class="fa fa-comment-o mr-2"></i>{{ count($comments) }} comment(s)</h5>
                <ul class="media-list">
                    @forelse ($comments as $item)
                    <li class="media">
                        <a class="media-img" href="{{ route('profile.show', $item['user']['id']) }}">
                            <img src="{{ avatar($item['user']['avatar']) }}" alt="image" width="45" />
                        </a>
                        <div class="media-body">
                            <div class="media-heading">
                                <a class="comment-author" href="{{ route('profile.show', $item['user']['id']) }}">{{ $item['user']['name'] }}</a><small class="text-muted ml-2">{{ date('F, j Y', strtotime($item['user']['created_at'])) }}</small>
                                <div class="pull-right font-13">
                                    {{ Form::open(['route' => ['post.deletecomment', $item['id']], 'method' =>'delete']) }}
                                        <button type="submit" class="no-btn text-muted mr-2">
                                            <i class="fa fa-trash font-18"></i>
                                        </button>
                                    {{ Form::close() }}
                                </div>
                            </div>
                            <p class="m-0">{{ $item['discussion'] }}</p>
                        </div>
                    </li>
                    @empty
                        <p class="lead">No Comments</p>
                    @endforelse
                </ul>
                <h5 class="font-strong mt-4 mb-3">Leave A Comment</h5>
                {{ Form::open(['route' => ['post.createcomment', $post->id], 'method' => 'post']) }}
                    <div class="form-group">
                        <textarea class="form-control" name="comment" required rows="5" placeholder="Comment here"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">SUBMIT</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection