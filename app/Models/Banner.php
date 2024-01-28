<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners'; // テーブル名を指定
    // 他にもモデルに関連する設定があれば追加
    public function showBanner() {
        return DB::table('banners')
            ->get();
        }
}

