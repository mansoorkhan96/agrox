@extends('layouts.admin')

@section('content')
<div class="ibox">
    {{ Form::open(['route' => ['profile.update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
        <div class="ibox-head">
            <div class="ibox-title">Edit Your Profile</div>
        </div>
        <div class="ibox-body">
            <div class="row ">
                <div class="col-12 ml-auto text-center">
                    <img class="img-circle" src="{{ avatar($user->avatar) }}" alt="image" width="110">
                    
                    <p class="mt-1 mb-5"><b>Profile Image</b></p>
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
                        {{ Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Location']) }}
                        @error('address')
                        <label for="address" class="text-danger">{{ $message }}</label>
                        @enderror
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
                <label>Avatar (Profile Picture)</label> <br>
                <label class="btn btn-primary file-input mr-2">
                    <span class="btn-icon"><i class="la la-cloud-upload"></i>Browse Image</span>
                    <input type="file" name="avatar">
                </label>
                @error('avatar')
                    <label for="avatar" class="text-danger">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <div class="ibox-footer">
            <button class="btn btn-primary mr-2" type="submit">Submit</button>
            <button class="btn btn-outline-secondary" type="reset">Cancel</button>
        </div>
    {{ Form::close() }}
</div>
@endsection