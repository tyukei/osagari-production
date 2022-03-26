@extends('layouts.app_only_content')

@section('title')
    ログイン
@endsection

@section('content')
<div class="container">
    <div class="card" style="width: 500px">
        <div class="card-body">
            <div class="font-weight-bold text-center border-bottom pb-3" style="font-size: 24px">ログイン</div>

            <form method="POST" action="{{ route('login') }}" class="p-5">
                @csrf

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            ログイン状態を保存する
                        </label>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-block btn-secondary">
                        ログイン
                    </button>
                </div>

                <div class="mt-3">
                    アカウントをお持ちでない方は<a href="{{ route('register') }}">こちら</a>
                </div>
                <div class="mt-1">
                    パスワードをお忘れの方は<a href="{{ route('password.request') }}">こちら</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
