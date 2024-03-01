<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    use HasFactory;

     // モデルに関連付けるテーブル
    protected $table = 'curriculum_progress';

     // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'curriculums_id',
        'users_id',
        'clear_flg',
        'created_at',
        'updated_at'
    ];
}
