@extends('layouts.admin')

@section('content')
<div class="ibox">
    <div class="ibox-body">
        <h5 class="font-strong mb-4">Products</h5>
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
                <a class="btn btn-success btn-air" href="/dashboard/products/create">
                    <i class="la la-plus"></i> Add New
                </a>
                <a class="btn btn-warning ml-2 btn-air" href="/dashboard/products/trashed">
                    <i class="la la-trash"></i> Trashed
                </a>
            </div>
        </div>
        <div class="table-responsive row">
            <table class="table table-bordered table-hover" id="datatable">
                <thead class="thead-default thead-lg">
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>User</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table-data">
                    @forelse ($products as $product)
                    @php
                        extract($product)
                    @endphp
                        <tr>
                            <td>{{ $id }}</td>
                            <td>
                                <img class="mr-3" src="{{ asset('/storage/' . $featured_image) }}" alt="image" width="60" /> {{$name}}</td>
                            <td>
                                @forelse ($categories as $category)
                                    {{ $category['name'] }}
                                    @if (! $loop->last)|@endif
                                @empty
                                    Uncategorized
                                @endforelse
                            </td>
                            <td>{{ $price }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>
                                @if($quantity < 1)
                                <span class="badge badge-danger badge-pill">Out of stock</span>
                                @elseif ($quantity <= 10)
                                {{ $quantity }}<span class="badge d-inline ml-1 badge-warning badge-pill">Low stock</span>
                                @else
                                {{ $quantity }}
                                @endif
                                
                            </td>
                            <td>
                                <a class="text-light mr-3 font-16" href="{{ route('products.edit', $id) }}"><i class="ti-pencil"></i></a>
                                {{ Form::open(['route' => ['products.destroy', $id], 'class' =>'d-inline ', 'method' => 'delete']) }}
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