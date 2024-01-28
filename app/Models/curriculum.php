<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'video_url',
        'always_delivery_flg',
        'classes_id',
    ];

    public function delivery_times()
    {
        return $this->hasMany(Delivery_time::class);
    }

    public function curriculum_progress()
    {
        return $this->hasMany(curriculum_progress::class);
    }
}
