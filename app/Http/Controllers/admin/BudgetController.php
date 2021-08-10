<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\AdBudget;

class BudgetController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.pages.adbudget.index', compact('product'));
    }

    public function tableData($id)
    {
        $query = AdBudget::where('product_id', $id);

        return Datatables::of($query)
            ->editColumn('created_at', function ($request) {
                return $request->created_at->format('d-M-Y'); // human readable format
            })
            ->addColumn('cost', function($request){
                return $request->budget / $request->sold;
            })
            ->make();
    }

    public function create(Product $product)
    {
        return view('admin.pages.adbudget.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {

        $product->budgets()->create([
            'budget' => $request['budget'],
            'sold' => $request['sold']
        ]);
        return redirect()->route('admin.product.index');
    }
}
