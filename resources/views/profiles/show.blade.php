@extends('layouts.admin')

@section('page-header')
<div class="page-header">
    <div class="ibox flex-1">
        <div class="ibox-body">
            <div class="flexbox">
                <div class="flexbox-b">
                    <div class="ml-5 mr-5">
                        <img class="img-circle" src="{{ avatar($user->avatar) }}" alt="image" width="110" />
                    </div>
                    <div>
                        <h4>{{ $user->name }}</h4>
                        <div class="text-muted font-13 mb-3">
                            <span class="mr-3"><i class="ti-location-pin mr-2"></i>{{ $user->address }}</span>
                            <span><i class="ti-calendar mr-2"></i>{{ date('F, j Y', strtotime($user->created_at)) }}</span>
                        </div>
                        <div>
                            <p class="lead">
                                Role: {{ roleName($user->role_id) }}
                                @if ($proficiency)
                                    | Proficiency: {{ $proficiency }}
                                @endif
                            </p>
                            @can('update', $user)
                            <p class="lead">
                                <a style="color: #18c5a9" href="{{ route('profile.edit', auth()->user()->id) }}">Edit Profile</a> 
                                @if (auth()->user()->id == $user->id)   
                                 | <a style="color: #18c5a9" href="{{ route('password.request') }}">Reset Password</a>
                                @endif
                            </p>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex">
                    @if ($user->role_id == 3)
                    <div class="px-4 text-center">
                        <div class="text-muted font-13">RATING</div>
                        <div class="h2 mt-2">{{ consultancyRating($user->id) }}</div>
                    </div>
                    @endif
                    <div class="px-4 text-center">
                        <div class="text-muted font-13">ARTICLES</div>
                        <div class="h2 mt-2">{{ $userPostCount }}</div>
                    </div>
                    <div class="px-4 text-center">
                        <div class="text-muted font-13">ARTICLE LIKES</div>
                        <div class="h2 mt-2">{{ $userPostLikeCount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-5">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">GENERAL INFORMATION</h5>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Name:</div>
                    <div class="col-6">{{ $user->name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Email:</div>
                    <div class="col-6">{{ $user->email }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Phone:</div>
                    <div class="col-6">{{ $user->phone }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">City:</div>
                    <div class="col-6">{{ $location['name'] ?? '' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Province:</div>
                    <div class="col-6">{{ $location['province']['name'] ?? '' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Country:</div>
                    <div class="col-6">{{ $location['province']['country']['name'] ?? '' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Street Address:</div>
                    <div class="col-6">{{ $user->address }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">BIOGRAPHY</h5>
                <p>{{ $user->bio }}</p>
            </div>
        </div>
        
    </div>
</div>
@endsection