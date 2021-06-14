<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
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

        $params['image'] = Cloudinary::upload($request->file('image')->getRealPath(),[
            'folder' => 'Categories'
        ])->getPublicId();

        Category::create($params);
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

            Cloudinary::destroy($category->image);

            $params['image'] = Cloudinary::upload($request->file('image')->getRealPath(),[
                'folder' => 'Categories'
            ])->getPublicId();
        }

        $category->update($params);

        return redirect()->route('admin.category.index');
    }


    public function destroy(Category $category)
    {
        Cloudinary::destroy($category->image);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
