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
  <!-- Navbar -->
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="/">
          <span>Laravel</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav ml-auto mr-sm-2 mt-2 mt-lg-0">
            <li class="nav-item mr-5">
              <a class="nav-link active" href="{{ route('users.show', ['id' => Auth::id()]) }}">アカウントページ</a>
            </li>
          </ul>
          <div class="my-2 my-lg-0">
            <a class="btn btn-secondary" href="/logout">ログアウト</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- SideBar -->
    <main class="py-4">
        <div class="container">
          <div class="row">
            <div class="col col-lg-3">
              <div class="list-group">
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" href="#!">
                  <div class="mx-auto">{{ $user['name'] }}</div>
                </div>
                <div class="list-group-item d-flex justify-content-between">
                  <div class="row">
                    <div class="col">
                      Tweet {{ count($said_tweet) }}
                    </div>
                    <div class="col-sm">
                      Follow {{ count($said_follow) }}
                    </div>
                    <div class="col-sm">
                      Follower {{ count($said_follower) }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="list-group py-4">
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                  <div class="mx-auto">他のUser</div>
                </div>
                @foreach ($said_user as $key => $value)
                  <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="{{ route('users.show', ['id' => $value->id]) }}">
                    {{ $value['name'] }}
                  </a>
                @endforeach
              </div>
            </div>
            <!-- FlashMessage -->
            <div class="col col-lg-8">
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
</body>
</html>
