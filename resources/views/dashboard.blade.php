@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        <!-- body nav start -->
        <div class="body_nav">
            @if(Auth::user()->privilege != 'user')
                <ul>
                    <li><a href="{{route('admin.purchase.create')}}">Add Purchase</a></li>
                    <li><a href="{{route('admin.purchase')}}">All Purchase</a></li>
                </ul>
            @endif
        </div>
        <!-- body nav start -->

        <!-- print header start -->
        <!-- print header end -->

        <!-- body content start -->
        <div class="body_content">
            <div class="box_wrapper">
                <div class="dash_box box_1">
                    <h2>Today's Purchase</h2>
                    <h3>{{numFilter($todayPurchase)}} </h3>
                </div>
                <div class="dash_box box_2">
                    <h2>Today's Patrol Sale</h2>
                    <h3>{{numFilter($todaySale->patrol)}} </h3>
                </div>

                <div class="dash_box box_3">
                    <h2>Today's Diesel Sale</h2>
                    <h3>{{numFilter($todaySale->diesel)}} </h3>
                </div>
                <div class="dash_box box_4">
                    <h2>Today's Total Sale</h2>
                    <h3>{{numFilter(($todaySale->patrol + $todaySale->diesel))}} </h3>

                </div>
                @if(Auth::user()->privilege != 'user')
                    <div class="dash_box box_5">
                        <h2>Stock Amount</h2>
                        <h3>{{numFilter($stock->amount)}} </h3>
                    </div>
                    <div class="dash_box box_6">
                        <h2>Patrol Stock</h2>
                        <h3>{{numFilter($stock->patrol)}} Liter</h3>
                    </div>
                    <div class="dash_box box_7">
                        <h2>Diesel Stock</h2>
                        <h3>{{numFilter($stock->diesel)}} Liter</h3>
                    </div>
                @endif
            </div>


            <div class="row">
                <div class="col-6 m-auto">
                    <table class="table table-bordered" id="machineRecord">
                        <thead>
                        <tr>
                            <th colspan="3">
                                <span style="font-size: 18px;">Machine Record</span>
                                <div class="float-right">
                                    <select id="shift" onchange="getMachineRecordFn()">
                                        <option value="first_shift">First Shift</option>
                                        <option value="second_shift">Second Shift</option>
                                    </select>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Machine No.</th>
                            <th>Machine Type</th>
                            <th>Reading</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection
@push('footer-script')
    <script>
        function getMachineRecordFn() {

            var _shift = $('#shift').val();

            $('#machineRecord tbody').remove();
            $.post("{{asset('admin/dashboard/machine-record')}}", {shift: _shift, _token: '{{csrf_token()}}'}).then(function (data) {
                $("#machineRecord").append("<tbody></tbody>");
                $( "#machineRecord tbody").append(data);
            });
        }
        getMachineRecordFn();
    </script>
@endpush
