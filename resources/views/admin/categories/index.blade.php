@extends('layouts.admin')
@section('content-wrapper')

 <!-- Row -->
    <div class="row ">
        <!-- Column -->
        <div class="col-md-5">

            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Category</h4>
                {!! Form::open(['method' => 'post', 'action' => 'AdminCategoriesController@store', 'class'=>['mt-5','forms-sample'], 'files' => true ]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('Category name', 'Category name:') !!} {!! Form::text('name', null ,['class' => 'form-control', 'placeholder' => 'new category'])
                    !!}
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
                {!! Form::close() !!}
                @if (Session::has('add_success'))
                    <p class="mt-3">{{session('add_success')}}</p>
                @endif
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

        <!-- Column -->
        <div class="col-md-7 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All categories</h4>
                    @if (Session::has('deleted_category'))
                        <p class="mt-3">{{session('deleted_category')}}</p>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Created
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($categories) > 0) @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>
                                    {!! Form::open(['method' => 'delete', 'action' => ['AdminCategoriesController@destroy',$category->id]]) !!}
                                        {{ csrf_field() }}
                                        <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach @else
                                <p>No data</p>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->



@endsection
