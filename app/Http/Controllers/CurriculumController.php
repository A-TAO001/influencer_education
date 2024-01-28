<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Delivery_time;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    
    public function index()
    {
        $curriculums = Curriculum::all();

        return view('curriculums.index', compact('curriculums'));
    }

    public function create()
    {
        // $classes = Class::all();

        return view('curriculums.create', compact('classes'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'nullable|image',
            'description' => 'required|max:255',
            'video_url' => 'required',
            'always_delivery_flg' => 'nullable',
            'classes_id' => 'required',
        ],
        [
            'title.required' => '授業名は必須です',
            'title.max:255' => '最大255文字までです',
            'thumbnail.image' => '画像ファイルを選択してください',
            'description.required' => '授業概要は必須です',
            'description.max:255' => '最大255文字までです',
            'video_url.required' => 'URLは必須です',
            'classes_id.required' => '学年は必須です',
        ]);

        $curriculum = new Curriculum([
            'title' => $request->get('title'),
            // 'thumbnail' => $request->get('thumbnail'),
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

    
    public function show(Curriculum $curriculum)
    {
        return view('curriculums.show', ['curriculum' => $curriculum]);
    }

    
    public function edit(Curriculum $curriculum)
    {
        // $classes = Class::all();

        return view('curriculums.edit', compact('curriculum', 'classes'));
    }

    public function update(Request $request, Curriculum $curriculum)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video_url' => 'required',
            'classes_id' => 'required',
        ]);

        $curriculum->title = $request->title;
        $curriculum->description = $request->description;
        $curriculum->video_url = $request->video_url;
        $curriculum->classes_id = $request->classes_id;

        $curriculum->save();

        return redirect()->route('curriculums.index')
            ->with('success', 'Curriculum updated successfully');
    }

    
    public function destroy(Curriculum $curriculum)
    {
        $curriculum->delete();
        return redirect('/curriculums');
    }
    public function filterByClass(Request $request)
    {
        $classId = $request->input('class_id');

        $curriculums = Curriculum::where('classes_id', $classId)->get();

        return view('curriculums.index', compact('curriculums'));
    }
}
