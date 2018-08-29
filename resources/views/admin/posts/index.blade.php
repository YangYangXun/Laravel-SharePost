@extends('layouts.admin') 
@section('content-wrapper')
<h1>Posts index</h1>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Bordered table</h4>
      <p class="card-description">
        Add class
        <code>.table-bordered</code>
      </p>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
                Id
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
                Title
              </th>
              <th>
                Body
              </th>
              <th>
                Created
              </th>
              <th>
                Updated
              </th>
            </tr>
          </thead>
          <tbody>
            @if (count($posts) > 0) @foreach ($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td class="py-1">
                <div class="row justify-content-center">
                  <img src="{!! URL::asset($post->user->photo ? $post->user->photo->file : 'https://via.placeholder.com/400x400') !!}" alt="image"
                  />
                </div>
              </td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->category->name}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->body}}</td>
              <td>{{$post->created_at}}</td>
              <td>{{$post->updated_at}}</td>

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