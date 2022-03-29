<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Member;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;
//下記を追加
use Illuminate\Notifications\Notifiable;

class HelloController extends Authenticatable
{

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインして下さい。'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email,
            'password' => $password])) {
            $msg = 'ログインしました。（' . Auth::members()->name . '）';
        } else {
            $msg = 'IDもしくはパスワードが間違っています';
        }
        return view('hello.auth', ['message' => $msg]);
    }

}
