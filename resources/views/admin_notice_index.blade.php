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

<a href="{{ route('user_notice.index') }}" class = "back">←戻る</a>

<div class="main">

<h1>お知らせ一覧</h1>

<a href="{{ route('admin_notice_create') }}" class="btn2">新規登録</a>

<table class="table table-striped" id = admin_notice.table>
<thead>
<tr>
    <th  class="contents">投稿日時</th>
    <th class="contents">タイトル</th>
</tr>

</thead>

<tbody>
    @foreach ($articles as $article)
    <tr>
    <td  class="contents">{{ $article->posted_date ->format('Y年m月d日')}}</td>
    <td  class="contents"> {{ $article->title }}</td>
    <td><a href="{{ route('admin_notice_edit',['id'=>$article->id]) }}" class=" btn2">変更する</a></td>
    <td>
        <form  action="{{ route('admin_notice.delete', ['id'=>$article->id]) }}" method="DELETE" >
        @csrf
        
        <button type="submit" class="btn3 btn-danger"  data-id = "{{ $article->id }}" onclick= "return confirm('本当に削除しますか？');">削除</button>
        </form>
    </td>
    </tr>
    @endforeach
</tbody>

</table>
</div>
</body>
