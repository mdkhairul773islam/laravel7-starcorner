<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show all data
     */
    public function index(Request $request)
    {
        $data['asideMenu']    = 'machine';
        $data['asideSubmenu'] = 'machineList';

        $data['results'] = Machine::all();

        return view('machine.index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data['asideMenu']    = 'machine';
        $data['asideSubmenu'] = 'machineCreate';

        return view('machine.create', $data);
    }

    /**
     * Store data.
     */
    public function store(Request $request)
    {
        $machineNo = trim($request->machine_no);

        if (Machine::where('machine_no', $machineNo)->first()) {
            $message = ['warning' => 'This machine already exists.'];
        } else {

            $data = new Machine;

            $data->machine_no   = $machineNo;
            $data->machine_type = $request->machine_type;
            $data->reading      = $request->reading;
            $data->sale_price   = $request->sale_price;
            $data->remarks      = $request->remarks;

            $data->save();

            $message = ['success' => 'Machine successfully added.'];
        }
        return redirect()->route('admin.machine.create')->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['asideMenu']    = 'machine';
        $data['asideSubmenu'] = 'machineList';

        return view('machine.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'machine';
        $data['asideSubmenu'] = 'machineList';

        $data['info'] = Machine::find($id);

        return view('machine.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $machineNo = trim($request->machine_no);

        if (Machine::where('machine_no', $machineNo)->where('id', '!=', $request->id)->first()) {
            $message = ['warning' => 'This machine already exists.'];
        } else {

            $data = Machine::find($request->id);

            $data->machine_no   = $machineNo;
            $data->machine_type = $request->machine_type;
            $data->reading      = $request->reading;
            $data->sale_price   = $request->sale_price;
            $data->remarks      = $request->remarks;

            $data->save();

            $message = ['success' => 'Machine successfully updated.'];
        }
        return redirect()->route('admin.machine')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Machine::find($id)->delete();

        return redirect()->route('admin.machine')->with(['delete' => 'Machine delete successful.']);
    }
}
