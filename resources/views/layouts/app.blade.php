<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">        <!-- Navbar Primary -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <span>Laravel</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto mr-sm-2 mt-2 mt-lg-0">
              <li class="nav-item active mr-3">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#">Our Work</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="#">Contacts</a>
              </li>
            </ul>

            <div class="my-2 my-lg-0">
              <a class="btn btn-secondary" href="#">Join Now Free</a>
            </div>
          </div>
        </div>
      </nav>
            <!-- End Navbar Primary -->

      {{-- <!-- End Navbar Secondary -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <div class="col-lg-6">
                                      <div class="list-group">
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" href="#!">
                                          Home
                                          <span class="badge badge-primary badge-light">14</span>
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                                          Profile
                                          <span class="badge badge-danger">New</span>
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                                          <span>Messages <span class="d-block small text-muted">Secondary text</span></span>
                                          <span class="badge badge-info badge-pill">1</span>
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                                          Settings
                                          <span class="badge badge-secondary badge-pill">Pro</span>
                                        </a>
                                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center disabled" href="#!">
                                          <span>Notifications - <span class="small">disabled</span></span>
                                          <span class="badge badge-primary">7</span>
                                        </a>
                                      </div>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <!-- SideBar -->
                    <div class="col col-lg-3">
                      <div class="list-group">
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" href="#!">
                          Home
                          <span class="badge badge-primary badge-light">14</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                          Profile
                          <span class="badge badge-danger">New</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                          <span>Messages <span class="d-block small text-muted">Secondary text</span></span>
                          <span class="badge badge-info badge-pill">1</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                          Settings
                          <span class="badge badge-secondary badge-pill">Pro</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center disabled" href="#!">
                          <span>Notifications - <span class="small">disabled</span></span>
                          <span class="badge badge-primary">7</span>
                        </a>
                      </div>

                      <div class="list-group py-4">
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" href="#!">
                          Home
                          <span class="badge badge-primary badge-light">14</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                          Profile
                          <span class="badge badge-danger">New</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                          <span>Messages <span class="d-block small text-muted">Secondary text</span></span>
                          <span class="badge badge-info badge-pill">1</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="#!">
                          Settings
                          <span class="badge badge-secondary badge-pill">Pro</span>
                        </a>
                        <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center disabled" href="#!">
                          <span>Notifications - <span class="small">disabled</span></span>
                          <span class="badge badge-primary">7</span>
                        </a>
                      </div>
                  </div>
                <!-- Content -->
                <div class="col col-lg-8">
                  <!-- FlashMessage -->
                  @if(Session::has('message'))
                    <div class="alert alert-primary col text-center" role="alert">
                      <strong>{{ session('message') }}</strong>
                    </div>
                  @endif
                  <!-- ErrorMessage -->
                  @if(Session::has('errors'))
                    <div class="alert alert-danger col text-center" role="alert">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <strong>{{ $error }}</strong>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                  @yield('content')
                </div>
              </div>
            </div>
        </main>
    </div>
    <ul>

    </ul>
</body>
</html>
