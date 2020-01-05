@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">Add Category</div>
        </div>
            {{ Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) }}
                <div class="ibox-body">
                    <div class="form-group mb-4 row">
                        
                        {{ Form::label('parent_id', 'Parent', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('parent_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select Parent Catregory']) }}
                            @error('parent_id')
                                {{ Form::label('parent_id', $message, ['class' => 'col-form-label text-danger']) }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4 row">
                        {{ Form::labeL('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
                            @error('name')
                                {{ Form::label('name', $message, ['class' => 'col-form-label text-danger']) }}
                            @enderror
                        </div>
                    </div>
                    
                </div>
                <div class="ibox-footer row">
                    <div class="col-sm-10 ml-sm-auto">
                        {{ Form::submit('Save', ['class' => 'btn btn-primary mr-2']) }}
                        <button class="btn btn-secondary" type="reset">Cancel</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection