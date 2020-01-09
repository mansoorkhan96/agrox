@extends('layouts.admin')

@section('content')
<div class="ibox">
    <form action="javascript:;">
        <div class="ibox-head">
            <div class="ibox-title">Edit Your Profile</div>
        </div>
        <div class="ibox-body">
            <div class="row ">
                <div class="col-12 ml-auto justify-content-center">
                    <img class="img-circle" src="{{ asset('assets/img/users/u8.jpg') }}" alt="image" width="110">
                    <p>Profile Image</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label>Name</label>
                        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                        @error('name')
                        <label for="name" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Email</label>
                        {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                        @error('email')
                        <label for="email" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Role</label>
                        {{ Form::select('role_id', $roles, $user->role_id, ['placeholder' => 'Select Role', 'class' => 'form-control']) }}
                        @error('role_id')
                        <label for="role_id" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label>Country</label>
                        {{ Form::select('country', $countries, null, ['placeholder' => 'Select Your Country', 'class' => 'form-control']) }}
                        @error('country')
                        <label for="country" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label>City</label>
                        {{ Form::select('city_id', $cities, $user->city_id, ['placeholder' => 'Select Your City', 'class' => 'form-control']) }}
                        @error('city_id')
                        <label for="city_id" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label>Location</label>
                        <div class="input-group-icon input-group-icon-left">
                            <span class="input-icon input-icon-left"><i class="ti-location-pin font-16"></i></span>
                            {{ Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Location']) }}
                            @error('address')
                            <label for="address" class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label>Phone Number</label>
                        {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone Number']) }}
                            @error('phone')
                            <label for="phone" class="text-danger">{{ $message }}</label>
                            @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Proficiency</label>
                        {{ Form::select('proficiency_id', $proficiencies, $user->proficiency_id, ['placeholder' => 'Select Your Proficiency', 'class' => 'form-control']) }}
                        @error('proficiency_id')
                        <label for="proficiency_id" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Province</label>
                        {{ Form::select('province_id', $proficiencies, null, ['placeholder' => 'Select Your Province', 'class' => 'form-control']) }}
                        @error('province_id')
                        <label for="province_id" class="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-0">
                <label>Account Type</label>
                <div class="mt-1">
                    <label class="radio radio-inline radio-grey radio-primary">
                        <input type="radio" name="d" checked>
                        <span class="input-span"></span>Personal</label>
                    <label class="radio radio-inline radio-grey radio-primary">
                        <input type="radio" name="d">
                        <span class="input-span"></span>Corporate</label>
                </div>
                <span class="help-block">Select one of 2 types of accounts.</span>
            </div>
        </div>
        <div class="ibox-footer">
            <button class="btn btn-primary mr-2" type="button">Submit</button>
            <button class="btn btn-outline-secondary" type="reset">Cancel</button>
        </div>
    </form>
</div>
@endsection