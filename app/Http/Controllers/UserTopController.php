<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Banner;

class UserTopController extends Controller
{
    public function showBanner()
    {
        // banners テーブルからデータを取得
        $banner = new Banner();
        $banners = $banner->showBanner();

        return $banners;
    }

    public function showArticle()
    {
        // Article モデルの showArticle メソッドを呼び出し
        $article = new Article();
        $articles = $article->showArticle();

        // ビューにデータを渡す
        return $articles;
    }

    public function showPage()
{
    $banners = $this->showBanner();
    $articles = $this->showArticle();
    
    return view('user_top', compact('banners', 'articles'));
}


public function show($id)
{
    $article = Article::findOrFail($id); 

    return view('articles_show', ['article' => $article]); //articles.showの部分はbladeテンプレート名を聞いて変更する　メソッドも呼び出す
}

    
}
