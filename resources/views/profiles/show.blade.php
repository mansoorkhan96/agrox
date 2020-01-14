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
                            <p class="lead">{{ roleName($user->role_id) }}</p>
                            @if ($user->id == auth()->user()->id)
                            <p class="lead">
                                <a href="{{ route('profile.edit', auth()->user()->id) }}">Edit Profile</a></p>
                            @endif
                        </div>
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