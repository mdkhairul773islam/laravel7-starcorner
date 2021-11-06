@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('purchase.nav')

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Item Report</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.purchase.item-report')}}" method="POST">
                        @csrf
                        <div class="form-row print_hide">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="party_id" class="form-control selectpicker" data-live-search="true">
                                        <option value="" selected>Select Supplier</option>
                                        @if(!empty($supplierList) && $supplierList->isNotEmpty())
                                            @foreach($supplierList as $item)
                                                <option
                                                    value="{{$item->id}}">{{($item->name .' - '. $item->mobile)}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="product_id" class="form-control selectpicker" data-live-search="true">
                                        <option value="" selected>Select Product</option>
                                        @if(!empty($productList) && $productList->isNotEmpty())
                                            @foreach($productList as $item)
                                                <option
                                                    value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="cv_no" placeholder="Voucher No." class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="dateFrom" placeholder="Date Form" class="form-control" id="startDate">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="dateTo" placeholder="Date To" class="form-control" id="endDate">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn submit_btn" name="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr class="mt-0">

                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th width="30">SL</th>
                                <th>Date</th>
                                <th>Voucher No</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Amount</th>
                                <th width="30" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>

                            @php($totalAmount = $totalQuantity = 0)
                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)
                                        @php($subtotal = $row->purchase_price * $row->quantity)
                                        @php($totalAmount += $subtotal)
                                        @php($totalQuantity += $row->quantity)
                                    <tr>
                                        <td>{{(++$key)}}</td>
                                        <td>{{$row->created}}</td>
                                        <td>{{$row->cv_no}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->quantity}}</td>
                                        <td>{{$row->purchase_price}}</td>
                                        <td>{{$subtotal}}</td>
                                        <td class="operation_btn text-center print_hide">
                                            <a href="{{route('admin.purchase.show', $row->voucher_no)}}" class="view"
                                               title="View">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                <th colspan="4" class="text-right">Total</th>
                                <th>{{$totalQuantity}}</th>
                                <th></th>
                                <th>{{$totalAmount}}</th>
                                <th class="print_hide"></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="panel_footer"></div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection
