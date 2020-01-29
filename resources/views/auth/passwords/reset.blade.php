@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="commerce">
                    <h2 class="text-center">Reset Password</h2>
                    
                    {{ Form::open(['route' => 'password.update', 'method' => 'POST', 'class' => 'commerce-login-form']) }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row">
                            <div class="col-md-12">
                                <label>Email address <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="text" name="email" placeholder="Enter email address" name="your-name" value="{{ $email ?? old('email') }}" size="40">
                                    @error('email')
                                        <label for="email" class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Password <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="password" name="password" placeholder="Enter Password" value="" size="40">
                                    @error('password')
                                        <label for="password" class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Confirm Password <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="password" placeholder="Enter Password" name="password_confirmation" value="" size="40">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input type="submit" value="RESET">
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