<?php

namespace App\Http\Controllers\admin;

use App\Models\AD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ADController extends Controller
{
    public function create(){
        return view('admin.pages.ad.create');
    }

    public function store(Request $request){
        AD::create($request->all());
        return redirect()->route('admin.dashboard');
    }
}
