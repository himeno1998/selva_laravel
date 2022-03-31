@extends('layouts.app')

@section('content')
    <style>
        label, .col-md-2 {
            display: contents;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if (!session('status'))
                            <p>パスワード再設定用の URL を記載したメールを送信します。</p>
                            <p>ご登録されたメールアドレスを入力してください。</p>
                        @endif
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @if (session('status')=="パスワード再設定の案内メールを送信しました 。")
                                <p>（ まだパスワード再設定は完了しておりません ）</p>
                                <p>届きましたメールに記載されている</p>
                                <p>『パスワード再設定URL』 をクリックし、</p>
                                <p>パスワードの再設定を完了させてください。</p>
                            @endif
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            @if (!session('status'))
                                <div class="form-group row">

                                    <label for="email" class="col-md-4 col-form-label text-md-right">
                                        {{ __('E-Mail Address') }}
                                    </label>
                                    <div class="col-md-2">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <p style="color:red; font-size: 16px"><strong>{{ $message }}</strong></p>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    @if (!session('status'))
                                        <button type="submit" class="btn btn-primary">
                                            送信
                                        </button>
                                    @endif
                                    <button type="button" class="btn btn-top" onclick="location.href='/'">
                                        {{ __('トップに戻る') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
