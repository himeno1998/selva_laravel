<h3>確認</h3>
<form method="post" action="{{ route('member.store') }}">
	@csrf

	<div class="row">
	<label class="col-sm-2 control-label" for="name_sei">氏名</label>
	<div class="col-sm-10">{{$name_sei.$name_mei}}</div>
	</div>
	<!-- <div class="row">
	<label class="col-sm-2 control-label" for="name_mei">名</label>
	<div class="col-sm-10">{{$name_mei}}</div>
	</div> -->
	<div class="row">
	<label class="col-sm-2 control-label" for="nickname">ニックネーム</label>
	<div class="col-sm-10">{{$nickname}}</div>
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="gender">性別</label>
	<div class="col-sm-10">{{$gender}}</div>
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="nickname">パスワード</label>
	<div class="col-sm-10">セキュリティのため非表示</div>
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="email">メールアドレス</label>
	<div class="col-sm-10">{{$email}}</div>
	</div>



	<input type="submit" value="登録完了" />
	<input name="back" type="submit" value="前に戻る" />


</form>