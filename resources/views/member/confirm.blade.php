<h3>確認</h3>
<form method="post" action="{{ route('member.store') }}">
	@csrf

	<div class="row">
	<label class="col-sm-2 control-label" for="name_sei">氏名</label>
	<div class="col-sm-10">{{$input["name_sei"]}}{{$input["name_mei"]}}</div>
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="nickname">ニックネーム</label>
	<div class="col-sm-10">{{$input["nickname"]}}</div>
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="gender">性別</label>
	<div class="col-sm-10">
    @foreach(config('master.gender') as $input["gender"] => $value)
         {{ $value }}</option>
    @endforeach
	<!-- https://qiita.com/sakuraya/items/42fffe0f171d49ee74a0#_reference-634af529c0214d77de0b -->
	</div>
	</div>
	@if(old('gender')=="2") checked @endif
	<div class="row">
	<label class="col-sm-2 control-label" for="nickname">パスワード</label>
	<div class="col-sm-10">セキュリティのため非表示</div>
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="email">メールアドレス</label>
	<div class="col-sm-10">{{$input["email"]}}</div>
	</div>



	<input type="submit" value="登録完了" />
	<input name="back" type="submit" value="前に戻る" />


</form>