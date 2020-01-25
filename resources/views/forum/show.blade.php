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
                            <span class="text-muted pl-3 pr-3 text-center"><i class="fa fa-comment-o d-block font-16 mb-2"></i>56</span>
                        </div>
                    </div>
                    
                </div>
                <h1 class="text-center my-5">{{ $post->title }}</h1>
                <p>{{ $post->excerpt }}</p>
                <div class="row">
                @if ($post->featured_image)
                    <div class="col-lg-6 mb-4 mt-4">
                        <img src="{{ asset('/storage/' . $post->featured_image) }}" alt="image" />
                    </div>
                @endif
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
                <div class="">
                    <a href="{{ route('profile.show', $author->id) }}">
                        <p class="lead">{{ $author->name }}</p>
                    </a>
                    <div class="d-flex">
                        <img width="70" height="70" src="{{ avatar($author->avatar) }}" alt="">
                    
                        <p class="pt-2 pl-3 pr-3 pb-3">{{ $author->bio }} </p>
                    </div>
                </div>
                
                
                <hr class="my-4">
                <h5 class="font-strong mb-3"><i class="fa fa-comment-o mr-2"></i>{{ count($comments) }} Answer(s)</h5>
                <ul class="media-list">
                    @forelse ($comments as $item)
                    <li class="media">
                        <a class="media-img" href="{{ route('profile.show', $item['user']['id']) }}">
                            <img src="{{ avatar($item['user']['avatar']) }}" alt="image" width="45" />
                        </a>
                        <div class="media-body">
                            <div class="media-heading">
                                <a class="comment-author" href="{{ route('profile.show', $item['user']['id']) }}">
                                    {{ $item['user']['name'] }}
                                </a><small class="text-muted ml-2">{{ date('F, j Y', strtotime($item['user']['created_at'])) }}</small>
                                <div class="pull-right font-13">
                                    
                                </div>
                            </div>
                            <p class="m-0">{!! $item['discussion'] !!}</p>
                        </div>
                    </li>
                    @empty
                        <p class="lead">No Answers</p>
                    @endforelse
                </ul>
                <h5 class="font-strong mt-4 mb-3">Your Answer</h5>
                {{ Form::open(['route' => ['post.createcomment', $post->id], 'method' => 'post']) }}
                    <div class="form-group">
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Write Your Answer', 'id' => 'summernote', 'data-plugin'=>'summernote', 'data-air-mode' => 'true']) }}
                        @error('comment')
                            <label for="comment" class="col-form-label text-danger">{{ $message }}</label>
                        @enderror
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

@section('page_script')
    <script src="{{ asset('assets/vendors/summernote/dist/summernote.min.js') }}"></script>
    <script>
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
@endsection