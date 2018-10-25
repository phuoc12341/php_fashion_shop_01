<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;

use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    public function getList()
    {
        $slide = Slide::all();

        return view('admin.slide.list', ['slide' => $slide]);
    }

    public function getAdd()
    {
        return view('admin.slide.add');
    }

    public function postAdd(SlideRequest $request)
    {
        $file = $request->file('image');
        $file->move(config('image.paths.resource'), $file->getClientOriginalName());
        $slide = Slide::create([
        	'link' => $request['link'],
        	'image' => $file->getClientOriginalName(),
        ]);
        
        return redirect('admin/slide/add')->with('message', trans('message.add'));
    }

    public function getEdit($id)
    {
        $slide = Slide::findOrFail($id);

        return view('admin.slide.edit', ['slide'=>$slide]);
    }

    public function postEdit(SlideRequest $request, $id)
    {
        $slide = Slide::findOrFail($id);
        $slide->link = $request->link;
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move(config('image.paths.resource'), $file->getClientOriginalName());
            $slide->image = $file->getClientOriginalName();
        }
        $slide->update();

        return redirect('admin/slide/edit/' . $id)->with('message', trans('message.edit'));
    }

    public function getDelete($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();

        return redirect('admin/slide/list')->with('message', trans('message.delete'));
    }
}
