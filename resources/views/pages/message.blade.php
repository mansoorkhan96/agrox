@extends('layouts.main')

@section('content')
<div class="section section-error pt-12 pb-12">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h3 class="error-title uppercase">Message</h3>
                    <h3 class="error-title uppercase" style="font-size: 30px; font-weight: 500">{{ session('message') }}</h3>
                    <span class="error-content uppercase">
                        back to 
                        <a href="/">Homepage</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection