<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\PostAddCategoryRequest;
use App\Http\Requests\PostEditCategoryRequest;

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

    public function getEdit($id)
    {
        $category = Category::findOrFail($id);
        $list_top_category = Category::whereNull('parent_id')->get();
        $curent_category = $category;
        while ($curent_category->parent_id != null) {
            $parent_category_id = $curent_category->parent_id;
            $parent_category = Category::findOrFail($parent_category_id);
            $curent_category = $parent_category;
        }
        $top_category_id = $curent_category->id;

        return view('admin/category/edit', ['category' => $category, 'list_top_category' => $list_top_category, 'top_category_id' => $top_category_id]);
    }

    public function postEdit(PostEditCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_category;
        $category->slug = str_slug($request->name);
        $category->priority = $request->priority;
        $category->save();

        return redirect()->route('getEditCategory', ['id' => $id])->with('success', __('message.edit'));
    }

    public function getDelete($id)
    {
        $selected_category = Category::findOrFail($id);
        $category_list = Category::whereNotNull('parent_id')->get();
        $array = collect([$id => $selected_category]);
        foreach ($category_list as $cat) {
            $curent_category = $cat;
            while ($curent_category->parent_id == null) {
                if ($curent_category->parent_id == $id) {
                    array_add($array, $cat->id, $cat);
                    break;
                } else {
                    $parent_category_id = $curent_category->parent_id;
                    $parent_category = Category::findOrFail($parent_category_id);
                    $curent_category = $parent_category;
                }
            }
        }
        foreach ($array as $deleted_category) {
            $deleted_category->delete();
        }

        return redirect()->route('getListCategory')->with('success', __('message.delete'));
    }
}
