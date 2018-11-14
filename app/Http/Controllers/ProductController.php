<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\PostAddProductRequest;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Storage;
use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\ProductPromotion;

class ProductController extends Controller
{
    public function getList()
    {
        $product_list = Product::all();

        return view('admin.product.list', ['product_list' => $product_list]);
    }

    public function getAdd()
    {
        $manufacturer_list = Manufacturer::all();
        $list_top_category = Category::whereNull('parent_id')->get();

        return view('admin.product.add', ['list_top_category' => $list_top_category, 'manufacturer_list' => $manufacturer_list]);
    }

    public function postAdd(PostAddProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'brief_description' => $request->brief_description,
            'detailed_description' => $request->detailed_description,
            'slug' => str_slug($request->name),
            'unit_price' => $request->unit_price,
            'manufacturer_id' => $request->manufacturer,
            'viewed_count' => 0,
            'purchased_count' => 0,
        ]);

        $product_size = ProductSize::create([
            'product_id' => $product->id,
            'size' => $request->size,
        ]);

        $product_color = ProductColor::create([
            'product_id' => $product->id,
            'color' => $request->color,
        ]);

        $files = $request->file('images');

        if ($request->hasFile('images')) {
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $origin_path = $file->store(config('image.image.product'));
                    $path = str_replace_first(config('image.image.product').'/', '', $origin_path);
                    $product_image = ProductImage::create([
                        'product_color_id' => $product_color->id,
                        'image' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('getAddProduct')->with('message', __('message.add'));
    }

    public function getEdit($id)
    {
        $product = Product::findOrFail($id);
        $list_top_category = Category::whereNull('parent_id')->get();

        return view('admin.product.edit', ['product' => $product, 'list_top_category' => $list_top_category]);
    }

    public function postEdit(PostAddProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->brief_description = $request->brief_description;
        $product->detailed_description = $request->detailed_description;
        $product->slug = str_slug($request->name);
        $product->unit_price = $request->unit_price;
        $product->manufacturer_id = $request->manufacturer;
        $product->viewed_count = 0;
        $product->purchased_count = 0;
        $product->save();

        $product_size = $product->productSizes()->first();
        $product_size->size = $request->size;
        $product_size->save();

        $product_color = $product->productColors()->first();
        $product_color->color = $request->color;
        $product_color->save();

        if ($request->hasFile('images')) {
            $list_image = $product_color->productImages();
            foreach ($list_image as $img) {
                Storage::delete($img->image);
                $img->delete();
            }

            $files = $request->file('images');
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $origin_path = $file->store(config('image.image.product'));
                    $path = str_replace_first(config('image.image.product').'/', '', $origin_path);
                    $product_image = ProductImage::create([
                        'product_color_id' => $product_color->id,
                        'image' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('getEditProduct', [$id])->with('message', __('message.edit'));
    }

    public function getDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        $product_list = Product::all();

        return redirect()->route('getListProduct')->with('message', __('message.delete'));
    }
}
