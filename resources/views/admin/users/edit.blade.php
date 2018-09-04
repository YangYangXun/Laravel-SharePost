@extends('layouts.admin')
@section('content-wrapper')

 <!-- Row -->
    <div class="row ">
        <!-- Column -->
        <div class="col-md-5 ">
            <div class="card">
                <div class="card-block p-5">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle" src="{!! URL::asset($user->photo ? $user->photo->file : 'https://via.placeholder.com/100x100') !!}" height="100px" width="100px"   />
                        <h4 class="card-title m-t-10 mt-4">{{$user->name}}</h4>
                        <h6 class="card-subtitle ">{{$user->role->name}}</h6>
                        <!-- <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div> -->
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
                    <label for="photo_id">Photo:   ( size n x n is better )</label>
                    <input name="photo_id" id="photo_id" type="file" class="form-control file-upload-info">
                </div>

                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
                {!! Form::close() !!}
                {!! Form::open(['method' => 'delete', 'action' => ['AdminUsersController@destroy',$user->id], 'class'=>['mt-3','forms-sample'] ]) !!}
                            {{ csrf_field() }}

                    <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}


                @if ($errors->any())
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
