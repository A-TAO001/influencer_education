<?php

namespace App\Http\Controllers;

use App\Models\ClassesTable as ClassName;
use App\Models\Curriculum;
use App\Models\Delivery_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
{
    
    public function index()
    {
        $classCategories = ['小学校1年生','小学校2年生','小学校3年生','小学校4年生','小学校5年生','小学校6年生','中学校1年生','中学校2年生','中学校3年生','高校1年生','高校2年生','高校3年生'];
        
        $curriculums = Curriculum::all();

        return view('curriculums.index', compact('classCategories','curriculums'));
    }

    public function create()
    {
        $classes = ClassName::all();

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

            DB::transaction(function () use($request) {

                $model = new Curriculum;
                $curriculums = $model->store($request);
            });
        return redirect()->route('curriculums.index');
    }
    
    public function show(Curriculum $curriculum)
    {
        return view('curriculums.show', ['curriculum' => $curriculum]);
    }

    
    public function edit(Curriculum $curriculum)
    {
        $classes = ClassName::all();

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
        $classCategories = [
            '小学校1年生', '小学校2年生', '小学校3年生', '小学校4年生', '小学校5年生', '小学校6年生', '中学校1年生', '中学校2年生', '中学校3年生', '高校1年生', '高校2年生', '高校3年生'
        ];


        return view('curriculums.index', compact('curriculums', 'classCategories'));
    }
}




// $classCategories = [
//     ['id' => 1, 'name' => '小学1年生'],
//     ['id' => 2, 'name' => '小学2年生'],
//     ['id' => 3, 'name' => '小学3年生'],
//     ['id' => 4, 'name' => '小学4年生'],
//     ['id' => 5, 'name' => '小学5年生'],
//     ['id' => 6, 'name' => '小学6年生'],
//     ['id' => 7, 'name' => '中学1年生'],
//     ['id' => 8, 'name' => '中学2年生'],
//     ['id' => 9, 'name' => '中学3年生'],
//     ['id' => 10, 'name' => '高校1年生'],
//     ['id' => 11, 'name' => '高校2年生'],
//     ['id' => 12, 'name' => '高校3年生'],

// ];