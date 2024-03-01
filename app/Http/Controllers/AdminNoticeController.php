<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class AdminNoticeController extends Controller
{

    public function __construct(){

        $this->article = new Article();
    
    }
    /**
     * 一覧画面
     */
    public function index() {
        
        $articles = $this->article->findAllArticles();
        $user = auth()->user();

        return view('admin_notice_index', compact('articles'));

    }
    /**
     * 登録画面
     */
public function create(Request $request)
    {        
        return view('admin_notice_create');
    }
    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        
        $request->validate([

            'posted_date' => 'required',
            'title' => 'required',
            'article_contents' => 'required',
        ],
        [
            'posted_date.required' => '投稿日時は入力必須項目です。',
            'title.required' => 'タイトルは入力必須項目です。',
            'article_contents.required' => '本文は入力必須項目です。'
        
        ]);

        DB::transaction(function () use($request) {
            
            $article = new Article();
            $article -> posted_date = $request -> posted_date;
            $article -> title = $request -> title;
            $article -> article_contents = $request -> article_contents;

            $article -> save();
        });
        return redirect()->route('admin_notice_index');
    }

    /**
     * 編集画面表示
     */

    public function edit( $id) {
        
        $articles = Article::find($id);

        return view('admin_notice_edit' , compact('articles'))
        ->with(['defaultName' => 'posted_date','title', 'article_contents']);
    }
    
    /**
     * 更新処理
     */
    
    public function update(Request $request, $id) {


        $request->validate([
            'title' => 'required',
            'posted_date' => 'required',
            'article_contents' => 'required',
        ],
        [
            'title.required' => '投稿日時は入力必須項目です。',
            'posted_date.required' => 'タイトルは入力必須項目です。',
            'article_contents.required' => '本文は入力必須項目です。'
        
        ]);


    DB::transaction(function () use($request, $id) {
            
        $article = Article::find($id);
        $article -> title = $request -> title;
        $article -> posted_date = $request -> posted_date;
        $article -> article_contents = $request -> article_contents;

        $article -> save();
});

    return redirect()->route('admin_notice_index');
}
    /**
     * 削除処理
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            
            $article = Article::find($id);

            $article->delete();
    });
        return redirect()->route('admin_notice_index');
    }
}