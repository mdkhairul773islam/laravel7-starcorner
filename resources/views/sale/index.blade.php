@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    @include('sale.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Sale</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    @if(Auth::user()->privilege != 'user')
                    <form action="{{route('admin.sale')}}" method="POST">
                        @csrf

                        <div class="form-row print_hide">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="dateFrom" placeholder="Date Form" class="form-control"
                                           id="startDate">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="dateTo" placeholder="Date To" class="form-control"
                                           id="endDate">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn submit_btn" name="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <hr class="mt-0">
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th width="30">SL</th>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>User Name</th>
                                <th>Mobile</th>
                                <th>Cash Amount</th>
                                <th>Sale Amount</th>
                                <th>Amount (+/-)</th>
                                <th width="100" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php($saleAmount = $cashAmount = $deferantAmount = 0)
                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)

                                    @php($amount = $row->input14)
                                    @if($row->shift == 'second_shift')
                                        @php($firstShiftAmount = $results->where('created', $row->created)->where('shift', 'first_shift')->first())
                                        @php($amount = (!empty($firstShiftAmount) ? $row->input14 - $firstShiftAmount->input14 : $row->input14))
                                    @endif


                                    @php($saleAmount += $amount)
                                    @php($cashAmount += $row->input17)
                                    @php($deferantAmount += ($row->input14 - $row->input17))
                                    @php($userInfo = $row->userInfo)
                                    <tr>
                                        <td>{{(++$key)}}</td>
                                        <td>{{$row->created}}</td>
                                        <td>{{strFilter($row->shift)}}</td>
                                        <td>{{(!empty($userInfo) ? $userInfo->name : 'N/A')}}</td>
                                        <td>{{(!empty($userInfo) ? $userInfo->mobile : 'N/A')}}</td>
                                        <td>{{numFilter($amount)}}</td>
                                        <td>{{numFilter($row->input17)}}</td>
                                        <td>{{numFilter($row->input14 - $row->input17)}}</td>
                                        <td class="operation_btn text-right print_hide">
                                            {{--<a href="{{route('admin.sale.show', $row->id)}}" class="view"
                                               title="View">
                                                <i class="far fa-eye"></i>
                                            </a>--}}
                                            @if(Auth::user()->privilege != 'user')
                                                <a href="{{route('admin.sale.destroy', $row->id)}}"
                                                   onclick="return confirm('Do you want to delete this data?')"
                                                   class="delete" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>

                            <tfooter>
                                <tr>
                                    <th colspan="5" class="text-right">Total</th>
                                    <th>{{numFilter($saleAmount)}} Tk</th>
                                    <th>{{numFilter($cashAmount)}} Tk</th>
                                    <th>{{numFilter($deferantAmount)}} Tk</th>
                                    <th></th>
                                </tr>
                            </tfooter>
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
