@extends('layouts.admin')
@section('content-wrapper')

<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-block d-md-flex align-items-center">
                <p>Dashboard</p>
    </span>
  </div>
</div>
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fas fa-pencil-alt"></i>
          </div>
          <div class="float-right">
            <p class="mb-1 text-right">Total Post</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$data['post']}}</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          Your total post number
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="far fa-comment"></i>
          </div>
          <div class="float-right">
            <p class="mb-1 text-right">Comments</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$data['comment']}}</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          Comments you leave
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fab fa-elementor"></i>
          </div>
          <div class="float-right">
            <p class="mb-1 text-right">Categroies</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$data['category']}}</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          Different Post Categroies
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="clearfix">
          <div class="float-left">
            <i class="fas fa-user"></i>
          </div>
          <div class="float-right">
            <p class="mb-1 text-right">Users</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$data['user']}}</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0">
          Total user in this website
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
  <!--weather card-->
    <div class="card card-weather">
      <div class="card-body">
        <div class="weather-date-location">
          <h3>{{date('l')}}</h3>
          <p class="text-gray">
            <span class="weather-date">{{date('Y-m-d')}}</span>
            <span class="weather-location">Taiwan,  TW</span>
          </p>
        </div>
      </div>
    </div>
    <!--weather card ends-->
  </div>
  <div class="col-md-5">
     <div class="card grid-margin stretch-card">
                <div class="card-body">
                  <h4 class="card-title">Welcome !</h4>
                  <p class="card-description">
                    Share your life with friends.
                    <code>Validate your own existence.</code>
                  </p>
                  <blockquote class="blockquote">
                    <p class="mb-0">Life is a leaf of paper white, there on each of us may write his word or two.</p>
                  </blockquote>
                </div>
                <div class="card-body">
                  <blockquote class="blockquote blockquote-primary">
                    <p>Life is a great big canvas, and you should throw all the paint on it you can.</p>
                    <footer class="blockquote-footer">SharePost
                      <cite title="Source Title"></cite>
                    </footer>
                  </blockquote>
                </div>
              </div>
  </div>
</div>




@endsection
