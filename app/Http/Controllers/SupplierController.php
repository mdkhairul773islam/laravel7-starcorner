<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        $data['asideMenu']    = 'supplier';
        $data['asideSubmenu'] = 'allSupplier';

        // get all supplier
        $data['allSupplier'] = Party::where('party_type', 'supplier')->select(['id', 'name', 'mobile'])->get();

        // get result
        $where = [['party_type', 'supplier']];

        if (!empty($request->all())){

            if (!empty($request->id)){
                $where[] = ['id', $request->id];
            }
        }

        $data['results'] = Party::where($where)->get();


        return view('supplier.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['asideMenu']    = 'supplier';
        $data['asideSubmenu'] = 'addSupplier';

        return view('supplier.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Party;

        $data->created         = date('Y-m-d');
        $data->name            = $request->name;
        $data->contact_person  = $request->contact_person;
        $data->mobile          = $request->mobile;
        $data->party_type      = 'supplier';
        $data->address         = $request->address;
        $data->remarks         = $request->remarks;
        $data->initial_balance = ($request->balance_status == 'payable' ? '-' : '') . $request->initial_balance;

        $data->save();

        return redirect()->route('admin.supplier.create')->with(['success' => 'Supplier successfully added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['asideMenu']    = 'supplier';
        $data['asideSubmenu'] = 'allSupplier';

        $data['info'] = Party::find($id);

        return view('supplier.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'supplier';
        $data['asideSubmenu'] = 'allSupplier';

        $data['info'] = Party::find($id);

        return view('supplier.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Party::find($request->id);

        $data->name            = $request->name;
        $data->contact_person  = $request->contact_person;
        $data->mobile          = $request->mobile;
        $data->party_type      = 'supplier';
        $data->address         = $request->address;
        $data->remarks         = $request->remarks;
        $data->initial_balance = ($request->balance_status == 'payable' ? '-' : '') . $request->initial_balance;

        $data->save();

        return redirect()->route('admin.supplier')->with(['success' => 'Supplier successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Party::find($id)->delete();

        return redirect()->route('admin.supplier')->with(['delete' => 'Supplier successfully deleted.']);
    }
}
