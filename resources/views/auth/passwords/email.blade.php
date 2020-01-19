@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="commerce">
                    <h2 class="text-center">Reset Password</h2>
                    {{ Form::open(['route' => 'password.email', 'method' => 'POST', 'class' => 'commerce-login-form']) }}
                        <div class="row">
                            <div class="col-md-12">
                                <label>Email address <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="text" name="email" placeholder="Enter email address" name="your-name" value="" required size="40">
                                    @error('email')
                                        <label for="email" class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input type="submit" value="Send Password Reset Link">
                                </div>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection