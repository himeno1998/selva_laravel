@extends('layouts.app')

@section('content')
    <style>
        .form-group.row {
            display: flex;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3>ログイン</h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row" style="flex: auto">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">
                                </div>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color:red; font-size: 16px">{{$messege}}</strong>
                                    </span>
                            @enderror
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color:red; font-size: 16px">{{$messege}}</strong>
                                    </span>
                            @enderror
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('パスワードを忘れた方はこちら') }}
                                        </a>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>
                                <button type="button" class="btn btn-top"  onclick="location.href='/'">
                                    {{ __('トップに戻る') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
