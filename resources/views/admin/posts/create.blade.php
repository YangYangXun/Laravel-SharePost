@extends('layouts.admin')
@section('content-wrapper')

<div class="row mt-4">
    <div class="col-md-9 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create new post</h4>
                {!! Form::open(['method' => 'post', 'action' => 'AdminPostsController@store', 'class'=>['mt-5','forms-sample'], 'files' =>
                true ]) !!} {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!} {!! Form::text('title', null ,['class' => 'form-control', 'placeholder' => 'title'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Category:') !!} {!! Form::select('category_id',['' => '-- Choose Option --']+ $categories, 0, ['class' => 'form-control'])
                    !!}
                </div>
                <div class="form-group">
                    <label for="photo_id">Photo:</label>
                    <input name="photo_id" id="photo_id" type="file" class="form-control file-upload-info">
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Desc:') !!} {!! Form::textarea('body', null ,['class' => 'form-control', 'rows'=>3]) !!}
                </div>

                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button> {!! Form::close() !!} @if ($errors->any())
                <div class="form-group mt-3">
                    <blockquote class="blockquote">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </blockquote>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md">

    </div>



</div>
@endsection
