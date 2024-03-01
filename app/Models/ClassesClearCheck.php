<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesClearCheck extends Model
{
    use HasFactory;

      // モデルに関連付けるテーブル
    protected $table = 'classes_clear_checks';

      // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'users_id',
        'classes_id',
        'clear_flg',
        'created_at',
        'updated_at'
    ];
}
