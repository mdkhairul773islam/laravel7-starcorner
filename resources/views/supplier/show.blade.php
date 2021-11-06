@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

        @include('supplier.nav').

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Supplier Details</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Supplier Name</th>
                            <td>{{$info->name}}</td>
                        </tr>
                        <tr>
                            <th>Contact Person</th>
                            <td>{{$info->contact_person}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$info->mobile}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$info->address}}</td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td>{{$info->remarks}}</td>
                        </tr>
                        <tr>
                            <th>Initial Balance</th>
                            <td>{{$info->initial_balance}}</td>
                        </tr>
                        <tr>
                            <th>Current Balance</th>
                            <td>{{(partyBalance($info->id)->balance)}}</td>
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
