<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles'; // テーブル名を指定

    public function showArticle() {
        return DB::table('articles')
            ->orderByDesc('posted_date')
            ->limit(5)
            ->get();
        }
}
