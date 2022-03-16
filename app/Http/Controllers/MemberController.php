<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//バリデーション使用
use Validator;

class MemberController extends Controller
{
//会員登録画面
    private $formItems = ["name", "title", "body"];
    private $validator = [
		"name" => "required|string|max:100",
		"title" => "required|string|max:100",
		"body" => "required|string|max:100"
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
        
        return view("member.confirm",["input" => $input]);



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




		//セッションを空にする
		$request->session()->forget("form_input");

		return redirect()->action("MemberController@complete");


    }


//会員登録完了画面
     function complete(Request $request){
        return view("member.complete");
    }
}
