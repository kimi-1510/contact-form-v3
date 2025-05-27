<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        // バリデーションエラーをチェック
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect()->route('admin')->with('success', 'ログインしました！');
        }

        return back()->withErrors(['email' => 'メールアドレスまたはパスワードが違います'])->withInput();
    }

}
