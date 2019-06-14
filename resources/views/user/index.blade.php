@extends('layouts.app')

@section('content')
  <form action="/users" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
      <div class="col-sm-10">
        <input type="text" name="comment" id="text3a" class="form-control">
      </div>
      <div>
        <input type="hidden" name="user_name" value="{{ $user['name'] }}" class="form-control">
      </div>
      <div>
        <input type="hidden" name="user_id" value="{{ $user['id'] }}" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary col-sm-2 col-form-label">送信</button>
    </div>
  </form>
@endsection
