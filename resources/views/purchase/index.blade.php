@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    @include('purchase.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Purchase</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.purchase')}}" method="POST">
                        @csrf
                        <div class="form-row print_hide">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="party_id" class="form-control selectpicker" data-live-search="true">
                                        <option value="" selected>Select Supplier</option>
                                        @if(!empty($supplierList) && $supplierList->isNotEmpty())
                                            @foreach($supplierList as $item)
                                                <option value="{{$item->id}}">{{($item->name .' - '. $item->mobile)}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                                <button type="submit" class="btn submit_btn" name="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    <hr class="mt-0">

                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Voucher No</th>
                                    <th>Supplier Name</th>
                                    <th>Mobile</th>
                                    <th>Total Amount</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th width="120" class="text-right print_hide">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @php($totalBill = $totalPaid = $totalDue = 0)
                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)

                                    @php($due = ($row->total_bill - $row->paid))
                                    @php($totalBill += $row->total_bill)
                                    @php($totalPaid += $row->paid)
                                    @php($totalDue += $due)
                                    <tr>
                                        <td>{{(++$key)}}</td>
                                        <td>{{$row->created}}</td>
                                        <td>{{$row->cv_no}}</td>
                                        <td>{{$row->party->name}}</td>
                                        <td>{{$row->party->mobile}}</td>
                                        <td>{{numFilter($row->total_bill)}}</td>
                                        <td>{{numFilter($row->paid)}}</td>
                                        <td>{{numFilter($due)}}</td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="{{route('admin.purchase.show', $row->voucher_no)}}" class="view" title="View">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.purchase.destroy', $row->voucher_no)}}" onclick="return confirm('Do you want to delete this data?')" class="delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
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
