@extends('layouts.sharepost-layout')
@section('content-wrapper')
<div class="row">
    <div class="col-md-12 grid-margin">
        @if (count($posts) > 0) @foreach ($posts as $post)
        <div class="card mt-4">
            <div class="card-body">
                <div class="ml-5">
                    <!-- Title -->
                    <h1 class="display1 ">{{$post->title}}</h1>
                    <p class="card-description ">
                        by <img height="50px" class="rounded-circle" src="{!! URL::asset($post->user->photo->file) !!}">
                        <a href="#">{{$post->user->name}}</a>
                        <code>.text-primary</code>
                        <code>.text-secondary</code> etc. for text in theme colors
                    </p>

                    <p><i class="far fa-clock "></i> {{$post->created_at}}</p>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <img class="img-fluid" src="{!! URL::asset($post->photo->file) !!}">
                        </div>
                        <div class="col-md"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <p class="text-primary ">{{$post->body}}</p>
                        </div>
                        <div class="col-md">
                        </div>
                    </div>
                </div>

                <!-- Blog Comments -->




                <!-- Comments Form -->
            </div>
        </div>
        @endforeach @else @endif

    </div>
</div>
@endsection
