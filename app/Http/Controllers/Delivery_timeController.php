<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Delivery_time;
use App\Models\ClassesTable as ClassName;
use Illuminate\Http\Request;

class Delivery_timeController extends Controller
{
    
    public function index()
    {
        $delivery_times = Delivery_time::all();

        return view('delivery_times.index', compact('delivery_times'));
    }

    public function create()
    {
        $delivery_times = Delivery_time::all();

        return view('delivery_times.create', compact('delivery_times'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'curriculums_id' => 'required',
            'delivery_from' =>'nullable',
            'delivery_to' => 'nullable',
        ]);

        $delivery_time = new Delivery_time([
            'curriculums_id' => $request->get('curriculums_id'),
            'delivery_from' => $request->get('delivery_from'),
            'delivery_to' => $request->get('delivery_to'),
        ]);

        $delivery_time->save();

        return redirect('curriculums');
    }

    public function show(Delivery_time $delivery_time)
    {
        return view('delivery_ti¥mes.show', ['delivery_time' => $delivery_time]);
    }

    public function edit($curriculumID, $delivery_timeId)
    {
        // $classes = Class::all();
        $curriculum = Curriculum::find($curriculumId);
        $delivery_time = DeliveryTime::find($deliveryTimeId);

        // データが取得できたか確認
        if (!$curriculum || !$delivery_time) {
            abort(404); //　データが見つからない場合はエラー表示する
        }
        return view('delivery_times.edit', compact('curriculum', 'delivery_time'));
    }

    public function update(Request $request, Delivery_time $delivery_time)
    {
        $request->validate([
            'delivery_from' =>'nullable',
            'delivery_to' => 'nullable',
        ]);

        $delivery_time->delivery_from = $request->delivery_from;
        $delivery_time->delivery_to = $request->delivery_to;
        $delivery_time->save();

        return redirect()->route('curriculums.index')
            ->with('success', 'Delivery_time updated successfully');
    }

    public function destroy(Delivery_time $delivery_time)
    {
        $delivery_time->delete();

        return redirect('/curriculums');
    }
}
