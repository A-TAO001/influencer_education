<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お知らせ</title>
    <link rel="stylesheet" href="{{ asset('/css/article.css') }}">
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

<h1>お知らせ一覧</h1>

<div class ="main">
@foreach($articles as $article)
    <p class= "date">{{ $article->posted_date ->format('Y年m月d日')}}</p>
    <p class= "title">{{ $article->title }}</p>
    <p class= "contents">{{ $article->article_contents }}</p>
    @endforeach
</div>


<a href="{{ route('admin_notice_index') }}" class="btn">管理お知らせ</a>
</body>
