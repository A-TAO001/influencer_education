<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>授業進捗</title>
    <link rel="stylesheet" href="{{ asset('/css/curriculum_progress.css') }}">
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

<a href="{{ route('user_notice.index') }}" class = "back">←戻る</a>

<div class = "main">

<h1>授業進捗</h1>

<table class="table table-striped" >

    <tbody>
        
    @foreach ($user as $user)

    @if ($user->profile_image === null)
        <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="200" height="200">
    @else
        <img class="rounded-circle" src="{{ asset('storage/images/'. $user->profile_image)}}" alt="プロフィール画像" width="200" height="200">
    @endif
    
    <h1>{{ $user->name }}さんの授業進捗</h1>
    <br>
    現在の学年 :<div class="
    @if($user->classes_id >= 1 && $user->classes_id <= 6)
        blue
    @elseif($user->classes_id >= 7 && $user->classes_id <= 9)
        aquamarine
    @elseif($user->classes_id >= 10 && $user->classes_id <= 12)
        lightgreen
    @endif
"> {{ $user->classes_id}}</div>
    
    
    @endforeach



    <br>
    @foreach ($classesTables as $classesTable)
    <tr>
    <div class="
    @if($classesTable->id >= 1 && $classesTable->id <= 6)
        blue
    @elseif($classesTable->id >= 7 && $classesTable->id <= 9)
        aquamarine
    @elseif($classesTable->id >= 10 && $classesTable->id <= 12)
        lightgreen
    @endif
">{{ $classesTable->name }}</div>

    @endforeach
    </tbody>
</div>