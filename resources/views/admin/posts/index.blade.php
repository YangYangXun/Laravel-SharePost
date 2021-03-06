@extends('layouts.admin')
@section('content-wrapper')

@if (Session::has('deleted_post'))
<p>{{session('deleted_post')}}</p>
@endif

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Post table</h4>
      <p class="card-description">
        <code>Click Title to Edit</code>
      </p>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <!-- <th>
                Id
              </th> -->
              <th>
                Title
              </th>
              <th>
                User Photo
              </th>
              <th>
                User Name
              </th>
              <th>
                Category
              </th>
              <th>
                Body
              </th>
              <th>
                Time
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
            @if (count($posts) > 0) @foreach ($posts as $post)
            <tr>
              <!-- <td>{{$post->id}}</td> -->
              <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
              <td class="py-1">
                <div class="row justify-content-center">
                  <img src="{!! URL::asset($post->user->photo ? $post->user->photo->file : 'https://via.placeholder.com/400x400') !!}" alt="image"
                  />
                </div>
              </td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->category->name}}</td>
              <td>{{str_limit($post->body,30)}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->created_at}}</td>
              <td>
                    {!! Form::open(['method' => 'delete', 'action' => ['AdminPostsController@destroy',$post->id], 'class'=>'' ]) !!}
                    {{ csrf_field() }}
                    <input type="submit" value="Delete" name="delete" class="btn btn-danger"> {!! Form::close() !!}
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
@endsection
