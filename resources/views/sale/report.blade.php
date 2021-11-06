@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('sale.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Sales Report</h4>
                    <a href="#" id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    @if(Auth::user()->privilege != 'user')
                        <form action="{{route('admin.sale.report')}}" method="POST">
                            @csrf
                            <div class="form-row print_hide">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="created" placeholder="Date" class="form-control"
                                               id="startDate">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn submit_btn" name="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <hr class="mt-0">
                    @endif

                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-5">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th width="16.66%">
                                                    <small>Cash
                                                        = {{ (!empty($saleFirstShift) ? $saleFirstShift->input1 : '') }}</small>
                                                </th>
                                                <th width="16.66%">
                                                    <small>B:K: {{ (!empty($saleFirstShift) ? $saleFirstShift->input2 : '') }}</small>
                                                </th>
                                                <th width="16.66%">
                                                    <small>M: {{ (!empty($saleFirstShift) ? $saleFirstShift->input3 : '') }}</small>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <small>: {{ (!empty($saleFirstShift) ? $saleFirstShift->input4 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>H: {{ (!empty($saleFirstShift) ? $saleFirstShift->input5 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>A:G: {{ (!empty($saleFirstShift) ? $saleFirstShift->input6 : '') }}</small>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <small>: {{ (!empty($saleFirstShift) ? $saleFirstShift->input7 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>P:T: {{ (!empty($saleFirstShift) ? $saleFirstShift->input8 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>The
                                                        Rest {{ (!empty($saleFirstShift) ? $saleFirstShift->input9 : '') }}</small>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <small>TO: {{ (!empty($saleFirstShift) ? $saleFirstShift->input10 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>A:R: {{ (!empty($saleFirstShift) ? $saleFirstShift->input11 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>Haram: {{ (!empty($saleFirstShift) ? $saleFirstShift->input13 : '') }}</small>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <small>TO: {{ (!empty($saleFirstShift) ? $saleFirstShift->input14 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>TO: {{ (!empty($saleFirstShift) ? $saleFirstShift->input15 : '') }}</small>
                                                </th>

                                                <th>
                                                    <small>TO: {{ (!empty($saleFirstShift) ? $saleFirstShift->input12 : '') }}</small>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-7">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tr>
                                                <th width="16.66%">
                                                    <small>Cash
                                                        = {{ (!empty($saleSecondShift) ? $saleSecondShift->input1 : '') }}</small>
                                                </th>
                                                <th width="16.66%">
                                                    <small>B:K: {{ (!empty($saleSecondShift) ? $saleSecondShift->input2 : '') }}</small>
                                                </th>
                                                <th width="16.66%">
                                                    <small>M: {{ (!empty($saleSecondShift) ? $saleSecondShift->input3 : '') }}</small>
                                                </th>
                                                <th width="16.66%">
                                                    <small>Total: {{ (!empty($saleSecondShift) ? $saleSecondShift->input14 : (!empty($saleFirstShift) ? $saleFirstShift->input14 : 0)) }}</small>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <small>: {{ (!empty($saleSecondShift) ? $saleSecondShift->input4 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>H: {{ (!empty($saleSecondShift) ? $saleSecondShift->input5 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>A:G: {{ (!empty($saleSecondShift) ? $saleSecondShift->input6 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small></small>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <small>: {{ (!empty($saleSecondShift) ? $saleSecondShift->input7 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>P:T: {{ (!empty($saleSecondShift) ? $saleSecondShift->input8 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>The
                                                        Rest {{ (!empty($saleSecondShift) ? $saleSecondShift->input9 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>B:K
                                                        Total: {{ (!empty($saleFirstShift) ? $saleFirstShift->input2 : 0) + (!empty($saleSecondShift) ? $saleSecondShift->input2 : 0) }}</small>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <small>TO: {{ (!empty($saleSecondShift) ? $saleSecondShift->input10 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>A:R: {{ (!empty($saleSecondShift) ? $saleSecondShift->input11 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>Haram: {{ (!empty($saleSecondShift) ? $saleSecondShift->input13 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small></small>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <small>TO: {{ (!empty($saleSecondShift) ? $saleSecondShift->input14 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>TO: {{ (!empty($saleSecondShift) ? $saleSecondShift->input15 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small>TO: {{ (!empty($saleSecondShift) ? $saleSecondShift->input12 : '') }}</small>
                                                </th>
                                                <th>
                                                    <small></small>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 pl-0">
                            <div class="h-100 border border-secondary d-flex justify-content-center align-items-center">
                                <div class="text text-center">
                                    <h2>ركن النجوم</h2>
                                    <p>Date: {{(!empty($_POST['created']) ? $_POST['created'] : date('Y-m-d'))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table_bottom">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="12.5%">
                                    <p class="mb-0 d-flex align-items-center justify-content-between">
                                        <span>N.B</span>
                                        <span>N.D</span>
                                    </p>
                                </th>
                                <th width="12.5%">
                                    <p class="mb-0 d-flex align-items-center justify-content-between">
                                        <span>N.B</span>
                                        <span>D.Y</span>
                                    </p>
                                </th>
                                <th width="12%">L</th>
                                <th width="12%">P</th>
                                <th width="12.5%">
                                    <p class="mb-0 d-flex align-items-center justify-content-between">
                                        <span>N.B</span>
                                        <span>N.D</span>
                                    </p>
                                </th>
                                <th width="12%">L</th>
                                <th width="12%">P</th>
                                <th width="11%"></th>
                            </tr>

                            @php($patrolFirstLiterTotal = $patrolFirstTotalAmount = $patrolSecondLiterTotal = $patrolSecondTotalAmount = 0)
                            @if(!empty($patrolMachine))
                                @foreach($patrolMachine as $key => $row)
                                    @php($patrolFirstLiterTotal += $row->first_liter)
                                    @php($patrolFirstTotalAmount += $row->first_amount)
                                    @php($patrolSecondLiterTotal += (!empty($row->second_liter) ? $row->second_liter : 0))
                                    @php($patrolSecondTotalAmount += (!empty($row->second_amount) ? $row->second_amount : 0))
                                    <tr>
                                        <th>{{$row->machine_no}}</th>
                                        <td>{{$row->first_previous_reading}}</td>
                                        <td>{{$row->first_current_reading}}</td>
                                        <td>{{$row->first_liter}}</td>
                                        <td>{{$row->first_amount}}</td>
                                        <td>{{$row->second_previous_reading}}</td>
                                        <td>{{$row->second_current_reading}}</td>
                                        <td>{{$row->second_liter}}</td>
                                        <td>{{$row->second_amount}}</td>
                                    </tr>
                                @endforeach
                            @endif

                            <tr>
                                <th colspan="3" class="text-right pr-1">Total</th>
                                <th class="text-left">{{$patrolFirstLiterTotal}}</th>
                                <th class="text-left">{{$patrolFirstTotalAmount}}</th>
                                <th colspan="2" class="text-right pr-1">Total</th>
                                <th class="text-left">{{$patrolSecondLiterTotal}}</th>
                                <th class="text-left">{{$patrolSecondTotalAmount}}</th>
                            </tr>

                            @php($dieseFirstLiterTotal = $dieseFirstTotalAmount = $dieseSecondLiterTotal = $dieseSecondTotalAmount = 0)
                            @if(!empty($dieselMachine))
                                @foreach($dieselMachine as $key => $row)
                                    @php($dieseFirstLiterTotal += $row->first_liter)
                                    @php($dieseFirstTotalAmount += $row->first_amount)
                                    @php($dieseSecondLiterTotal += (!empty($row->second_liter) ? $row->second_liter : 0))
                                    @php($dieseSecondTotalAmount += (!empty($row->second_amount) ? $row->second_amount : 0))
                                    <tr>
                                        <th>{{$row->machine_no}}</th>
                                        <td>{{$row->first_previous_reading}}</td>
                                        <td>{{$row->first_current_reading}}</td>
                                        <td>{{$row->first_liter}}</td>
                                        <td>{{$row->first_amount}}</td>
                                        <td>{{$row->second_previous_reading}}</td>
                                        <td>{{$row->second_current_reading}}</td>
                                        <td>{{$row->second_liter}}</td>
                                        <td>{{$row->second_amount}}</td>
                                    </tr>
                                @endforeach
                            @endif

                            <tr>
                                <th colspan="3" class="text-right pr-1">Total</th>
                                <th class="text-left">{{$dieseFirstLiterTotal}}</th>
                                <th class="text-left">{{$dieseFirstTotalAmount}}</th>
                                <th colspan="2" class="text-right pr-1">Total</th>
                                <th class="text-left">{{$dieseSecondLiterTotal}}</th>
                                <th class="text-left">{{$dieseSecondTotalAmount}}</th>
                            </tr>

                            @php($patrolGrandTotalLiter = $patrolFirstLiterTotal+$dieseFirstLiterTotal)
                            @php($patrolGrandTotalAmount = $patrolFirstTotalAmount+$dieseFirstTotalAmount)
                            @php($secondGrandTotalLiter = $patrolSecondLiterTotal+$dieseSecondLiterTotal)
                            @php($secondGrandTotalAmount = $patrolSecondTotalAmount+$dieseSecondTotalAmount)

                            <tr>
                                <td colspan="3"></td>
                                <td>{{$patrolGrandTotalLiter}}</td>
                                <td>{{$patrolGrandTotalAmount}}</td>
                                <td colspan="2"></td>
                                <td>{{$secondGrandTotalLiter}}</td>
                                <td>{{$secondGrandTotalAmount}}</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Previous Cash</td>
                                <td>{{ (!empty($saleFirstShift) ? $saleFirstShift->input10 : 0) }}</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td>Retail</td>
                                <td>{{ (!empty($retailBalance) ? $retailBalance->input16 : 0) }}</td>
                                <td></td>
                                <td></td>
                                <td>Retail</td>
                                <td>{{ (!empty($saleSecondShift) ? $saleSecondShift->input16 : 0) }}</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td>TO</td>
                                <td>{{ (!empty($saleFirstShift) ? $saleFirstShift->input17 : 0) }}</td>
                                <td></td>
                                <td></td>
                                <td>TO</td>
                                <td>{{ (!empty($saleSecondShift) ? $saleSecondShift->input17 : 0) }}</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td>+</td>
                                <td>{{ (!empty($saleFirstShift) ? $saleFirstShift->input18 : 0) }}</td>
                                <td>Patrol</td>
                                <td>{{ (!empty($totalPatrol) ? $totalPatrol : 0) }} Ltr</td>
                                <td>+</td>
                                <td>{{ (!empty($saleSecondShift) ? $saleSecondShift->input18 : 0) }}</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td>-</td>
                                <td>{{ (!empty($saleFirstShift) ? $saleFirstShift->input19 : 0) }}</td>
                                <td>Diesel</td>
                                <td>{{ (!empty($totalDiesel) ? $totalDiesel : 0) }} Ltr</td>
                                <td>-</td>
                                <td>{{ (!empty($saleSecondShift) ? $saleSecondShift->input19 : 0) }}</td>
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
@push("header-style")
    <style>
        .col-md-4.nopadding, .col-md-6.nopadding {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .table_bottom table.table tr th {
            text-align: center;
            background: #eee;
        }

        h3.rotate {
            width: 300px;
            transform: rotate(-90deg);
            bottom: 50%;
            right: -95%;
        }

        @media print {
            table.table tr td.position-relative {
                border: 1px solid #111 !important;
            }

            h4.rotate {
                width: 300px;
                transform: rotate(-90deg);
                right: -130% !important;
                top: 40% !important;
            }
        }
    </style>
@endpush
