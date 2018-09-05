<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SharePost</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ URL::asset('css/libs/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/libs/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/libs/vendor.bundle.addons.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  @yield('plugin_css_for_this_page')
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ URL::asset('css/libs/style.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">
  <!-- endinject -->

  <link rel="shortcut icon" href="{{ URL::asset('theme-images/favicon.png') }}">

</head>

<body>
  <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
         <a class="navbar-brand brand-logo" href="{{route('sharepost.home')}}">
          <!-- <img src="{{ URL::asset('theme-images/logo.svg') }}" alt="logo" /> -->
          <img class="img-fluid" src="{{ URL::asset('theme-images/share-logo.jpg') }}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{route('sharepost.home')}}">
          <img src="{{ URL::asset('theme-images/logo-mini.svg') }}" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="{{route('sharepost.home')}}" class="nav-link">
              <span class="badge badge-primary ml-1">SharePost</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="{{route('layout.dashboard')}}" class="nav-link">
              <i class="far fa-user"></i></i>Admin page</a>
          </li>
          <li class="nav-item active">
            <a href="{{route('posts.create')}}" class="nav-link">
              <i class="far fa-edit"></i>New post</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @else
          <li class="nav-item dropdown  d-xl-inline-block">
            <a class="nav-link " id="UserDropdown" href="#" aria-expanded="false">
              <span class="profile-text">Hello, {{Auth::user()->name}} !</span>
              <img class="img-xs rounded-circle" src="{!! URL::asset(Auth::user()->photo ? Auth::user()->photo->file : 'https://via.placeholder.com/400x400') !!}" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item mt-2" href="{{route('users.edit',Auth::user()->id)}}">
                Manage Accounts
              </a>
              <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                Sign out
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                        @csrf
                </form>
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right align-self-center" type="button" data-toggle="dropdown">
          <i class="fas fa-angle-down"></i>
        </button>
        @endguest
      </div>
    </nav>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        @guest
        @else
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{!! URL::asset(Auth::user()->photo ? Auth::user()->photo->file : 'https://via.placeholder.com/400x400') !!}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small class="designation text-muted">{{Auth::user()->role->name}}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block" onclick="event.preventDefault();
                                                     document.getElementById('newpost-form').submit();">New Post
                <i class="fas fa-plus"></i>
                 <form id="newpost-form" action="{{route('posts.create')}}" method="POST" style="display: none;">
                                        @csrf
                </form>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('sharepost.home.userpost')}}">
              <i class="menu-icon far fa-smile"></i>
              <span class="menu-title">My post</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-categroy" aria-expanded="false" aria-controls="ui-categroy">
                        <i class="menu-icon far fa-bookmark"></i>
                        <span class="menu-title mr-5">Category</span>
                        <span class="ml-5 fas fa-chevron-right"></span>
                      </a>
            <div class="collapse" id="ui-categroy">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('sharepost.home')}}">All</a>
                </li>
                <?php $categories = App\Category::all();?>
                @foreach ($categories as $category)
                <li class="nav-item">
                  <a class="nav-link" href="{{route('sharepost.home.category_search',$category->id)}}">{{$category->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </li>
          @endguest
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content-wrapper')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
         <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">2018
                        <a href="" target="_blank">SharePost</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ URL::asset('js/libs/vendor.bundle.base.js') }}"></script>
  <script src="{{ URL::asset('js/libs/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  @yield('plugin_css_for_this_page')
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ URL::asset('js/libs/off-canvas.js') }}"></script>
  <script src="{{ URL::asset('js/libs/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ URL::asset('js/libs/dashboard.js') }}"></script>

  <!-- End custom js for this page-->
</body>

</html>
