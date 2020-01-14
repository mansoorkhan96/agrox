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
                    <div class="col-6 text-muted">First Name:</div>
                    <div class="col-6">Lynn</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Last Name:</div>
                    <div class="col-6">Weaver</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Age:</div>
                    <div class="col-6">26</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Position:</div>
                    <div class="col-6">Web Designer</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">City:</div>
                    <div class="col-6">New York, USA</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Address:</div>
                    <div class="col-6">228 Park Ave Str.</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Phone:</div>
                    <div class="col-6">+1-202-555-0134</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6 text-muted">Email:</div>
                    <div class="col-6">lweaver@gmail.com</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">BIOGRAPHY</h5>
                <p>Lorem Ipsum Aliqua id consequat laborum incididunt adipiscing ut consectetur dolor voluptate non est ex dolore voluptate fugiat adipiscing qui deserunt nisi magna irure tempor non cupidatat amet fugiat est ad sint adipiscing
                    est officia cillum consectetur reprehenderit non.</p>
            </div>
        </div>
        
    </div>
</div>
@endsection