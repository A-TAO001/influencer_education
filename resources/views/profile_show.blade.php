<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>プロフィール設定</title>
    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
</head>
<body>

<header>
<br>
<a href="#" class="btn">時間割</a>
<a href="{{ route('progress') }}" class="btn">授業進捗</a>
<a href="{{ route('profile_show') }}" class="btn">プロフィール設定</a>
<div class="login">
@guest
                            @if (Route::has('login'))
                                <a class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </a>
                            @endif
                        @else
                            

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
</div>
</header>

<a href="{{ route('user_notice.index') }}"  class = "back">←戻る</a>

<h1>プロフィール変更</h1>

<form action="{{ route('profile_update') }}" method="POST" enctype="multipart/form-data">
@csrf


<div class ="main">

<div class="form-group">

@if ($user->profile_image === null)
    <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="200" height="200">
    @else
    <img class="rounded-circle" src="{{ asset('storage/images/'. $user->profile_image) }}" alt="プロフィール画像" width="200" height="200">
    @endif
    <label for="profile-image" class="form-label">{{ __('プロフィール画像') }}</label>
            <input type="file" class="profile_image" name="profile_image" class="profile_image">
        <br>
        </label>
        @error('profile_image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
<div>
@if ($errors->has('name'))
        <h5 style="color:red">{{ $errors->first('name') }}</h5>
        @endif
<label for="name" class="form-label">{{ __('ユーザーネーム') }}</label>
            <input type="text" class= "name" name="name" value="{{ Auth::user()->name }}" >
    <br>
    @if ($errors->has('name_kana'))
        <h5 style="color:red">{{ $errors->first('name_kana') }}</h5>
    @endif
</div>

<div>
<label for="name_kana" class="form-label">{{ __('カナ') }}</label>
            <input type="text" class="name_kana" name="name_kana" value="{{ Auth::user()->name_kana }}">
        <br>
        @if ($errors->has('email'))
        <h5 style="color:red">{{ $errors->first('email') }}</h5>
    @endif
<label for="email" class="form-label">{{ __('メールアドレス') }}</label>
            <input type="text" class="email" name="email" value="{{ Auth::user()->email }}">
    <br>
</div>

<label for="password" class="form-label">{{ __('パスワード') }}</label>
<a href="{{ route('password_edit') }}" ><button type="button" class="">パスワードを変更する</button></a>
</div>

<button type="submit" class="entry" onclick= "return confirm('登録しますか？');">
{{ __('登録') }}
            </button>


</body>