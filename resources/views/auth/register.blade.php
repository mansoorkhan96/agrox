@extends('layouts.main')

@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="commerce">
                    <h2 class="text-center">Create Account</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="auth/facebook" class="btn btn-facebook btn-md btn-block btn-primary" value="">SignUp &nbsp; with &nbsp; Facebook</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="auth/google" class="btn btn-google btn-md btn-block btn-danger" value="">SignUp &nbsp; with &nbsp; Google</a>
                        </div>
                    </div>
                    {{ Form::open(['route' => 'register', 'method' => 'POST', 'class' => 'commerce-login-form']) }}
                        <div class="row">
                            <div class="col-md-12">
                                <label>Name <span class="required">*</span></label>
                                <div class="form-wrap">
                                    {{ Form::text('name', null, ['placeholder' => 'Name']) }}
                                    @error('name')
                                    <label for="name" class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Email <span class="required">*</span></label>
                                <div class="form-wrap">
                                    {{ Form::email('email', null, ['placeholder' => 'Email']) }}
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
                                    {{ Form::password('password', ['placeholder' => 'Password']) }}
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
                                    {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password']) }}
                                    @error('password_confirmation')
                                    <label for="password_confirmation" class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input type="submit" value="Create Account">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Already have an account ? <a style="color: #5fbd74;" href="{{ route('login') }}">LogIn</a>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection