<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_time extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculums_id',
        'delivery_from',
        'delivery_to',
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
