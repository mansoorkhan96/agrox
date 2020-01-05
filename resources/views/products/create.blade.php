@extends('layouts.admin')

@section('content')
<div class="ibox">
    <div class="ibox-body">
        <h5 class="font-strong mb-5">ADD NEW PRODUCT</h5>
        <div class="row">
            <div class="col-lg-4">
                <div style="width: 325px; height:355px" style="position:relative">
                    {{-- <img src="{{ asset('images/shop/shopq_5.jpg') }}" class="product-featured-img" alt="image" /> --}}
                    <p class="lead">Featured Image</p>
                    <div class="add-featured-img" style="position: absolute;
                    left: 40%;
                    top: 25%;">
                        <div class="file-input-plus file-input"><i class="la la-plus-circle"></i>
                            <input type="file">
                        </div>
                    </div>
                    
                </div>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <img src="{{ asset('images/shop/shop_5.jpg') }}" alt="image" />
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('images/shop/shop_5.jpg') }}" alt="image" />
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('images/shop/shop_5.jpg') }}" alt="image" />
                    </div>
                    <div class="col-md-3">
                        <div class="file-input-plus file-input"><i class="la la-plus-circle"></i>
                            <input type="file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form action="javascript:;">
                    <div class="form-group mb-4">
                        <label>Product Name</label>
                        <input class="form-control form-control-solid" type="text" placeholder="Enter Product Name">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group mb-4">
                            <label>Category</label>
                            <div>
                                <select class="selectpicker show-tick form-control" title="Please select" data-style="btn-solid">
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
                        </div>
                        <div class="col-sm-6 form-group mb-4">
                            <label>SKU</label>
                            <input class="form-control form-control-solid" type="text" placeholder="SKU Number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group mb-4">
                            <label>Price</label>
                            <input class="form-control form-control-solid" type="text" placeholder="Unit Price">
                        </div>
                        <div class="col-sm-4 form-group mb-4">
                            <label>Currency </label>
                            <div>
                                <select class="selectpicker show-tick form-control" title="Please select" data-style="btn-solid">
                                    <option>USD</option>
                                    <option>Euro</option>
                                    <option>Rouble</option>
                                    <option>Pound</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group mb-4">
                            <label>Quantity</label>
                            <input class="form-control form-control-solid" type="text" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label>Tags</label>
                        <input class="tagsinput form-control form-control-solid" type="text" placeholder="Tags" value="Fashion,Dress,Broadway,Autumn collection,Shop">
                    </div>
                    <div class="form-group mb-4">
                        <label>Description</label>
                        <textarea class="form-control form-control-solid" rows="4" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label class="ui-switch switch-icon mr-3 mb-0">
                            <input type="checkbox" checked="">
                            <span></span>
                        </label>Available</div>
                    <div class="text-right">
                        <button class="btn btn-primary btn-air mr-2">Save</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_script')
    <script>
        $(function() {
            $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });
            $('.tagsinput.form-control-solid').siblings('.bootstrap-tagsinput').addClass('form-control-solid');
        });
    </script>
@endsection