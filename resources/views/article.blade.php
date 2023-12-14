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
<a href="#" class="btn">授業進捗</a>
<a href="#" class="btn">プロフィール設定</a>
<a href="#" class="btn1">ログアウト</a>
</header>

<a href="#" class = "back">←戻る</a>

<div class ="main">
@foreach($articles as $article)
    <p class= "date">{{ $article->posted_date }}</p>
    <p class= "title">{{ $article->title }}</p>
    <p class= "contents">{{ $article->article_contents }}</p>
    @endforeach
</div>
</body>
