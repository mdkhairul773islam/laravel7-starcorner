<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\PartyTransaction;
use Illuminate\Http\Request;

class PartyTransactionController extends Controller
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
        $data['asideSubmenu'] = 'allTransaction';

        // get all supplier
        $data['allSupplier'] = Party::where('party_type', 'supplier')->select(['id', 'name', 'mobile'])->get();

        // get result
        $where = [];

        if (!empty($request->all())) {

            if (!empty($request->party_id)) {
                $where[] = ['party_id', $request->party_id];
            }

            if (!empty($request->dateFrom)) {
                $where[] = ['created', '>=', $request->dateFrom];
            }

            if (!empty($request->dateTo)) {
                $where[] = ['created', '<=', $request->dateTo];
            }
        }else{
            $where[] = ['created', date('Y-m-d')];
        }

        $data['results'] = PartyTransaction::with('party')->where($where)->get();

        return view('partyTransaction.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['asideMenu']    = 'supplier';
        $data['asideSubmenu'] = 'addTransaction';

        // get all supplier
        $data['allSupplier'] = Party::where('party_type', 'supplier')->select(['id', 'name', 'mobile'])->get();

        return view('partyTransaction.create', $data);
    }


    /**
     * get party balance
     */
    public function partyInfo(Request $request)
    {
        return partyBalance($request->party_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new PartyTransaction;

        $data->created            = $request->created;
        $data->party_id           = $request->party_id;
        $data->debit              = $request->paid;
        $data->commission         = (!empty($request->commission) ? $request->commission : 0);
        $data->transaction_by     = $request->transaction_by;
        $data->transaction_method = $request->transaction_method;
        $data->remarks            = $request->remarks;
        $data->relation           = 'transaction';
        $data->status             = 'transaction';

        $data->save();

        return redirect()->route('admin.transaction.create')->with(['success' => 'Transaction successfully added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['asideMenu']    = 'supplier';
        $data['asideSubmenu'] = 'allTransaction';

        // get transaction info
        $data['info'] = $info = PartyTransaction::with('party')->find($id);

        // previous transaction info
        $tranInfo = partyBalance($info->party_id, $info->id);

        // calculate current balance
        $currentBalance = $tranInfo->balance + $info->debit + $info->commission;

        // balance info
        $balaneInfo = [
            'previous_balance' => $tranInfo->balance,
            'balance'          => $currentBalance,
            'status'           => ($currentBalance < 0 ? 'Payable' : 'Receivable'),
        ];

        $data['balanceInfo'] = (object)$balaneInfo;


        return view('partyTransaction.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'supplier';
        $data['asideSubmenu'] = 'allTransaction';

        // get all supplier
        $data['allSupplier'] = Party::where('party_type', 'supplier')->select(['id', 'name', 'mobile'])->get();

        // get transaction info
        $data['info'] = $info = PartyTransaction::with('party')->find($id);

        // previous transaction info
        $data['balanceInfo'] = partyBalance($info->party_id, $info->id);


        return view('partyTransaction.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = PartyTransaction::find($request->id);

        $data->created            = $request->created;
        $data->party_id           = $request->party_id;
        $data->debit              = $request->paid;
        $data->commission         = (!empty($request->commission) ? $request->commission : 0);
        $data->transaction_by     = $request->transaction_by;
        $data->transaction_method = $request->transaction_method;
        $data->remarks            = $request->remarks;
        $data->relation           = 'transaction';
        $data->status             = 'transaction';

        $data->save();

        return redirect()->route('admin.transaction.show', $request->id)->with(['update' => 'Transaction successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PartyTransaction::find($id)->delete();

        return redirect()->route('admin.transaction')->with(['delete' => 'Transaction successfully deleted.']);
    }
}
