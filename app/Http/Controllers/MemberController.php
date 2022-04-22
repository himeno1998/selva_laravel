<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//バリデーション使用
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Member;
use App\Mail\MemberMail;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
    //会員登録画面
    private $formItems = ["name_sei", "name_mei", "nickname", "gender", "password", "password_confirmed", "email",];
    private $validator = [
        "name_sei" => "required|string|max:20",
        "name_mei" => "required|string|max:20",
        "nickname" => "required|string|max:10",
        "gender" => "required|integer|max:100|in:1,2",
        "password" => ['required','regex:/\A([a-zA-Z0-9]{8,})+\z/u','max:20'],
        "password_confirmed" => ['required','regex:/\A([a-zA-Z0-9]{8,20})+\z/u','same:password','max:20'],//passwordと同じか
        "email" => "required|string|email:strict,dns|max:200|unique:members"
    ];

    public function register()
    {
        // 登録画面表示
        return view("member.register");
    }


    public function post(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->only($this->formItems);

        $validator = Validator::make($input, $this->validator);
        if ($validator->fails()) {
            return redirect()->action("MemberController@register")
                ->withInput()
                ->withErrors($validator);
        }
        //セッションに書き込む
        //form_inputで入力値を保存
        $request->session()->put("form_input", $input);
        return redirect()->action("MemberController@confirm");
    }

    //会員確認画面
    function confirm(Request $request)
    {
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action("MemberController@register");
        }

        return view("member.confirm", ["input" => $input]);


    }

    //会員登録処理
    function store(Request $request)
    {
        // return view("member.store");
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

        //戻るボタンが押された時
        if ($request->has("back")) {
            return redirect()->action("MemberController@register") //セッションに値が無い時はフォームに戻る
            ->withInput($input);
        }
        //セッションに値が無い時はフォームに戻る
        if (!$input) {
            return redirect()->action("MemberController@register");
        }
        //ここでメールを送信するなどを行う
        $action = $request->get('action', 'return');
        //インスタンス作成
        $input['password'] = Hash::make($input['password']);
        $member = new Member();
        //インスタンスに値を設定して保存
        $member->fill($input);
        $member->save();

        Mail::to($input['email'])->send(new MemberMail('mails.member', 'テスト登録ありがとうございます', $input));

        //セッションを空にする
        $request->session()->forget("form_input");
        return redirect()->route('member.complete');
    }

    //会員登録完了画面
    function complete(Request $request)
    {
        return view("member.complete");
    }
}
