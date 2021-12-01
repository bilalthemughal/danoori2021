<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.pages.product.index');
    }

    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('admin.pages.product.create', compact('categories'));
    }

    public function store(ProductCreateRequest $request)
    {
        $image_file = $request->file('image');
        if (!$image_file->isValid()) {
            return back();
        }

        $params = $request->validated();

        if ($request->video_path) {
            $params['video_path'] = $request->video_path;
        }

        $params['large_photo_path'] = $request->file('image')->store('Products', 's3');

        $params['second_photo_path'] = $request->file('second_image')->store('Products', 's3');

        $small = Image::make(request()->file('image'))->resize(296,444)->encode('jpg');

        $append_str = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 6);
        $image_name = $append_str . $request->file('image')->getClientOriginalName();
        Storage::disk('s3')->put('Products/'.$image_name, (string)$small);
        $params['small_photo_path'] = 'Products/'.$image_name;

        Product::create($params);

        return redirect()->route('admin.product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('admin.pages.product.edit', compact('product', 'categories'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $params = $request->validated();

        if ($request->image) {
            $image_file = $request->file('image');
            if (!$image_file->isValid()) {
                return back();
            }

            Storage::disk('s3')->delete($product->small_photo_path);
            Storage::disk('s3')->delete($product->large_photo_path);

            $params['large_photo_path'] = $request->file('image')->store('Products', 's3');

            $small = Image::make(request()->file('image'))->resize(296,444)->encode('jpg');
            $append_str = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 6);
            
            $image_name = $append_str . $request->file('image')->getClientOriginalName();

            Storage::disk('s3')->put('Products/'.$image_name, (string)$small);
            $params['small_photo_path'] = 'Products/'.$image_name;
        }

        if ($request->second_image) {
            $image_file = $request->file('second_image');
            if (!$image_file->isValid()) {
                return back();
            }

            if ($product->second_photo_path) {
                Storage::disk('s3')->delete($product->second_photo_path);
            }

            $params['second_photo_path'] = $request->file('second_image')->store('Products', 's3');
        }

        if ($request->video_path) {
            $params['video_path'] = $request->video_path;
        }

        $product->update($params);
        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product)
    {
        Storage::disk('s3')->delete($product->small_photo_path);
        Storage::disk('s3')->delete($product->large_photo_path);
        Storage::disk('s3')->delete($product->second_photo_path);


        $images = $product->images;
        foreach ($images as $image) {
            Storage::disk('s3')->delete($image->path);
        }
        $product->images()->delete();
        $product->delete();
        return back();
    }

    public function dt_ajax_products_data()
    {
        $query = Product::query()
            ->select(['id', 'name', 'slug', 'label_tag', 'small_photo_path', 'is_active', 'original_price', 'discounted_price', 'category_id'])
            ->with('category:id,name');

        return Datatables::of($query)
            ->addColumn('action', function ($products) {
                return
                    '<form class="d-inline" action=' . route('admin.product.destroy',  $products->id) . '  method="POST">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                    <button type="submit" class="btn btn-danger btn-xs"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        ><i class="fa fa-trash"></i></button>
                    </form>
                    <a class="btn btn-info btn-xs" href=' . route('admin.product.edit', $products->id) . '><i class="fa fa-edit"></i></a>
                    <a class="btn btn-info btn-xs" href=' . route('admin.product.images', $products->id) . '><i class="fa fa-image"></i></a>
                    <a class="btn btn-info btn-xs" href=' . route('admin.budget.show', $products->id) . '>$$</a>
                    ';
            })
            ->addColumn('status', function ($products) {
                if ($products->is_active == 1) {
                    return '<span class="badge badge-pill badge-success">Active</span>';
                }

                return '<span class="badge badge-pill badge-danger">In-active</span>';
            })
            ->addColumn('image', function ($products) {
                return '<img class="img-popup" height="50px" width="50px" src=' . get_image_path($products->small_photo_path) . '>';
            })
            ->rawColumns(['action', 'status', 'image'])
            ->make();
    }
}
