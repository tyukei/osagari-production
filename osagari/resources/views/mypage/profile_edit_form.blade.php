@extends('layouts.app')

@section('title')
プロフィール編集
@endsection

@section('content')
<div id="profile-edit-form" class="container">
  <div class="row">
    <div class="col-8 offset-2">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="col-8 offset-2 bg-white">

      <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">プロフィール編集</div>

      <form method="POST" action="{{ route('mypage.edit-profile') }}" class="p-5" enctype="multipart/form-data">
        @csrf

        {{-- アバター画像 --}}
        <span class="avatar-form image-picker">
          <input type="file" name="avatar" class="d-none" accept="image/png,image/jpeg,image/gif" id="avatar" />
          <label for="avatar" class="d-inline-block">
            @if (!empty($user->avatar_file_name))
            <img src="/storage/avatars/{{$user->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
            @else
            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
            @endif
          </label>
        </span>

        {{-- ニックネーム --}}
        <div class="form-group mt-3">
          <label for="name">ニックネーム</label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group mb-0 mt-3">
          <button type="submit" class="btn btn-block btn-secondary">
            保存
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
