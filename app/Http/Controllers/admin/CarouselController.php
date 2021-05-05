<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarouselCreateRequest;
use App\Http\Requests\Admin\CarouselUpdateRequest;
use App\Models\Carousel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    private $storage_path = 'public/images/carousels/';
    public function index()
    {
        return view('admin.pages.carousel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CarouselCreateRequest  $request
     * @return RedirectResponse
     */
    public function store(CarouselCreateRequest $request)
    {
        $image_file = $request->file('image');
        if(!$image_file->isValid()){
            return back();
        }

        $image_name = time(). '.' . $image_file->getClientOriginalExtension();
        $image_file->storeAs('public/images/carousels', $image_name);

        $params = $request->validated();
        $params['image'] = 'storage/images/carousels/'.$image_name;

        Carousel::create($params);
        return redirect()->route('admin.carousel.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.pages.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CarouselUpdateRequest  $request
     * @param  Carousel  $carousel
     * @return RedirectResponse
     */
    public function update(CarouselUpdateRequest $request, Carousel $carousel)
    {

        $params = $request->validated();

        if($request->image){
            $image_file = $request->file('image');
            if(!$image_file->isValid()){
                return back();
            }

            unlink(public_path($carousel->image));

            $image_name = time(). '.' . $image_file->getClientOriginalExtension();
            $image_file->storeAs($this->storage_path , $image_name);

            $params['image'] = 'storage/images/carousels/'.$image_name;
        }

        $carousel->update($params);

        return redirect()->route('admin.carousel.index');
    }


    public function destroy(Carousel $carousel)
    {
        unlink(public_path($carousel->image));
        $carousel->delete();
        return back();
    }

    public function dt_ajax_carousels_data(){
        $query = Carousel::select(['id', 'background_color','link', 'h3_tag', 'h2_tag', 'p_tag', 'image', 'is_active']);
        return Datatables::of($query)
            ->addColumn('action', function($carousels){
                return
                    '<form class="d-inline" action='.route('admin.carousel.destroy',  $carousels->id ).'  method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="btn btn-danger btn-xs"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        ><i class="fa fa-trash"></i></button>
                    </form>
                    <a class="btn btn-info btn-xs" href='.route('admin.carousel.edit', $carousels->id).'><i class="fa fa-edit"></i></a>
                    ';
            })
            ->addColumn('image', function($carousels){
                return '<img class="img-popup" height="50px" width="50px" src='.$carousels->image_path.'>';
            })
            ->addColumn('status', function($carousels){
                if($carousels->is_active == 1){
                    return '<span class="badge badge-pill badge-success">Active</span>';
                }

                return '<span class="badge badge-pill badge-danger">In-active</span>';
            })
            ->addColumn('background_color',function ($carousels){
                return '<span class="badge badge-pill" style="background-color:'.$carousels->background_color.' ">'.$carousels->background_color.'</span>';
            })
            ->rawColumns(['action', 'image', 'status', 'background_color'])
            ->make();
            }

}
