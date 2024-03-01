<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesTable extends Model
{
    use HasFactory;

     // モデルに関連付けるテーブル
    protected $table = 'classes';

     // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

}
