@extends('layouts.admin')
@section('content-wrapper')
<h1>comments display</h1>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Comments</h4>
                <p class="card-description">
                     <code>Click name to Edit</code>
                </p>
                @if (Session::has('deleted_comment'))
                    <p>{{session('deleted_comment')}}</p>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Post
                                </th>
                                <th>
                                    User Photo
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Content
                                </th>
                                <th>
                                    Created
                                </th>
                                <!-- <th>
                                    Updated
                                </th> -->
                                <th>
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($comments) > 0) @foreach ($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->post->title}}</td>
                                 <td class="py-1">
                                    <img src="{!! URL::asset($comment->user->photo ? $comment->user->photo->file : 'https://via.placeholder.com/400x400') !!}" alt="image" />
                                </td>
                                <td>{{$comment->user->name}}</td>
                                <td>{{str_limit($comment->body,20)}}</td>
                                <td>{{$comment->created_at}}</td>
                                <!-- <td>{{$comment->updated_at}}</td> -->
                                <td>
                                {!! Form::open(['method' => 'delete', 'action' => ['PostCommentsController@destroy',$comment->id]]) !!}
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

</div>

@endsection
