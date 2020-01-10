@extends('layouts.admin')

@section('content')
<div class="ibox">
    <div class="ibox-body">
        <h5 class="font-strong mb-5">ADD NEW POST</h5>
        {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        {{-- @if($errors->any())
            {{ dd($errors->all())}}
        @endif --}}
        <div class="row">
            <div class="col-lg-4">
                <div style="width: 325px; height:355px" style="position:relative">
                    <div class="lead" id="featured_image">Featured Image</div>
                    <div class="add-featured-img" style="position: absolute;
                    left: 35%;
                    top: 16%;">
                        <div class="file-input-plus file-input" id="feature-image-btn"><i class="la la-plus-circle"></i>
                            <input type="file" name="featured_image" id="upload_featured_image">
                        </div>
                    </div>
                    @error('featured_image')
                        <label for="featured_image" class="col-form-label text-danger">{{ $message }}</label>
                    @enderror
                </div>
                
            </div>
            <div class="col-lg-8">
                
                    <div class="form-group mb-4">
                        <label>Title</label>
                        {{ Form::text('title', null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Title']) }}
                        @error('title')
                            <label for="title" class="col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group mb-4">
                            <label>Categories</label>
                            <div>
                            @forelse ($categories as $category)
                            @php extract($category) @endphp
                                <div class="form-group">
                                    <label class="checkbox checkbox-grey checkbox-primary">
                                        {{ Form::checkbox('categories[]', $id) }}
                                        
                                        <span class="input-span"></span> {{ $parent['name'] ? $parent['name']  . ' -> ' . $name : $name }} </label>
                                </div>
                            @empty
                                No Data Found.
                            @endforelse
                            @error('categories')
                                <label for="categories" class="col-form-label text-danger">{{ $message }}</label>
                            @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group mb-4">
                            <label>Post Type</label>
                            {{ Form::select('post_type', ['post' => 'Post', 'discussion' => 'Discussion'], null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Select Post Type']) }}
                            @error('post_type')
                                <label for="post_type" class="col-form-label text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group mb-4">
                            <label>Tag</label>
                            {{ Form::select('tag', ['success_story' => 'Success-Story', 'farmer_experience' => 'Farmer-Experience'], null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Select a Tag']) }}
                            @error('tag')
                                <label for="tag" class="col-form-label text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group mb-4">
                        <label>Tags</label>
                        <input class="tagsinput form-control form-control-solid" type="text" placeholder="Tags" value="Fashion,Dress,Broadway,Autumn collection,Shop">
                    </div> --}}
                    <div class="form-group mb-4">
                        <label>Excerpt</label>
                        {{ Form::textarea('excerpt', null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Short Description', 'rows' => 3]) }}
                        @error('excerpt')
                            <label for="excerpt" class="col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Description</label>
                        {{ Form::textarea('body', null, ['class' => 'form-control form-control-solid', 'placeholder' => 'Description', 'id' => 'summernote', 'data-plugin'=>'summernote', 'data-air-mode' => 'true']) }}
                        @error('body')
                            <label for="body" class="col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Attachments</label><br>
                        <div class="file-input-plus file-input"><i class="la la-plus-circle"></i>
                            <input type="file" name="attachments[]" id="" multiple="multiple">
                        </div>
                        @error('attachments.*')
                            <label for="attachments" class="col-form-label text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-air mr-2">Save</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div>
                
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection

@section('page_script')
    <script src="{{ asset('assets/vendors/summernote/dist/summernote.min.js') }}"></script>
    <script>
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
        
        $(function() {
            $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });
            $('.tagsinput.form-control-solid').siblings('.bootstrap-tagsinput').addClass('form-control-solid');
        });

        $(document).on('change', '#upload_featured_image', function(e) {
            if(this.files && this.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#featured_image').html(
                        `<img style="width: 325px; height:355px" src="${e.target.result}">`
                    );
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    
    </script>
@endsection