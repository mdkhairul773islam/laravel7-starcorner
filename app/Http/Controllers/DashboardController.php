<?php

namespace App\Http\Controllers;

use App\Models\MachineRecord;
use App\Models\SaleRecord;
use App\Models\Saprecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['asideMenu']    = 'dashboard';
        $data['asideSubmenu'] = '';

        $today = date('Y-m-d');

        $todayPurchase         = Saprecord::where('created', $today)->sum('total_bill');
        $data['todayPurchase'] = (!empty($todayPurchase) ? $todayPurchase : 0);

        $data['todaySale'] = $this->todaySale();

        // stock amount
        $data['stock'] = $this->stockAmount();

        return view('dashboard', $data);
    }

    // get today sale
    public function todaySale()
    {
        $salesInfo = DB::table('machine_records')
            ->join('machines', 'machine_records.machine_id', '=', 'machines.id')
            ->select('machine_records.created', 'machine_records.sale_price', 'machine_records.liter', 'machines.machine_type')
            ->where('machine_records.created', date('Y-m-d'))
            ->whereNull('machine_records.deleted_at')
            ->get();

        $patrolTotal = $dieselTotal = 0;
        if (!empty($salesInfo)) {
            foreach ($salesInfo as $key => $item) {
                if ($item->machine_type == 'Patrol') {
                    $patrolTotal += $item->sale_price * $item->liter;
                }

                if ($item->machine_type == 'Diesel') {
                    $dieselTotal += $item->sale_price * $item->liter;
                }
            }
        }

        $result = [
            'patrol' => $patrolTotal,
            'diesel' => $dieselTotal
        ];

        return (object)$result;
    }

    // get stock amount
    public function stockAmount()
    {
        // all stock data
        $stockList = DB::table('stocks')->whereNull('stocks.deleted_at')
            ->join('products', 'stocks.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('units', 'products.unit_id', '=', 'units.id')
            ->select('stocks.*', 'products.name', 'categories.name AS category_name', 'units.unit')
            ->get();

        // machine records
        $machineList = DB::table('machine_records')->whereNull('machine_records.deleted_at')
            ->join('machines', 'machine_records.machine_id', '=', 'machines.id')
            ->select('machine_records.sale_price', 'machine_records.liter', 'machines.machine_type')
            ->get();

        $stockAmount = $patrol = $diesel = 0;
        if (!empty($stockList)) {
            foreach ($stockList as $key => $item) {

                $quantity    = 0;
                $saleQty     = (!empty($machineList) ? ($machineList->where('machine_type', $item->category_name)->sum('liter')) : 0);
                $quantity    = $item->quantity - $saleQty;
                $amount      = $item->purchase_price * $quantity;
                $stockAmount += $amount;


                if ($item->category_name == 'Patrol') {
                    $patrol = $quantity;
                }

                if ($item->category_name == 'Diesel') {
                    $diesel = $quantity;
                }
            }
        }

        $stock = [
            'amount' => $stockAmount,
            'patrol' => $patrol,
            'diesel' => $diesel,
        ];

        return (object)$stock;
    }

    // get machine record
    public function machineRecord(Request $request)
    {
        $created = $shift = '';
        if ($request->shift == 'first_shift') {
            $created = date("Y-m-d", strtotime('-1 day', strtotime(date('Y-m-d'))));
            $shift   = 'second_shift';
        }else{
            $created = date('Y-m-d');
            $shift   = 'first_shift';
        }


        $tableData = '';

        // get machine record
        $machineRecord = DB::table('machine_records')
                            ->leftJoin('machines', 'machine_records.machine_id', '=', 'machines.id')
                            ->select('machine_records.current_reading', 'machines.machine_no', 'machines.machine_type')
                            ->where('machine_records.created', $created)
                            ->where('machine_records.shift', $shift)
                            ->orderByDesc('machines.machine_type')
                            ->get();

        if (!empty($machineRecord)){
            foreach ($machineRecord as $item){
                $tableData .='<tr> <th>'. $item->machine_no .'</th> <th>'. $item->machine_type .'</th> <th>'. $item->current_reading .'</th> </tr>';
            }
        }

        // get sales record
        $salesRecord = SaleRecord::where('created', $created)->where('shift', $shift)->first();

        if (!empty($salesRecord)){
            $tableData .='<tr><th colspan="3" class="text-center">Retail Balance: '. $salesRecord->input16 .'</th></tr>';
        }

        echo $tableData;
    }
}
