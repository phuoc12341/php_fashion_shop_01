<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class AjaxController extends Controller
{
    public function getCategory($id)
    {
        $category_list = Category::whereNotNull('parent_id')->get();
        $checked_category = Category::findOrFail($id);
        $array = collect([$checked_category->id => $checked_category->name]);
        foreach ($category_list as $cat) {
            $curent_category = $cat;
            while ($curent_category->parent_id != null) {
                if ($curent_category->parent_id == $id) {
                    array_add($array, $cat->id, $cat->name);
                    break;
                } else {
                    $parent_category_id = $curent_category->parent_id;
                    $parent_category = Category::findOrFail($parent_category_id);
                    $curent_category = $parent_category;
                }
            }
        }
        $array->pull('0');
        
        return response()->json([$array]);
    }
}
