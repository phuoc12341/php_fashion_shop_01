<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Http\Requests\AddManufacturerRequest;
use App\Http\Requests\EditManufacturerRequest;

class ManufacturerController extends Controller
{
    public function getList()
    {
        $manufacturer = Manufacturer::all();

        return view('admin.manufacturer.list', ['manufacturer' => $manufacturer]);
    }

    public function getAdd()
    {
        return view('admin.manufacturer.add');
    }

    public function postAdd(AddManufacturerRequest $request)
    {
        $manufacturer = Manufacturer::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'country' => $request['country'],
        ]);

        return redirect('admin/manufacturer/add')->with('message', __('message.add'));
    }

    public function getEdit($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);

        return view('admin.manufacturer.edit', compact('manufacturer'));
    }

    public function postEdit(EditManufacturerRequest $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->name = $request->name;
        $manufacturer->description = $request->description;
        $manufacturer->country = $request->country;
        $manufacturer->update();

        return redirect('admin/manufacturer/edit/' . $id)->with('message', __('message.edit'));
    }

    public function getDelete($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();

        return redirect('admin/manufacturer/list')->with('message', __('message.delete'));
    }
}
