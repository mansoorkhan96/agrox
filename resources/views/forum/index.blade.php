@extends('layouts.admin')

@section('content')
<div class="ibox">
    <div class="ibox-body">
        <h5 class="font-strong mb-4">My Forum Topics</h5>
        <div class="flexbox mb-4">
            <div class="flexbox">
                
            </div>
            <div class="flexbox">
                <div class="input-group-icon input-group-icon-left mr-3">
                    <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                    <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                </div>
                <a class="btn btn-success btn-air" href="/dashboard/posts/create">
                    <i class="la la-plus"></i> Add New
                </a>
            </div>
        </div>
        <div class="table-responsive row">
            <table class="table table-bordered table-hover" id="datatable">
                <thead class="thead-default thead-lg">
                    <tr>
                        <th>Title</th>
                        <th>Categories</th>
                        <th>Excerpt</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($myForums as $post)
                    @php
                        extract($post)
                    @endphp
                        <tr>
                            <td>
                                {{$title}}</td>
                            <td>
                                @forelse ($categories as $category)
                                    {{ $category['name'] }}
                                    @if (! $loop->last)|@endif
                                @empty
                                    Uncategorized
                                @endforelse
                            </td>
                            <td width="35%">{{ Str::words($excerpt, 10) }}</td>
                            <td>
                                <a class="text-light mr-3 font-16" href="{{ route('forum.show', $id) }}"><i class="ti-eye"></i></a>
                                <a class="text-light mr-3 font-16" href="{{ route('posts.edit', $id) }}"><i class="ti-pencil"></i></a>
                            </td>
                        </tr>
                    @empty
                    <tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No records found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-8">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">Latest Forum Topics</div>
                <div class="ibox-tools">
                    <a class="dropdown-toggle font-18" data-toggle="dropdown"><i class="ti-ticket"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('posts.create') }}" class="dropdown-item"><i class="ti-pencil mr-2"></i>Create</a>
                    </div>
                </div>
            </div>
            <div class="ibox-body">
                <ul class="media-list media-list-divider scroller mr-2" >
                    @forelse ($forums as $post)
                    <li class="media">
                        <div class="media-body d-flex">
                            <div class="flex-1">
                                <h5 class="media-heading">
                                    <a href="{{ route('forum.show', $post->id) }}">{{ $post->title }}</a>
                                </h5>
                                <p class="font-13 text-light mb-1">{{ Str::limit($post->excerpt, 200) }}</p>
                                <div class="d-flex align-items-center font-13">
                                    <img class="img-circle mr-2" src="{{ avatar($post->user->avatar) }}" alt="image" width="22" />
                                    <a class="mr-2 text-success" href="javascript:;">{{ $post->user->name }}</a>
                                    <span class="text-muted">{{ date('h:i A', strtotime($post->created_at)) }}</span>
                                </div>
                            </div>
                            <div class="text-right" style="width:100px;">
                                <div><small class="text-muted font-12"><i class="fa fa-reply mr-2"></i>{{ $post->discussions_count }} answer(s)</small></div>
                            </div>
                        </div>
                    </li>    
                    @empty
                    <p class="lead">No Forum Topics</p>  
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">Active Topics</div>
            </div>
            <div class="ibox-body">
                <ul class="media-list media-list-divider mr-2 scroller" data-height="480px">
                    @forelse ($activeTopics as $topic)
                    <li class="media align-items-center">
                        <div class="media-body d-flex align-items-center">
                            <div class="flex-1">
                                <div class="media-heading">
                                    <a href="{{ route('forum.show', $topic->id) }}">{{ $topic->title }}</a> 
                                </div>
                                <small class="text-muted">{{ Str::limit($topic->excerpt, 100) }}</small></div>
                        </div>
                    </li>
                    @empty
                        <p class="lead">No Active Topics</p>
                    @endforelse
                    
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection