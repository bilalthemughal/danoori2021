<?php

namespace App\Http\Controllers\admin;

use App\Models\AD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ADController extends Controller
{
    public function index(){
        return view('admin.pages.ad.index');
    }
    public function create(){
        return view('admin.pages.ad.create');
    }

    public function store(Request $request){
        AD::create($request->all());
        return redirect()->route('admin.ad.index');
    }

    public function edit($id){
        $ad_budget = AD::where('id', $id)->first();
        return view('admin.pages.ad.edit', compact('ad_budget'));
    }

    public function update(Request $request, $id){
        $ad_budget = AD::where('id', $id)->first();
        $ad_budget->update($request->all());
        return redirect()->route('admin.ad.index');
    }

    public function dt_ajax_ad_budget_data(){
        $query = AD::query()
            ->select(['id','cost','created_at']);

        return Datatables::of($query)
        ->addColumn('created_at', function($ads){
            return $ads->created_at->format('d-m-Y');
        })
        ->addColumn('action', function ($ads) {
                return
                    '<a class="btn btn-info btn-xs" href=' . route('admin.ad.edit', $ads->id) . '><i class="fa fa-edit"></i></a>';
            })
        ->make();
    }
}
