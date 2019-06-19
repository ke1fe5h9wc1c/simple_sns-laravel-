@extends('layouts.app')

@section('content')
  <div class="jumbotron">
    <h1 class="display-5">Name:{{ $show_user->name }}</h1>
    <hr class="my-4">
    <h1 class="display-5">Mail:{{ $show_user->email }}</h1>
    {{-- 自分のShowページでないか確認 --}}
    @if ( Auth::id() !== $show_user->id)
      {{-- 既にFoloowしていないか確認 --}}
      @if (!isset($follow_check))
        {{-- Followボタンを表示 --}}
        <form action="{{ url('/follow') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group row">
            <div>
              <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="form-control">
              <input type="hidden" name="follow_id" value="{{ $show_user->id }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary col-sm-2 col-form-label">Followする</button>
          </div>
        </form>
      @else
        {{-- Followしていれば、Follow解除ボタンを表示 --}}
        <form action="{{ url('users/'.$follow_check->id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group row">
            <div>
              <input type="hidden" name="_method" value="DELETE">
            </div>
            <button type="submit" class="btn btn-danger  col-form-label">Followを解除する</button>
          </div>
        </form>
      @endif
    @endif
  </div>
<div class="text-center">
  <div class="text-center">
    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab-2" data-toggle="pill" href="#pills-home-2" role="tab" aria-controls="pills-home-2" aria-selected="true">
          <i class="fa fa-cubes mr-1"></i> Tweet
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab-2" data-toggle="pill" href="#pills-profile-2" role="tab" aria-controls="pills-profile-2" aria-selected="false">
          <i class="fa fa-diamond mr-1"></i> Follow
        </a>
      </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home-2" role="tabpanel" aria-labelledby="pills-home-tab-2">
        @foreach ($tweet as $key => $value)
          <div class="py-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title text-left"><pre>{{ $value->user_name }}        {{ $value->created_at }}</pre></h5>
              </div>
              <div class="card-body">
                <p class="card-text text-left">{{ $value->comment }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="tab-pane fade" id="pills-profile-2" role="tabpanel" aria-labelledby="pills-profile-tab-2">
        <div class="list-group py-4">
          <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
            <div class="mx-auto">{{ $show_user->name }}がFollow中のUser</div>
          </div>
          @foreach ($folloew as $key => $value)
            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="{{ route('users.show', ['id' => $value->id]) }}">
              {{ $value->name }}
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Tabs -->
@endsection
