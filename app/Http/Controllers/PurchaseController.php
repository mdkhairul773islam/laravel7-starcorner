<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\PartyTransaction;
use App\Models\Product;
use App\Models\Sapitem;
use App\Models\Saprecord;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
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
        $data['asideMenu']    = 'purchase';
        $data['asideSubmenu'] = 'allPurchase';

        // get all supplier
        $data['supplierList'] = Party::where('party_type', 'supplier')->where('status', 'active')->select(['id', 'name', 'mobile', 'address'])->get();

        $where = [['status', 'purchase']];
        if (!empty($request->_token)) {

            if (!empty($request->party_id)) {
                $where[] = ['party_id', $request->party_id];
            }

            if (!empty($request->cv_no)) {
                $where[] = ['cv_no', $request->cv_no];
            }

            if (!empty($request->dateFrom)) {
                $where[] = ['created', '>=', $request->dateFrom];
            }

            if (!empty($request->dateTo)) {
                $where[] = ['created', '<=', $request->dateTo];
            }
        } else {
            $where[] = ['created', date('Y-m-d')];
        }

        $data['results'] = Saprecord::with('party')->where($where)->get();

        return view('purchase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['asideMenu']    = 'purchase';
        $data['asideSubmenu'] = 'addPurchase';

        // get all supplier
        $data['supplierList'] = Party::where('party_type', 'supplier')->where('status', 'active')->select(['id', 'name', 'mobile', 'address'])->get();

        // get all finish product
        $data['productList'] = Product::select(['id', 'code', 'name', 'model'])->get();

        return view('purchase.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $voucherNo    = 'P' . date('ymd') . rand(1000, 9999);
        $purchaseInfo = Saprecord::where('voucher_no', $voucherNo)->first();
        while ($purchaseInfo) {
            $voucherNo = 'P' . date('ymd') . rand(1000, 9999);
        }

        // store sap record data
        $saprecord = new Saprecord;

        $saprecord->created        = $request->created;
        $saprecord->voucher_no     = $voucherNo;
        $saprecord->cv_no          = $request->cv_no;
        $saprecord->party_id       = $request->party_id;
        $saprecord->total_discount = (!empty($request->total_discount) ? $request->total_discount : 0);
        $saprecord->total_bill     = $request->total_bill;
        $saprecord->total_quantity = (!empty($request->total_quantity) ? $request->total_quantity : 0);
        $saprecord->paid           = !empty($request->paid) ? $request->paid : 0;
        $saprecord->status         = 'purchase';

        $saprecord->save();


        // store sap item and stock
        if (!empty($request->product_id)) {
            foreach ($request->product_id as $key => $item) {

                // store sap item data
                $sapitem = new Sapitem;

                $sapitem->voucher_no     = $voucherNo;
                $sapitem->product_id     = $request->product_id[$key];
                $sapitem->quantity       = $request->quantity[$key];
                $sapitem->purchase_price = $request->purchase_price[$key];
                $sapitem->sale_price     = $request->sale_price[$key];

                $sapitem->save();

                // store stock data
                $stockInfo = Stock::where('product_id', $request->product_id[$key])->select(['id', 'product_id', 'quantity', 'purchase_price'])->first();
                if (!empty($stockInfo)) {

                    $stockData = Stock::find($stockInfo->id);

                    $stockData->product_id     = $request->product_id[$key];
                    $stockData->quantity       = $stockInfo->quantity + $request->quantity[$key];
                    $stockData->purchase_price = $request->purchase_price[$key];
                    $stockData->sale_price     = $request->sale_price[$key];

                    $stockData->save();
                } else {

                    $stockData = new Stock;

                    $stockData->product_id     = $request->product_id[$key];
                    $stockData->quantity       = $request->quantity[$key];
                    $stockData->purchase_price = $request->purchase_price[$key];
                    $stockData->sale_price     = $request->sale_price[$key];

                    $stockData->save();
                }
            }
        }

        // store party transaction
        $tranData = new PartyTransaction;

        $tranData->created            = $request->created;
        $tranData->party_id           = $request->party_id;
        $tranData->credit             = $request->total_bill;
        $tranData->debit              = (!empty($request->paid) ? $request->paid : 0);
        $tranData->relation           = $voucherNo;
        $tranData->transaction_method = $request->transaction_method;
        $tranData->remarks            = $request->remarks;
        $tranData->status             = 'purchase';

        $tranData->save();

        return redirect()->route('admin.purchase.show', $voucherNo)->with(['success' => 'Purchase successfully added.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($vno)
    {
        $data['asideMenu']    = 'purchase';
        $data['asideSubmenu'] = 'allPurchase';

        $data['voucherInfo'] = $voucherInfo = Saprecord::with('party', 'transaction')->where('voucher_no', $vno)->first();

        $data['voucherItems'] = Sapitem::with('product')->where('voucher_no', $vno)->get();

        $tranInfo = partyBalance($voucherInfo->party_id, $voucherInfo->transaction->id);

        $currentBalance = $voucherInfo->paid - $voucherInfo->total_bill + $tranInfo->balance;

        $balanceInfo = [
            'previous_balance' => $tranInfo->balance,
            'previous_sign'    => $tranInfo->status,
            'balance'          => $currentBalance,
            'status'           => ($currentBalance < 0 ? 'Payable' : 'Receivable')
        ];

        $data['balanceInfo'] = (object)$balanceInfo;

        return view('purchase.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['asideMenu']    = 'purchase';
        $data['asideSubmenu'] = 'allPurchase';

        return view('purchase.edit', $data);
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
    public function destroy($vno)
    {

        $purchaseItems = Sapitem::where('voucher_no', $vno)->get();

        if (!empty($purchaseItems)) {
            foreach ($purchaseItems as $key => $item) {

                // get stock info
                $stockData = Stock::where('product_id', $item->product_id)->first();
                if (!empty($stockData)) {

                    // calculate quantity
                    $quantity = $stockData->quantity - $item->quantity;

                    $stockData->quantity = $quantity;

                    $stockData->save();
                }
            }
        }

        Saprecord::where('voucher_no', $vno)->delete();
        Sapitem::where('voucher_no', $vno)->delete();
        PartyTransaction::where('relation', $vno)->delete();

        return redirect()->route('admin.purchase')->with(['delete' => 'Purchase successfully deleted.']);
    }


    /**
     * Item Wise.
     */
    public function itemReport(Request $request)
    {
        $data['asideMenu']    = 'purchase';
        $data['asideSubmenu'] = 'itemReport';

        // get all supplier
        $data['supplierList'] = Party::where('party_type', 'supplier')->where('status', 'active')->select(['id', 'name', 'mobile', 'address'])->get();

        // get all product
        $data['productList'] = Product::select(['id', 'name', 'model'])->get();

        $where = [['saprecords.status', 'purchase']];

        if (!empty($request->_token)) {

            if (!empty($request->party_id)) {
                $where[] = ['saprecords.party_id', $request->party_id];
            }

            if (!empty($request->cv_no)) {
                $where[] = ['saprecords.cv_no', $request->cv_no];
            }

            if (!empty($request->product_id)) {
                $where[] = ['sapitems.product_id', $request->product_id];
            }

            if (!empty($request->dateFrom)) {
                $where[] = ['saprecords.created', '>=', $request->dateFrom];
            }

            if (!empty($request->dateTo)) {
                $where[] = ['saprecords.created', '<=', $request->dateTo];
            }

        } else {
            $where[] = ['saprecords.created', date('Y-m-d')];
        }


        $data['results'] = DB::table('sapitems')->where($where)->whereNull('sapitems.deleted_at')
            ->join('saprecords', 'sapitems.voucher_no', '=', 'saprecords.voucher_no')
            ->join('products', 'sapitems.product_id', '=', 'products.id')
            ->select('sapitems.*', 'saprecords.created', 'saprecords.voucher_no', 'saprecords.cv_no', 'saprecords.party_id', 'saprecords.status', 'products.name', 'products.unit_id')
            ->get();

        return view('purchase.itemReport', $data);
    }


    /**
     * get product info
     */
    public function productInfo(Request $request)
    {
        return Product::with('category', 'subcategory', 'brand', 'unit')->where('id', $request->product_id)->get();
    }

    /**
     * get product info
     */
    public function cvExists(Request $request)
    {
        return Saprecord::where('cv_no', $request->cv_no)->get();
    }
}
