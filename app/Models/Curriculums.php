<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Curriculums extends Model
{
    use HasFactory;

    protected $table = 'curriculums'; // テーブル名を指定
    // 他にもモデルに関連する設定があれば追加
    public function showVideo($id) {
        return $this->join('classes', 'classes_id', '=', 'classes.id')
                    ->select('curriculums.*', 'classes.name')
                    ->where('curriculums.id', $id)
                    ->get();
        }
    
        public function isCurrentlyDelivering()
        {
            $now = Carbon::now();
            return $this->delivery_from <= $now && $this->delivery_to >= $now;
        }

        public function deliveryTime()
{
    return $this->hasOne(DeliveryTime::class, 'curriculums_id');
}
}