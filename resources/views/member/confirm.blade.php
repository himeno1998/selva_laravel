<h3>会員情報確認画面</h3>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

<form method="post" action="{{ route('member.store') }}">
	@csrf

	<div class="row">
	<label class="col-sm-2 control-label" for="name_sei">氏名</label>
    {{$input["name_sei"]}}{{$input["name_mei"]}}
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="nickname">ニックネーム</label>
	{{$input["nickname"]}}
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="gender">性別</label>

        @if($input["gender"]==1)
            {{config('master.gender.1')}}
        @else
            {{config('master.gender.2')}}
        @endif
	<!-- https://qiita.com/sakuraya/items/42fffe0f171d49ee74a0#_reference-634af529c0214d77de0b -->

	</div>
{{--	@if(old('gender')=="2") checked @endif--}}
	<div class="row">
	<label class="col-sm-2 control-label" for="nickname">パスワード</label>
セキュリティのため非表示
	</div>
	<div class="row">
	<label class="col-sm-2 control-label" for="email">メールアドレス</label>
{{$input["email"]}}
	</div>



	<input name="action" type="submit" value="登録完了" />
	<input name="back" type="submit" value="前に戻る" />


</form>
<script>
        $('form').on('click', '[type="action"]', function(){
        $('[type="action"]').prop('disabled', true);
        $(this).parents('form').submit();
    });
</script>
