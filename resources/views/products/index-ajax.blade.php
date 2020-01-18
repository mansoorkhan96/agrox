@extends('layouts.admin')

@section('content')
<div class="ibox">
    <div class="ibox-body">
        <h5 class="font-strong mb-4">Products</h5>
        <div class="flexbox mb-4">
            <div class="flexbox">
                
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
                        <th class="android">Categories</th>
                        <th>Price</th>
                        <th>User</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table-data">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('datatables')
    @include('includes.datatables')
@endsection

@section('page_script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            products();

            function products() {
                $.ajax({
                    url: '/dashboard/products/products',
                }).done(function(data) {
                    $('#table-data').html(data);
                });
            }

            $(document).on('submit', '.delete-form', function(e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let id = $("input[name='id']", this).val();
              
                let url = "{{ route('products.destroy', ':id') }}";
                url = url.replace(':id', id);
                
                $.ajax({
                    url: url,
                    method: 'DELETE'
                }).done(function(data) {
                    if(data.status != false) {
                        $('#table-data').html(data);
                        toastr.success("Product moved to Trash", 'Success');
                    }
                });
            });
        });
    </script>
@endsection