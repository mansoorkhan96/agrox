@extends('layouts.admin')

@section('content')
<div class="ibox">
    <div class="ibox-body">
        <h5 class="font-strong mb-4">Consultants</h5>
        <div class="flexbox mb-4">
            <div class="flexbox">
                
            </div>
            <div class="flexbox">
                <div class="input-group-icon input-group-icon-left mr-3">
                    <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                    <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                </div>
            </div>
        </div>
        <div class="table-responsive row">
            <table class="table table-bordered table-hover" id="datatable">
                <thead class="thead-default thead-lg">
                    <tr>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Proficiency</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($consultants as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="{{ route('profile.show', $user->id) }}">
                                    <img class="img-circle" src="{{ avatar($user->avatar) }}" alt="image" width="54">
                                </a>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ roleName($user->role_id) }}</td>
                            <td>{{ proficiencyName($user->proficiency_id) }}</td>
                            <td>
                                @if (auth()->user()->role_id == 1)
                                    <a class="text-light mr-3 font-16" href="{{ route('profile.edit', $user->id) }}"><i class="ti-pencil"></i></a>
                                    {{ Form::open(['route' => ['users.destroy', $user->id], 'class' =>'d-inline ', 'method' => 'delete']) }}
                                    <button type="submit" class="no-btn text-light font-16"><i class="ti-trash"></i></button>
                                    {{ Form::close() }}
                                @endif
                            </td>
                        </tr>
                    @empty
                    <tr class="odd">
                        <td valign="top" colspan="5" class="dataTables_empty">
                            No records found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('datatables')
    @include('includes.datatables')
@endsection
