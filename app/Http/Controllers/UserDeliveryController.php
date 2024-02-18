<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculums;
use App\Models\CurriculumProgress;
use App\Models\DeliveryTime; 

class UserDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('user_delivery');
    }

    public function showVideo($id)
    {
        // テーブルからデータを取得
        $curriculum = new curriculums();
        $curriculums = $curriculum->showVideo($id);

        return $curriculums;
    }

    public function showPage($id)
{
    $curriculums = $this->showVideo($id)->load('deliveryTime');
    $deliveryTime = DeliveryTime::where('curriculums_id', $id)->first();
    $curriculumProgress = CurriculumProgress::where('curriculums_id', $id)->first();
    $clearFlag = $curriculumProgress ? $curriculumProgress->clear_flg : null;
    $curriculum = Curriculums::find($id);
    $alway_delivery_flg = $curriculum->alway_delivery_flg;

    return view('user_delivery', compact('curriculums','deliveryTime','clearFlag','alway_delivery_flg'));
}

public function markAsCompleted(Request $request)
{
    $curriculumId = $request->input('curriculums_id');
    $curriculum = Curriculums::find($curriculumId);

    // カリキュラムが見つからない場合は404エラーを返す
    if (!$curriculum) {
        return response()->json(['success' => false, 'message' => 'カリキュラムが見つかりません'], 404);
    }

    $curriculumProgress = CurriculumProgress::where('curriculums_id', $curriculumId)->first();
    if ($curriculumProgress && $curriculumProgress->clear_flg == 1) {
        return response()->json(['success' => true], 200);
    }

    // alwayDeliveryFlgが1の場合、または配信期間内である場合にのみ処理を続ける
    $deliveryTime = DeliveryTime::where('curriculums_id', $curriculumId)->first();
    if ($curriculum->alway_delivery_flg != 1 && (!$deliveryTime || !$deliveryTime->isCurrentlyDelivering())) {
        return response()->json(['success' => false, 'message' => 'カリキュラムは現在配信されていません'], 400);
    }

    if ($curriculumProgress) {
        $curriculumProgress->clear_flg = 1;
        $curriculumProgress->save();
        return response()->json(['success' => true], 200);
    } else {
        return response()->json(['success' => false, 'message' => 'カリキュラムの進捗情報が見つかりません'], 404);
    }
}
}