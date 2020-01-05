@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="commerce">
                    <h2 class="text-center">Login</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="auth/facebook" class="btn btn-md btn-block btn-primary" value="">Login &nbsp; with &nbsp; Facebook</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="auth/google" class="btn btn-md btn-block btn-danger" value="">Login &nbsp; with &nbsp; Google</a>
                        </div>
                    </div>
                    {{ Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'commerce-login-form']) }}
                        <div class="row">
                            <div class="col-md-12">
                                <label>Email address <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="text" name="email" placeholder="Enter email address" name="your-name" value="" size="40">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Password <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="password" name="password" placeholder="Enter Password" name="your-pass" value="" size="40">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input type="submit" value="LOGIN">
                                    <input name="remember" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <span>Remember me</span> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#">Lost your password?</a>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection