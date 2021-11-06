@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

        @include('purchase.nav')

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Purchase Invoice</h4>
                    <a id="print"><i class="icon ion-md-print"></i> Print</a>
                </div>

                <!-- print header start -->
                @include('components.print')
                <!-- print header end  -->

                <div class="panel_body">
                    <div class="print_invoice_title print_only">
                        <h4>Purchase Invoice</h4>
                    </div>
                    
                    <ul class="header_info_list">
                        <li><strong>Name</strong> : {{$voucherInfo->party->name}}</li>
                        <li><strong>Voucher No</strong> : {{$voucherInfo->cv_no}}</li>
                        <li><strong>Date</strong> : {{$voucherInfo->created}}</li>
                        <li><strong>Mobile</strong> : {{$voucherInfo->party->mobile}}</li>
                        <li><strong>Address</strong> : {{$voucherInfo->party->address}}</li>
                    </ul>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30">SL</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th width="150">Price</th>
                                <th class="text-right" width="120">Amount</th>
                            </tr>
                            @php($totalAmount = 0)
                            @if(!empty($voucherItems))
                                @foreach($voucherItems as $key => $row)
                                    @php($subtotal = $row->purchase_price * $row->quantity)
                                    @php($totalAmount += $subtotal)
                                    <tr>
                                        <td>{{(++$key)}}</td>
                                        <td>{{$row->product->name}}</td>
                                        <td>{{$row->quantity}}</td>
                                        <td>{{$row->purchase_price}}</td>
                                        <td class="text-right">{{$subtotal}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                <th colspan="3" rowspan="10"></th>
                                <th>Subtotal</th>
                                <th class="text-right">{{$totalAmount}}</th>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <th class="text-right">{{$voucherInfo->total_discount}}</th>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <th class="text-right">{{$voucherInfo->total_bill}}</th>
                            </tr>
                            <tr>
                                <th>Previous Balance</th>
                                <th class="text-right">{{$balanceInfo->previous_balance}}</th>
                            </tr>
                            <tr>
                                <th>Paid</th>
                                <th class="text-right">{{$voucherInfo->paid}}</th>
                            </tr>
                            <tr>
                                <th>Current Balance</th>
                                <th class="text-right">{{$balanceInfo->balance}}</th>
                            </tr>
                        </table>
                    </div>

                    <div class="signature_box print_flex_only">
                        <h5>Customer Signature</h5>
                        <h5>Authority Signature</h5>
                    </div>
                </div>
                <div class="panel_footer"></div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection

@push('header-style')
    <style>
        .header_info_list {
            flex-wrap: wrap;
            display: flex;
        }
        .header_info_list li {
            margin-bottom: 10px;
            min-width: 300px;
            width: 33.3333%;
            color: #000;
            font-size: 15px;
        }
        .header_info_list li strong {
            display: inline-block;
            min-width: 85px;
        }
        .signature_box {
            justify-content: space-between;
            display: flex;
            margin-top: 75px;
        }
        .signature_box h5 {
            border-top: 2px dashed #515151;
            display: inline-block;
            color: #000;
            min-width: 120px;
            font-size: 16px;
            padding-top: 5px;
            font-weight: 600;
            text-align: center;
        }
    </style>
@endpush