@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('supplier.nav').

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Transaction Invoice</h4>
                    <a href="#" id="print"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <div class="row">
                        <div class="col-6">
                            <p><strong>Supplier Name:</strong> {{$info->party->name}}</p>
                            <p><strong>Mobile:</strong> {{$info->party->mobile}}</p>
                        </div>

                        <div class="col-6">
                            <p><strong>Address:</strong> {{$info->party->address}}</p>
                            <p><strong>Date:</strong> {{$info->created}}</p>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th>Previous Balance</th>
                            <th>Paid</th>
                            <th>Commission</th>
                            <th>Balance</th>
                            <th>Transaction Method</th>
                        </tr>

                        <tr>
                            <td>{{$balanceInfo->previous_balance}}</td>
                            <td>{{$info->debit}}</td>
                            <td>{{$info->commission}}</td>
                            <td>{{$balanceInfo->balance}}</td>
                            <td>{{strFilter($info->transaction_method)}}</td>
                        </tr>

                        <tr>
                            <th colspan="2">Transaction By: {{$info->transaction_by}}</th>
                            <th colspan="3">Remarks: {{$info->remarks}}</th>
                        </tr>
                    </table>
                </div>
                <div class="panel_footer"></div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection
