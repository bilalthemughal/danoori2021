<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }


    public function store(CategoryCreateRequest $request)
    {
        $image_file = $request->file('image');
        if(!$image_file->isValid()){
            return back();
        }

        $params = $request->validated();

        $params['image'] = $request->file('image')->store('Categories', 's3');

        Category::create($params);
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category)
    {
        return view('admin.pages.category.edit', compact('category'));
    }


    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $params = $request->validated();

        if($request->image){
            $image_file = $request->file('image');
            if(!$image_file->isValid()){
                return back();
            }

            Storage::disk('s3')->delete($category->image);

            $params['image'] = $request->file('image')->store('Categories', 's3');

        }

        $category->update($params);

        return redirect()->route('admin.category.index');
    }


    public function destroy(Category $category)
    {
        Storage::disk('s3')->delete($category->image);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
