<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<h3>会員情報登録</h3>

<!--　エラーメッセージの有無を返す  -->
@if ($errors->any())
    <div style="color:red; font-size: 16px">
        <ul>

        </ul>
    </div>
@endif

<form method="post" action="{{ route('member.post') }}" id="submitForm">
    @csrf
    <div class="row">
        <div class="col-2">
            <div class="name">
                <label>氏名</label>
                姓<input type="text" name="name_sei" value="{{ old('name_sei') }}"/>
                名<input type="text" name="name_mei" value="{{ old('name_mei') }}"/>
                <div style="color:red; font-size: 16px">
                    @if($errors->has('name_sei'))
                        @foreach($errors->get('name_sei') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </div>
                <div style="color:red; font-size: 16px">
                    @if($errors->has('name_mei'))
                        @foreach($errors->get('name_mei') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-2">
            <label>ニックネーム</label>
            <input type="text" name="nickname" value="{{ old('nickname') }}"/>
        </div>
        <div style="color:red; font-size: 16px">
            @if($errors->has('nickname'))
                @foreach($errors->get('nickname') as $message)
                    {{ $message }}<br>
                @endforeach
            @endif
        </div>
        <div class="col-2">
            <label>性別</label>
            <input type="radio" name="gender" value="1" @if(old('gender')=="1")  checked @endif />男性
            <input type="radio" name="gender" value="2" @if(old('gender')=="2") checked @endif />女性
        </div>
        <div style="color:red; font-size: 16px">
            @if($errors->has('gender'))
                @foreach($errors->get('gender') as $message)
                    {{ $message }}<br>
                @endforeach
            @endif
        </div>
        <div class="col-2">
            <label>パスワード</label>
            <input type="password" name="password" value="{{ old('password') }}"/>
        </div>
        <div style="color:red; font-size: 16px">
            @if($errors->has('password'))
                @foreach($errors->get('password') as $message)
                    {{ $message }}<br>
                @endforeach
            @endif
        </div>
        <div class="col-2">
            <label>パスワード確認</label>
            <input type="password" name="password_confirmed" value="{{ old('password_confirmed') }}"/>
        </div>
        <div style="color:red; font-size: 16px">
            @if($errors->has('password_confirmed'))
                @foreach($errors->get('password_confirmed') as $message)
                    {{ $message }}<br>
                @endforeach
            @endif
        </div>
        <div class="col-2">
            <label>メールアドレス </label>
            <input type="text" name="email" value="{{ old('email') }}"/>
        </div>
        <div style="color:red; font-size: 16px">
            @if($errors->has('email'))
                @foreach($errors->get('email') as $message)
                    {{ $message }}<br>
                @endforeach
            @endif
        </div>
    </div>


<!-- <label>Body</label>
	<div>
		<textarea name="body">{{ old('body') }}</textarea>
	</div> -->

    <input class="btn btn-primary" type="button" value="確認画面へ" id="submitButton"/>
    <button type="button" class="btn btn-top"  onclick="location.href='/'">
        {{ __('トップに戻る') }}
    </button>
</form>

<script>
    const submitButton = document.getElementById('submitButton')
    const submitForm = document.getElementById('submitForm')
    submitButton.onclick = () => {
        submitButton.disabled = true
        submitForm.submit()
    }
</script>
