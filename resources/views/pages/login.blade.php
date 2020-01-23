@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="commerce">
                    <h2>Login</h2>
                    <form class="commerce-login-form">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Username or email address <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="text" name="your-name" value="" size="40">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Password <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="password" name="your-pass" value="" size="40">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input type="submit" value="LOGIN">
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" />
                                    <span>Remember me</span> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('password.request') }}">Lost your password? k;</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection