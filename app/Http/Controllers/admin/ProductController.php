<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use Cloudinary\Transformation\Delivery;
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

        $params['image'] = Cloudinary::upload($request->file('image')->getRealPath(), [
            'folder' => 'Products'
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

            Cloudinary::destroy($product->image);

            $params['image'] = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'Products'
            ])->getPublicId();
        }

        $product->update($params);
        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product)
    {
        Cloudinary::destroy($product->image);
        $product->delete();
        return back();
    }

    public function dt_ajax_products_data()
    {
        $query = Product::query()
            ->select(['id', 'name', 'slug', 'stock', 'image', 'is_active', 'price', 'discounted_price', 'category_id'])
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
                    ';
            })
            ->addColumn('status', function ($products) {
                if ($products->is_active == 1) {
                    return '<span class="badge badge-pill badge-success">Active</span>';
                }

                return '<span class="badge badge-pill badge-danger">In-active</span>';
            })
            ->addColumn('image', function ($products) {
                return '<img class="img-popup" height="50px" width="50px" src=' . $products->getImage() . '>';
            })
            ->rawColumns(['action', 'status', 'image'])
            ->make();
    }
}
