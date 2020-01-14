@extends('layouts.admin')

@section('content')
<div class="ibox">
    <div class="ibox-body">
        <h5 class="font-strong mb-4">Categories</h5>
        <div class="flexbox mb-4">
            <div class="flexbox">
                <label class="mb-0 mr-2">Type:</label>
                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                    <option value="">All</option>
                    <optgroup label="Electronics">
                        <option>TV & Video</option>
                        <option>Cameras & Photo</option>
                        <option>Computers & Tablets</option>
                    </optgroup>
                    <optgroup label="Fashion">
                        <option>Health & Beauty</option>
                        <option>Shoes</option>
                        <option>Handbags & Purses</option>
                        <option>Jewelry and Watches</option>
                    </optgroup>
                </select>
            </div>
            <div class="flexbox">
                <div class="input-group-icon input-group-icon-left mr-3">
                    <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                    <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                </div>
                <a class="btn btn-success btn-air" href="/dashboard/categories/create">
                    <i class="la la-plus"></i> Add New
                </a>
            </div>
        </div>
        <div class="table-responsive row">
            <table class="table table-bordered table-hover" id="datatable">
                <thead class="thead-default thead-lg">
                    <tr>
                        <th>ID</th>
                        <th>Parent</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    @php
                        extract($category)
                    @endphp
                        <tr>
                            <td>{{ $id }}</td>
                            <td>{{ $parent['name'] ?? 'No-Parent' }}</td>
                            <td>{{ $name }}</td>
                            <td>{{ $slug }}</td>
                            <td>
                                <a class="text-light mr-3 font-16" href="{{ route('categories.edit', $id) }}"><i class="ti-pencil"></i></a>
                                {{ Form::open(['route' => ['categories.destroy', $id], 'class' =>'d-inline ', 'method' => 'delete']) }}
                                    <button type="submit" class="no-btn text-light font-16"><i class="ti-trash"></i></button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @empty
                    <tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No records found</td></tr>
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
