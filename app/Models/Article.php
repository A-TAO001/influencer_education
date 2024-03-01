<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

     // モデルに関連付けるテーブル
    protected $table = 'articles';

     // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'posted_date',
        'article_contents'
    ];

        protected $dates = [
            'posted_date',
            'created_at',
            'updated_at',
        ];

    public function findAllArticles()
    {
        $data = Article::all();
        return $data;
    }
    /**
     * 登録処理
     */
    public function InsertArticle($request)
    {
        return $this->create([

        'title' => $request->title,
        'posted_date' => $request->posted_date,
        'article_contents' => $request->article_contents

        ]);
    }

    /**
     * 更新処理
     */
    public function updateArticle($request)
    {
        $result = $article->fill([
            'title' => $request->title,
            'posted_date' => $request->posted_date,
            'article_contents' => $request->article_contents
    
        ])->save();

        return $result;
    }

    /**
     * 削除処理
     */
    public function deleteArticleById($id)
    {
        return $this->destroy($id);
    }
}
