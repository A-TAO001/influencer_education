<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理お知らせ一覧</title>
    <link rel="stylesheet" href="{{ asset('/css/admin_notice.css') }}">
</head>
<body>

<header>
<br>
<a href="#" class="btn">授業管理</a>
<a href="{{ route('admin_notice_index') }}" class="btn">お知らせ管理</a>
<a href="" class="btn">バナー管理</a>
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

<a href="{{ route('admin_notice_index') }}" class = "back">←戻る</a>

<h1>お知らせ新規登録</h1>
<form action="{{ route('admin_notice.store') }}" method="POST">
@csrf

        <div class="form-group">
        
        <div>
        @if ($errors->has('posted_date'))
        <h5 style="color:red">{{ $errors->first('posted_date') }}</h5>
    @endif

            <label for="posted_date">{{ __('投稿日時') }}</label>
            <input type="date" class="form-control" name="posted_date" id="posted_date">
        </dit>

        <div>
        @if ($errors->has('title'))
        <h5 style="color:red">{{ $errors->first('title') }}</h5>
    @endif
            <label for="title">{{ __('タイトル') }}</label>
            <input type="text" class="form-control" name="title" id="title">
        </dit>

        <div>
        @if ($errors->has('article_contents'))
        <h5 style="color:red">{{ $errors->first('article_contents') }}</h5>
    @endif
            <label for="article_contents">{{ __('本文') }}</label>
            <textarea type="text" class="form-control" name="article_contents" id="article_contents"></textarea>
        </dit>

        <button type="submit" class="btn btn-success" onclick= "return confirm('登録しますか？');">
                {{ __('登録') }}
            </button>
        </div>
        </form>