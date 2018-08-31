@extends('layouts.sharepost-layout')
@section('plugin_css_for_this_page')
<style>
    /* .card .card-body {
        padding: 0.5rem 1.88rem;
    } */
</style>
@endsection

@section('content-wrapper')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 grid-margin">
        @if (count($posts) > 0) @foreach ($posts as $post)
        <div class="card mt-4">
            <div class="card-body">
                <div class="ml-5">
                    <div class="row">
                        <div class="col-md-1">
                            <img class="img-sm rounded-circle mb-4 mb-md-0" src="{!! URL::asset($post->user->photo->file) !!}" alt="profile image">
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex">
                                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">{{$post->user->name}}</p>
                            </div>
                            <p class="text-gray ellipsis mb-2">{{$post->created_at->diffForHumans()}}
                            </p>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <!-- Title -->
                    <div class="display-4 mt-5">{{$post->title}}</div>
                    <div class="row mt-5">
                        <div class="col-md-8">
                            <img class="img-fluid" src="{!! URL::asset($post->photo->file) !!}">
                        </div>
                        <div class="col-md"></div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-8">
                            <p class="text-primary ">{{$post->body}}</p>
                        </div>
                        <div class="col-md">
                        </div>
                    </div>
                </div>

                <!-- Blog Comments -->
                <div class="col-md-12 grid-margin">
                    <div class="card ">
                        <div class="card-body">
                            @if (Session::has('comment_message'))
                                <p>{{session('comment_message')}}</p>
                            @endif
                            {!! Form::open(['method' => 'post', 'action' => 'PostCommentsController@store', 'class'=>'mt-5', 'files' => true ]) !!} {{ csrf_field()
                            }}

                            {{ csrf_field() }}

                            <input type="hidden" name="post_id" value="{{$post->id}}">

                            <div class="form-group">
                                {!! Form::textarea('body', null ,['class' => 'form-control','rows'=> '3']) !!}
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Reply</button>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    @if (count($comments) > 0)
                    @foreach ($comments as $comment)
                    @if ($comment->post_id == $post->id)
                    <div class="card comment">
                        <div class="card-body comment">
                            <div class="container">
                                <div class="row ticket-card mt-0 pb-2 border-bottom pb-3 mb-0">
                                    <div class="col-md-1">
                                        <img class="img-sm rounded-circle mb-4 mb-md-0" src="{!! URL::asset($comment->user->photo->file) !!}" alt="profile image">
                                    </div>
                                    <div class="ticket-details col-md-9">
                                        <div class="d-flex">
                                            <h6 class="text-dark font-weight-semibold mr-2 mb-2 no-wrap">{{$comment->user->name}} :</h6>
                                        </div>
                                        <p class="text-dark mb-3">{{$comment->body}}
                                        </p>
                                        <div class="row text-gray d-md-flex d-none">
                                            <div class="col-4 d-flex">
                                                <!-- <small class="mb-0 mr-2 text-muted text-muted">Last responded :</small> -->
                                                <small class="Last-responded mr-2 mb-0 text-muted text-muted">{{$comment->created_at->diffForHumans()}}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-actions col-md-2">
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     Manage
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">
                                            <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>




                <!-- Comments Form -->
            </div>
        </div>
        @endforeach @else @endif

    </div>
</div>
@endsection
