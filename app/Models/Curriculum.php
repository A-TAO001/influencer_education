<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

     // モデルに関連付けるテーブル
    protected $table = 'curriculums';

     // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'thumbnail',
        'description',
        'video_url',
        'alway_delivery_flg',
        'classes_id',
        'created_at',
        'updated_at'
    ];
}
