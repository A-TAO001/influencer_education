<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'video_url',
        'always_delivery_flg',
        'classes_id',
    ];

    public function store($request)
    {
        $curriculum = new Curriculum([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'video_url' => $request->get('video_url'),
            'always_delivery_flg' => $request->get('always_delivery_flg'),
            'classes_id' => $request->get('classes_id'),
        ]);

        if($request->hasFile('thumbnail')){
            $filename = $request->thumbnail->getClientOriginalName();
            $filePath = $request->thumbnail->storeAs('curriculums', $filename, 'public');
            $curriculum->thumbnail = '/storage/' . $filePath;
        }

        $curriculum->save();
        
        return redirect('curriculums');
    }
    public function delivery_times()
    {
        return $this->hasMany(Delivery_time::class);
    }

    public function curriculum_progress()
    {
        return $this->hasMany(curriculum_progress::class);
    }
}
