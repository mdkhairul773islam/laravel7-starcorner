<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['asideMenu'] = 'stock';
        $data['asideSubmenu'] = '';

        // get all product
        $data['productList'] = Product::select(['id', 'name', 'model'])->get();

        $where = [];

        if (!empty($request->_token)) {

            if (!empty($request->product_id)) {
                $where[] = ['stocks.product_id', $request->product_id];
            }
        }

        // all stock data
        $data['results'] = DB::table('stocks')->where($where)->whereNull('stocks.deleted_at')
            ->join('products', 'stocks.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('units', 'products.unit_id', '=', 'units.id')
            ->select('stocks.*', 'products.name', 'categories.name AS category_name', 'units.unit')
            ->get();

        // machine records
        $data['machineRecords'] = DB::table('machine_records')->whereNull('machine_records.deleted_at')
            ->join('machines', 'machine_records.machine_id', '=', 'machines.id')
            ->select('machine_records.sale_price', 'machine_records.liter', 'machines.machine_type')
            ->get();


        return view('stock.index',$data);
    }
}
