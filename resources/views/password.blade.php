<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>パスワード変更</title>
    <link rel="stylesheet" href="{{ asset('/css/password.css') }}">
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

<a href="{{ route('profile_show') }}" class = "back">←戻る</a>

@if(session('warning'))
        <div class="alert">
            {{ session('warning') }}
        </div>
    @endif

    @if(session('status'))
        <div class="alert1">
            {{ session('status') }}
        </div>
    @endif

<h1>パスワード変更</h1>

<form action="{{ route('password_update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class ="main">
<div>
@if ($errors->has('current_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
<label for="current_password">{{ __('旧パスワード') }}</label>
            <input type="text" class= "current_password" name="current_password" >
        <br>
</div>
<div>
@if ($errors->has('new_password'))
        <h5 style="color:red">{{ $errors->first('new_password') }}</h5>
        @endif
<label for="new_password">{{ __('新パスワード') }}</label>

            <input type="text" class="new_password" name="new_password">
            <br>
</div>
<div>
@if ($errors->has('new_password_confirmation'))
        <h5 style="color:red">{{ $errors->first('new_password_confirmation') }}</h5>
        @endif
<label for="new_password_confirmation">{{ __('新パスワード確認') }}</label>
            <input type="text" class="new_password_confirmation" name="new_password_confirmation">
            
    <br>
</div>
</div>


<button type="submit" class="entry" onclick= "return confirm('変更しますか？');">
{{ __('変更する') }}
            </button>

            @if ($errors->any())
        <script src="{{ asset('js/modal.js') }}"></script>
    @endif
</body>