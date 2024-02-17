<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    protected $table = 'curriculum_progress';
    protected $fillable = ['curriculum_id', 'clear_flg']; // カラムに基づいてフィールドを追加

    public function curriculum()
    {
        return $this->belongsTo(Curriculums::class, 'curriculum_id');
    }

    /**
     * カリキュラムの進捗情報を更新するメソッド
     *
     * @return bool
     */
    public function updateProgress()
    {
        $this->clear_flg = 1; // 受講済みを示すフラグを設定
        return $this->save(); // モデルの変更を保存して更新
    }
}
