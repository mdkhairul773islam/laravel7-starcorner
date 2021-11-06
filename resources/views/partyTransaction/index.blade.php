@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    @include('supplier.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Transaction</h4>
                    <a href="#" id="print" class="print_btn">
                        <i class="icon ion-md-print"></i> Print
                    </a>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.transaction')}}" method="POST">
                        @csrf

                        <div class="form-row print_hide">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="party_id" class="form-control selectpicker" data-live-search="true">
                                        <option value="" selected>Select Supplier</option>
                                        @if(!empty($allSupplier) && $allSupplier->isNotEmpty())
                                            @foreach($allSupplier as $item)
                                                <option value="{{$item->id}}">{{($item->name .' '. $item->mobile)}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="dateFrom" class="form-control" placeholder="Start Date" id="startDate">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="dateFrom" class="form-control" placeholder="End Date" id="endDate">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn submit_btn" name="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    <div class="hr">
                        <hr/>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th width="30">SL</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Paid</th>
                                <th>Commission</th>
                                <th>Transaction By</th>
                                <th width="125" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            @php($totalPaid = $totalCommission = 0)
                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)

                                    @php($totalPaid += $row->debit)
                                    @php($totalCommission += $row->commission)

                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->created}}</td>
                                        <td>{{$row->party->name}}</td>
                                        <td>{{$row->party->mobile}}</td>
                                        <td>{{$row->party->address}}</td>
                                        <td>{{$row->debit}}</td>
                                        <td>{{$row->commission}}</td>
                                        <td>{{$row->transaction_by}}</td>

                                        <td class="operation_btn  print_hide text-right print_hide">
                                            <a href="{{route('admin.transaction.show', $row->id)}}" class="view"
                                               title="View">
                                                <i class="far fa-eye"></i>
                                            </a>

                                            <a href="{{route('admin.transaction.edit', $row->id)}}" class="edit"
                                               title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <a href="{{route('admin.transaction.destroy', $row->id)}}"
                                               onclick="return confirm('Do you want to delete this data?')"
                                               class="delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="9" class="text-center">No record found....!</th>
                                </tr>
                            @endif

                            <tr>
                                <th colspan="5" class="text-right">Total</th>
                                <th>{{$totalPaid}}</th>
                                <th>{{$totalCommission}}</th>
                                <th></th>
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
