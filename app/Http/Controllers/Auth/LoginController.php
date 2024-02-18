<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user_top';

    public function login(Request $request)
    {
        // バリデーションルール
        $rules = [
            'email' => ['required', 'email', 'regex:/^[!-~]+$/'], // Eメールは標準のバリデーションを使用
            'password' => ['required', 'regex:/^[A-Za-z0-9]+$/'], // パスワードは半角英数字のみ
        ];
    
        $messages = [
            'email.regex' => 'Eメールアドレスには半角入力を使用してください。',
        ];
    
        // バリデーションの実行
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // 認証試行
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            // 認証に成功した場合の処理
            return redirect()->intended($this->redirectTo);
        }
    
        // 認証に失敗した場合の追加のエラーメッセージ
        return back()->with('error', '認証に失敗しました。')->withInput($request->only('email'));
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     // 自動ログインを無効化
     protected function authenticated(Request $request, $user)
     {
         // ログイン後のリダイレクト先を修正
         return redirect('/user_top');
     }

     /**
 * Show the application's login form.
 *
 * @return \Illuminate\View\View
 */
public function showLoginForm()
{
    if (Auth::check()) {
        // ユーザーがログインしている場合、指定のページにリダイレクト
        return redirect('/user_top');
    }

    // ログインしていない場合、ログインフォームを表示
    return view('auth.user_login');
}

 
protected function loggedOut(Request $request)
{
    return redirect()->route('user.login'); 
}
}
