@extends('layouts.admin') 
@section('content-wrapper')




<div class="row mt-4">
    <div class="col-md-1"></div>
    <div class="col-md-9 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create new user</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                {!! Form::open(['method' => 'post', 'action' => 'AdminUsersController@store', 'class'=>['mt-5','forms-sample'], 'files' =>
                true ]) !!} {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!} {!! Form::text('name', null ,['class' => 'form-control', 'placeholder' => 'name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!} {!! Form::text('email', null ,['class' => 'form-control', 'placeholder' => 'email'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!} {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', 'Role') !!} {!! Form::select('role_id', ['' => '-- Choose Option --']+ $roles, 0, ['class' =>
                    'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="photo_id">Photo:</label>
                    <input name="photo_id" id="photo_id" type="file" class="form-control file-upload-info">
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
    <div class="col-md-2">

    </div>



</div>





<div class="row mt-4">
    <div class="col-md-8 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create new user</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="col-form-label">Role</label>
                        <div class="">
                            <select class="form-control">
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>



</div>
@endsection