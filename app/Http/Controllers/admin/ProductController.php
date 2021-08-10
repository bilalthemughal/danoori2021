<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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


        $params['large_photo_path'] = Cloudinary::uploadFile($request->file('image')->getRealPath(), [
            'folder' => 'Products',

        ])->getPublicId();


        $params['second_photo_path'] = Cloudinary::uploadFile($request->file('second_image')->getRealPath(), [
            'folder' => 'Products',

        ])->getPublicId();



        $params['small_photo_path'] = Cloudinary::upload($request->file('image')->getRealPath(), [
            'folder' => 'Products',
            'transformation' => [
                'width' => 296,
                'height' => 444,
                'quality' => 100
            ]
        ])->getPublicId();

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

            Cloudinary::destroy($product->small_photo_path);
            Cloudinary::destroy($product->large_photo_path);


            $params['large_photo_path'] = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'Products',
            ])->getPublicId();

            $params['small_photo_path'] = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'Products',
                'transformation' => [
                    'width' => 296,
                    'height' => 444,
                    'quality' => 100
                ]
            ])->getPublicId();
        }

        if ($request->second_image) {
            $image_file = $request->file('second_image');
            if (!$image_file->isValid()) {
                return back();
            }

            if ($product->second_photo_path) {
                Cloudinary::destroy($product->second_photo_path);
            }


            $params['second_photo_path'] = Cloudinary::upload($request->file('second_image')->getRealPath(), [
                'folder' => 'Products',
            ])->getPublicId();
        }

        $product->update($params);
        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product)
    {
        Cloudinary::destroy($product->small_photo_path);
        Cloudinary::destroy($product->large_photo_path);
        Cloudinary::destroy($product->second_photo_path);
        $images = $product->images;
        foreach ($images as $image) {
            Cloudinary::destroy($image->path);
        }
        $product->images()->delete();
        $product->delete();
        return back();
    }

    public function dt_ajax_products_data()
    {
        $query = Product::query()
            ->select(['id', 'name', 'slug', 'cost', 'small_photo_path', 'is_active', 'original_price', 'discounted_price', 'category_id'])
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
