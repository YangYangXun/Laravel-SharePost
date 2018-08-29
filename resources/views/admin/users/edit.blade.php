@extends('layouts.admin')
@section('content-wrapper')

 <!-- Row -->
    <div class="row ">
        <!-- Column -->
        <div class="col-md-5 ">
            <div class="card ">
                <div class="card-block">
                    <div class="d-flex flex-column justify-content-center">
                        <img src="{!! URL::asset($user->photo ? $user->photo->file : 'https://via.placeholder.com/400x400') !!}"  width="150" />
                        <h4 class="card-title m-t-10">{{$user->name}}</h4>
                        <h6 class="card-subtitle ">Accoubts Manager Amix corp</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-7">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit user</h4>

                {!! Form::open(['method' => 'PATCH', 'action' => ['AdminUsersController@update',$user->id], 'class'=>['mt-3','forms-sample'], 'files' =>
                true ]) !!} {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!} {!! Form::text('name', $user->name ,['class' => 'form-control', 'placeholder' => 'name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!} {!! Form::text('email', $user->email ,['class' => 'form-control', 'placeholder' => 'email'])
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', 'Role') !!} {!! Form::select('role_id',$roles, $user->role->id, ['class' =>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!} {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password'])
                    !!}
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
        <!-- Column -->
    </div>
    <!-- Row -->
@endsection
