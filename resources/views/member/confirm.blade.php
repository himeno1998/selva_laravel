<h3>会員情報確認画面</h3>
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<style>
    .row{
        display: flex;
        /*justify-content: space-around;*/
        /*text-align: left;*/
        margin-left: 41%;
    }
</style>

<form method="post" action="{{ route('member.store') }}" id="submitForm">
    @csrf

    <div class="row">
        <label class="col-sm-2 control-label" for="name_sei">氏名</label>
        <div class="item">
            {{$input["name_sei"]}}{{$input["name_mei"]}}
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label" for="nickname">ニックネーム</label>
        <div class="item">
            {{$input["nickname"]}}
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label" for="gender">性別</label>
        <div class="item">
            @if($input["gender"]==1)
                {{config('master.gender.1')}}
            @else
                {{config('master.gender.2')}}
            @endif
        </div>
        <!-- https://qiita.com/sakuraya/items/42fffe0f171d49ee74a0#_reference-634af529c0214d77de0b -->
    </div>
    {{--	@if(old('gender')=="2") checked @endif--}}
    <div class="row">
        <label class="col-sm-2 control-label" for="nickname">パスワード</label>
        <div class="item">
            セキュリティのため非表示
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label" for="email">メールアドレス</label>
        <div class="item">
            {{$input["email"]}}
        </div>
    </div>


    <input name="action" type="button" value="登録完了" id="submitButton"/>
    <input name="back" type="submit" value="前に戻る"/>


</form>
<script>
    const submitButton = document.getElementById('submitButton')
    const submitForm = document.getElementById('submitForm')
    submitButton.onclick = () => {
        submitButton.disabled = true
        submitForm.submit()
    }
</script>

