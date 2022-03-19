<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//バリデーション使用
use Validator;

class MemberController extends Controller
{
//会員登録画面
    private $formItems = ["name_sei", "name_mei", "nickname","gender", "password","password_confirmed", "email",];
    private $validator = [
		"name_sei" => "required|string|max:100",
		"name_mei" => "required|string|max:100",
		"nickname" => "required|string",
		"gender" => "required|integer|max:100|in:1,2",
		"password" => "required|string|min:8|max:16",
		"password_confirmed" => "required|string|min:8|max:16|same:password",//passwordと同じか
		"email" => "required|string|max:100|email"
	];
    public function register(){
        // 登録画面表示
        return view("member.register");
    }
  

    public function post(Request $request){
        //セッションから値を取り出す
		$input = $request->only($this->formItems);
		
		$validator = Validator::make($input, $this->validator);
		if($validator->fails()){
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
     function confirm(Request $request){
         //セッションから値を取り出す
		$input = $request->session()->get("form_input");
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("MemberController@register");
		}
        
        // return view("member.confirm",["input" => $input]);
		// $gender = config('master.gender');
		// return view('master.index', compact('gender'));
		




    }


//会員登録処理
     function store(Request $request){
        // return view("member.store");
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");

	//戻るボタンが押された時	
	if($request->has("back")){	
	return redirect()->action("MemberController@register") //セッションに値が無い時はフォームに戻る
	->withInput($input);	
	}
        //セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("MemberController@register");
		}
        //ここでメールを送信するなどを行う
		// DB::insert('insert into reviews (live_date, musician, venue, text, created_at) values (:live_date, :musician, :venue, :text, NOW())', $input);


		//セッションを空にする
		$request->session()->forget("form_input");

		return redirect()->action("MemberController@complete");


    }


//会員登録完了画面
     function complete(Request $request){
        return view("member.complete");
    }
}
