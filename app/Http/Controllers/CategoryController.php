<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\PostAddCategoryRequest;

class CategoryController extends Controller
{
    public function getList()
    {
        $category = Category::all();

        return view('admin/category/list', ['category' => $category]);
    }

    public function getAdd()
    {
        $list_top_category = Category::whereNull('parent_id')->get();
        
        return view('admin.category.add', ['list_top_category' => $list_top_category]);
    }

    public function postAdd(PostAddCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_category,
            'slug' => str_slug($request->name),
            'priority' => $request->priority,
        ]);

        return redirect('admin/category/add')->with('success', __('message.add'));
    }
}
