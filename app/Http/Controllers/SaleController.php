<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MachineRecord;
use App\Models\SaleRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['asideMenu']    = 'sale';
        $data['asideSubmenu'] = 'allSale';

        $where = [];
        if (!empty($request->_token)) {

            if (!empty($request->dateFrom)) {
                $where[] = ['created', '>=', $request->dateFrom];
            }

            if (!empty($request->dateTo)) {
                $where[] = ['created', '<=', $request->dateTo];
            }
        } else {
            $where[] = ['created', date('Y-m-d')];
        }

        $data['results'] = SaleRecord::with('userInfo')->where($where)->get();

        return view('sale.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['asideMenu']    = 'sale';
        $data['asideSubmenu'] = 'addSale';

        return view('sale.create', $data);
    }

    /**
     * get check info
     */
    public function checkInfo(Request $request)
    {
        $data = SaleRecord::where('created', $request->created)->where('shift', $request->shift)->get();
        return $data;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = SaleRecord::where('created', $request->created)->where('shift', $request->shift)->first();
        if (empty($data)) {
            $data = new SaleRecord;
        }

        $userId = Auth::user()->id;

        if (empty($request->sale_record_id)) {
            $data->user_id = $userId;
            $data->created = $request->created;
            $data->shift   = $request->shift;
            $data->input1  = (!empty($request->input1) ? $request->input1 : 0);
            $data->input2  = (!empty($request->input2) ? $request->input2 : 0);
            $data->input3  = (!empty($request->input3) ? $request->input3 : 0);
            $data->input4  = (!empty($request->input4) ? $request->input4 : 0);
            $data->input5  = (!empty($request->input5) ? $request->input5 : 0);
            $data->input6  = (!empty($request->input6) ? $request->input6 : 0);
            $data->input7  = (!empty($request->input7) ? $request->input7 : 0);
            $data->input8  = (!empty($request->input8) ? $request->input8 : 0);
            $data->input9  = (!empty($request->input9) ? $request->input9 : 0);
            $data->input10 = (!empty($request->input10) ? $request->input10 : 0);
            $data->input11 = (!empty($request->input11) ? $request->input11 : 0);
            $data->input12 = (!empty($request->input12) ? $request->input12 : 0);
            $data->input13 = (!empty($request->input13) ? $request->input13 : 0);
            $data->input14 = (!empty($request->input14) ? $request->input14 : 0);
            $data->input15 = (!empty($request->input15) ? $request->input15 : 0);
            $data->input16 = (!empty($request->input16) ? $request->input16 : 0);
            $data->save();
        }

        if (!empty($request->sale_record_id)) {

            // update sale record
            $data->created = $request->created;
            $data->user_id = $userId;
            $data->shift   = $request->shift;
            $data->input16 = (!empty($request->input16) ? $request->input16 : 0);
            $data->input17 = (!empty($request->input17) ? $request->input17 : 0);
            $data->input18 = (!empty($request->input18) ? $request->input18 : 0);
            $data->input19 = (!empty($request->input19) ? $request->input19 : 0);
            $data->save();

            // update machine record
            foreach ($request->machine_id as $key => $item) {

                $where = [
                    ['created', $request->created],
                    ['shift', $request->shift],
                    ['sale_record_id', $request->sale_record_id],
                    ['machine_id', $request->machine_id[$key]]
                ];

                $mData = MachineRecord::where($where)->first();

                if (empty($mData)) {
                    $mData = new MachineRecord;
                }

                $mData->user_id          = $userId;
                $mData->created          = $request->created;
                $mData->shift            = $request->shift;
                $mData->sale_record_id   = $request->sale_record_id;
                $mData->machine_id       = $request->machine_id[$key];
                $mData->previous_reading = $request->previous_reading[$key];
                $mData->current_reading  = $request->current_reading[$key];
                $mData->sale_price       = $request->sale_price[$key];
                $mData->liter            = $request->liter[$key];

                $mData->save();
            }
        }

        return redirect()->route('admin.sale.create')->with(['success' => 'Sale successfully added.']);
    }


    /**
     * get sales info
     */
    public function saleInfo(Request $request)
    {
        $data = SaleRecord::where('created', $request->created)->where('shift', $request->shift)->get();
        return $data;
    }

    /**
     * get retail info
     */
    public function retailBalance(Request $request)
    {
        $data = SaleRecord::select('created', 'shift', 'input16')->where('created', date('Y-m-d', strtotime('-1 day', strtotime($request->created))))->where('shift', $request->shift)->get();
        return $data;
    }

    /**
     * get cash balance
     */
    public function cashBalance(Request $request)
    {
        $data = SaleRecord::select('created', 'shift', 'input10')->where('created', $request->created)->where('shift', $request->shift)->get();
        return $data;
    }

    /**
     * get machine info
     */
    public function machineInfo(Request $request)
    {
        $status     = 1;
        $recordInfo = null;

        if ($request->shift == 'first_shift') {
            $yesterday = date('Y-m-d', strtotime("-1 days", strtotime($request->created)));

            $recordInfo = MachineRecord::with('machine')->where('created', $request->created)->where('shift', 'first_shift')->get();


            if ($recordInfo->isEmpty()) {
                $status     = 0;
                $recordInfo = MachineRecord::with('machine')->where('created', $yesterday)->where('shift', 'second_shift')->get();
            }
        }

        if ($request->shift == 'second_shift') {

            $recordInfo = MachineRecord::with('machine')->where('created', $request->created)->where('shift', 'second_shift')->get();

            if ($recordInfo->isEmpty()) {
                $status     = 0;
                $recordInfo = MachineRecord::with('machine')->where('created', $request->created)->where('shift', 'first_shift')->get();
            }
        }

        $result = [];
        if (!empty($recordInfo) && $recordInfo->isNotEmpty()) {

            foreach ($recordInfo as $item) {
                $dataItem                     = [];
                $dataItem['machine_no']       = (!empty($item->machine) ? $item->machine->machine_no : '');
                $dataItem['machine_id']       = $item->machine_id;
                $dataItem['machine_type']     = (!empty($item->machine) ? $item->machine->machine_type : '');
                $dataItem['sale_price']       = (!empty($item->machine) ? $item->machine->sale_price : '');
                $dataItem['previous_reading'] = ($status ? $item->previous_reading : $item->current_reading);
                $dataItem['current_reading']  = ($status ? $item->current_reading : '');
                $dataItem['litter']           = '';

                array_push($result, $dataItem);
            }
        } else {

            $machineInfo = Machine::all();
            if (!empty($machineInfo)) {
                foreach ($machineInfo as $item) {
                    $dataItem = [];

                    $dataItem['machine_no']       = $item->machine_no;
                    $dataItem['machine_id']       = $item->id;
                    $dataItem['machine_type']     = $item->machine_type;
                    $dataItem['sale_price']       = $item->sale_price;
                    $dataItem['previous_reading'] = $item->reading;
                    $dataItem['current_reading']  = '';
                    $dataItem['litter']           = '';

                    array_push($result, $dataItem);
                }
            }
        }

        return $result;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['asideMenu']    = 'sale';
        $data['asideSubmenu'] = 'allSale';

        return view('sale.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'sale';
        $data['asideSubmenu'] = 'allSale';

        return view('sale.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SaleRecord::where('id', $id)->delete();
        MachineRecord::where('sale_record_id', $id)->delete();
        return redirect()->route('admin.sale')->with(['delete' => 'Sale successfully deleted.']);
    }

    /**
     * Sale Report.
     */
    public function report(Request $request)
    {
        $data['asideMenu']    = 'sale';
        $data['asideSubmenu'] = 'report';

        $where = [];

        $yesterday = date('Y-m-d', strtotime("-1 days"));
        if (!empty($request->created)) {
            $where[]   = ['created', '=', $request->created];
            $yesterday = date('Y-m-d', strtotime("-1 days", strtotime($request->created)));
        } else {
            $where[] = ['created', '=', date('Y-m-d')];
        }

        // get retail balance
        $data['retailBalance'] = SaleRecord::select('created', 'shift', 'input16')->where('shift', 'second_shift')->where('created', $yesterday)->first();

        // get sales record
        $saleRecords             = SaleRecord::where($where)->get();
        $data['saleFirstShift']  = $saleRecords->where('shift', 'first_shift')->first();
        $data['saleSecondShift'] = $saleRecords->where('shift', 'second_shift')->first();

        // get machine records
        $machineList = Machine::orderBy('machine_type')->get();
        $patrolId    = $dieselId = [];
        foreach ($machineList as $item) {
            if ($item->machine_type == 'Patrol') {
                array_push($patrolId, $item->id);
            }

            if ($item->machine_type == 'Diesel') {
                array_push($dieselId, $item->id);
            }
        }


        $machineRecords   = MachineRecord::with('machine')->where($where)->orderBy('machine_id')->get();
        $firstShiftPatrol = $machineRecords->where('shift', 'first_shift')->whereIn('machine_id', $patrolId);
        $firstShiftDiesel = $machineRecords->where('shift', 'first_shift')->whereIn('machine_id', $dieselId);
        $secondShiftData  = $machineRecords->where('shift', 'second_shift');

        $data['totalPatrol'] = $machineRecords->whereIn('machine_id', $patrolId)->sum('liter');
        $data['totalDiesel'] = $machineRecords->whereIn('machine_id', $dieselId)->sum('liter');

        $patrolList = $dieselList = [];
        if (!empty($firstShiftPatrol)) {
            foreach ($firstShiftPatrol as $key => $row) {

                $item = [
                    'machine_no'              => '',
                    'first_previous_reading'  => '',
                    'first_current_reading'   => '',
                    'first_liter'             => '',
                    'first_amount'            => '',
                    'second_previous_reading' => '',
                    'second_current_reading'  => '',
                    'second_liter'            => '',
                    'second_amount'           => '',
                ];

                $item['machine_no']             = $row->machine->machine_no;
                $item['first_previous_reading'] = $row->previous_reading;
                $item['first_current_reading']  = $row->current_reading;
                $item['first_liter']            = $row->liter;
                $item['first_amount']           = $row->liter * $row->sale_price;

                if (!empty($secondShiftData) && $secondShiftData->isNotEmpty()) {

                    $info = $secondShiftData->where('machine_id', $row->machine_id)->first();

                    if (!empty($info)) {
                        $item['second_previous_reading'] = $info->previous_reading;
                        $item['second_current_reading']  = $info->current_reading;
                        $item['second_liter']            = $info->liter;
                        $item['second_amount']           = $info->liter * $info->sale_price;
                    }
                }

                array_push($patrolList, (object)$item);
            }
        }

        if (!empty($firstShiftDiesel)) {
            foreach ($firstShiftDiesel as $key => $row) {

                $item = [
                    'machine_no'              => '',
                    'first_previous_reading'  => '',
                    'first_current_reading'   => '',
                    'first_liter'             => '',
                    'first_amount'            => '',
                    'second_previous_reading' => '',
                    'second_current_reading'  => '',
                    'second_liter'            => '',
                    'second_amount'           => '',
                ];

                $item['machine_no']             = $row->machine->machine_no;
                $item['first_previous_reading'] = $row->previous_reading;
                $item['first_current_reading']  = $row->current_reading;
                $item['first_liter']            = $row->liter;
                $item['first_amount']           = $row->liter * $row->sale_price;

                if (!empty($secondShiftData) && $secondShiftData->isNotEmpty()) {

                    $info = $secondShiftData->where('machine_id', $row->machine_id)->first();

                    if (!empty($info)) {
                        $item['second_previous_reading'] = $info->previous_reading;
                        $item['second_current_reading']  = $info->current_reading;
                        $item['second_liter']            = $info->liter;
                        $item['second_amount']           = $info->liter * $info->sale_price;
                    }
                }

                array_push($dieselList, (object)$item);
            }
        }

        $data['patrolMachine'] = $patrolList;
        $data['dieselMachine'] = $dieselList;

        return view('sale.report', $data);
    }
}
