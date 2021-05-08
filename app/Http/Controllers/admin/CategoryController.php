<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $image_name = time(). '.' . $image_file->getClientOriginalExtension();
        $image_file->storeAs('public/images/categories', $image_name);

        $params = $request->validated();
        $params['image'] = 'storage/images/categories/'.$image_name;

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

            unlink(public_path($category->image));


            $image_name = time(). '.' . $image_file->getClientOriginalExtension();
            $image_file->storeAs('public/images/categories', $image_name);

            $params['image'] = 'storage/images/categories/'.$image_name;
        }

        $category->update($params);

        return redirect()->route('admin.category.index');
    }


    public function destroy(Category $category)
    {
        unlink(public_path($category->image));
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
