<h3>フォーム</h3>

<!--　エラーメッセージの有無を返す  -->
@if ($errors->any())
<div style="color:red;">
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
</div>
@endif

<form method="post" action="{{ route('member.post') }}">
	@csrf
	氏名
	<label>姓</label>
	<div>
		<input type="text" name="name_sei" value="{{ old('name_sei') }}" />
	</div>
	<label>名</label>
	<div>
		<input type="text" name="name_mei" value="{{ old('name_mei') }}" />
	</div>
	<label>ニックネーム</label>
	<div>
		<input type="text" name="nickname" value="{{ old('nickname') }}" />
	</div>
	<label>性別</label>
	<div>
		男性<input type="radio" name="gender" value="1" @if(old('gender')=="1")  checked @endif />
	</div>
	<div>
		女性<input type="radio" name="gender" value="2" @if(old('gender')=="2") checked @endif />
	</div>
	<label>パスワード</label>
	<div>
		<input type="password" name="password" value="{{ old('password') }}" />
	</div>
	<label>パスワード確認</label>
	<div>
		<input type="password" name="password_confirmed" value="{{ old('password_confirmed') }}" />
	</div>
	<label>メールアドレス</label>
	<div>
		<input type="text" name="email" value="{{ old('email') }}" />
	</div>



	<!-- <label>Body</label>
	<div>
		<textarea name="body">{{ old('body') }}</textarea>
	</div> -->

	<input class="btn btn-primary" type="submit" value="送信" />
</form>