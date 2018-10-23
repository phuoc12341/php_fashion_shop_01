<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Http\Requests\PromotionRequest;

class PromotionController extends Controller
{
    public function getList()
    {
        $promotion = Promotion::all();

        return view('admin.promotion.list', compact('promotion'));
    }

    public function getAdd()
    {
        return view('admin.promotion.add');
    }

    public function postAdd(PromotionRequest $request)
    {
        $promotion = Promotion::create([
            'description' => $request->description,
            'discount' => $request->discount,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
        ]);

        return redirect('admin/promotion/add')->with('message', __('message.add'));
    }

    public function getEdit($id)
    {
        $promotion = Promotion::findOrFail($id);

        return view('admin.promotion.edit', compact('promotion'));
    }

    public function postEdit(PromotionRequest $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->description = $request->description;
        $promotion->discount = $request->discount;
        $promotion->start_at = $request->start_at;
        $promotion->end_at = $request->end_at;
        $promotion->update();

        return redirect('admin/promotion/edit/' . $id)->with('message', __('message.edit'));
    }

    public function getDelete($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect('admin/promotion/list')->with('message', __('message.delete'));
    }
}
