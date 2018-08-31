@extends('layouts.admin')
@section('content-wrapper')
<div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-9 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit post</h4>
                {!! Form::open(['method' => 'patch', 'action' => ['AdminPostsController@update',$post->id], 'class'=>['mt-5','forms-sample'], 'files' =>
                true ]) !!} {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!} {!! Form::text('title', $post->title ,['class' => 'form-control', 'placeholder' => 'title'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category', 'Category:') !!} {!! Form::select('category_id',$categories, $post->category_id, ['class' => 'form-control'])
                    !!}
                </div>
                <div class="form-group">
                    <label for="photo_id">Photo:</label>
                    <img class="img-fluid" src="{!! URL::asset($post->photo->file) !!}">
                    <input name="photo_id" id="photo_id" type="file" class="form-control file-upload-info mt-3">
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Desc:') !!} {!! Form::textarea('body', $post->body ,['class' => 'form-control', 'rows'=>3]) !!}
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
