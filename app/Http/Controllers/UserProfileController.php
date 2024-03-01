<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;


class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->classesTable = new ClassesTable();

    }

public function show() 
{
    $user = Auth::user();
    $user = User::all()->first();
    return view('profile_show', ['user' => $user],);

}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'name_kana' => 'required',
        'email' => 'required',
    ],
    [
        'name.required' => 'ユーザ名は必須です。',
        'name_kana.required' => 'カナは必須項目です。',
        'email.required' => 'メールアドレスは必須です。'
                
                ]);

    DB::transaction(function () use($request,$user) {
        $user = Auth::user();
        $user = User::all()->first();
        $user->name = $request->input('name');
        $user->name_kana = $request->input('name_kana');
        $user->email = $request->input('email');
        if($request ->file('profile_image')){
            $img = $request->file('profile_image')->getClientOriginalName();
            $path = Str::random(40) . '.' . $img;
            $filePath = $request -> file('profile_image') ->storeAs('public/images', $path);
            $user -> profile_image = $path;

        }else{
            $user->profile_image = null;

        } $user->save();

});

    return redirect()->route('profile_show')->with('msg_success', 'プロフィールの更新が完了しました');
}


public function profileUpdate(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'name_kana' => 'required',
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
    ],
    [
        'name.required' => 'ユーザ名は必須です。',
        'name_kana.required' => 'カナは必須項目です。',
        'email.required' => 'メールアドレスは必須です。'
                
                ]);

    DB::transaction(function () use($request,$user) {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->name_kana = $request->input('name_kana');
        $user->email = $request->input('email');
        if($request ->file('profile_image')){
            $img = $request->file('profile_image')->getClientOriginalName();
            $path = Str::random(40) . '.' . $img;
            $filePath = $request -> file('profile_image') ->storeAs('public/images', $path);
            $user -> profile_image = $path;

        }else{
            $user->profile_image = null;

        } $user->save();

});

    return redirect()->route('profile_show')->with('msg_success', 'プロフィールの更新が完了しました');
}


protected function validator(array $data)
{
    return Validator::make($data,[
        'new_password' => 'required|string|min:8|confirmed',
        ]);
}

public function password() {

    $user = Auth::user();
    $user = User::all()->first();
    return view('password',['user' => $user]);

    
}



public function passwordUpdate(Request $request, User $user) 
{    
    $user = \Auth::user();
    $user = User::all()->first();

    DB::transaction(function () use($request,$user) {

    $this->validator($request->all())->validate();
    
    
    if (!password_verify($request->current_password, $user->password)) {
        return redirect()->route('password_edit')
                ->with('warning', 'パスワードが違います');
    }else{
        $user->password = bcrypt($request->new_password);
    }
        $user->save();
        return redirect()->route('password_edit')
        ->with('status', 'パスワードを変更しました');
    
    
});
 return redirect()->route('password_edit');

}



}