@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container" ng-app="myApp" ng-controller="appController" ng-cloak>
    @include('sale.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Add Sale</h4>
                </div>
                <div class="panel_body">
                    <form ng-submit="getFormDataFn()">
                        <div class="row">
                            {{--@if(Auth::user()->privilege != 'user')--}}
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="date" id="created"  ng-model="created" ng-change="resetFrom()" class="form-control" required>
                                </div>
                            </div>
                            {{--@else
                                <input type="hidden" value="{{date('Y-m-d')}}" id="created" ng-model="created" class="form-control" required>
                            @endif--}}

                            <div class="col-md-2">
                                <div class="form-group" >
                                    <select ng-init="shift=''" ng-model="shift" ng-change="resetFrom()" class="form-control" required>
                                        <option value="">Select Shift</option>
                                        <option value="first_shift">First Shift</option>
                                        <option value="second_shift">Second Shift</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="submit" class="btn submit_btn">Show</button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <form action="{{route('admin.sale.store')}}" method="post" ng-show="showForm">
                        @csrf

                        <input type="hidden" name="created" ng-value="createdDate" required>
                        <input type="hidden" name="shift" ng-value="shiftData" required>
                        <input type="hidden" name="sale_record_id" ng-value="saleRecordId" required>

                        <div class="row">
                            <div class="col-md-8 pr-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Cash =</span>
                                                    </div>
                                                    <input type="number" name="input1" ng-model="saleInfo.input1"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">B:K:</span>
                                                    </div>
                                                    <input type="number" name="input2" ng-model="saleInfo.input2"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">M:</span>
                                                    </div>
                                                    <input type="number" name="input3" ng-model="saleInfo.input3"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">:</span>
                                                    </div>
                                                    <input type="number" name="input4" ng-model="saleInfo.input4"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">H:</span>
                                                    </div>
                                                    <input type="number" name="input5" ng-model="saleInfo.input5"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">A:G:</span>
                                                    </div>
                                                    <input type="number" name="input6" ng-model="saleInfo.input6"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">:</span>
                                                    </div>
                                                    <input type="number" name="input7" ng-model="saleInfo.input7"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">P:T:</span>
                                                    </div>
                                                    <input type="number" name="input8" ng-model="saleInfo.input8"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">The Rest</span>
                                                    </div>
                                                    <input type="number" name="input9" ng-model="saleInfo.input9"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO:</span>
                                                    </div>
                                                    <input type="text" name="input10" ng-value="getCashFn()"
                                                           class="form-control-plaintext pl-2" placeholder="0" readonly>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">A:R:</span>
                                                    </div>
                                                    <input type="number" name="input11" ng-model="saleInfo.input11"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Haram</span>
                                                    </div>
                                                    <input type="number" name="input13" ng-model="saleInfo.input13"
                                                           class="form-control-plaintext pl-2" placeholder="0"
                                                           ng-readonly="machineListActive">
                                                </div>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO:</span>
                                                    </div>
                                                    <input type="text" name="input14" ng-value="getGrandTotalFn()"
                                                           class="form-control-plaintext pl-2" placeholder="0" readonly>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO:</span>
                                                    </div>
                                                    <input type="text" name="input15" ng-value="getCash2Fn()"
                                                           class="form-control-plaintext pl-2" placeholder="0" readonly>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO:</span>
                                                    </div>
                                                    <input type="text" name="input12" ng-value="getCash3Fn()"
                                                           class="form-control-plaintext pl-2" placeholder="0" readonly>
                                                </div>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-4 pl-0">
                                <div
                                    class="h-100 border border-secondary d-flex justify-content-center align-items-center">
                                    <div class="text text-center">
                                        <h2>ركن النجوم</h2>
                                        <p>Date: @{{createdDate}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" ng-show="machineListActive">
                            <div class="col-12">
                                <div class="table-responsive table_bottom">
                                    <table class="table table-bordered mb-0">
                                        <tr>
                                            <th width="4%">NO</th>
                                            <th width="24%">
                                                <p class="pr-2 pl-2 mb-0 d-flex align-items-center justify-content-between">
                                                    <span>N.B</span>
                                                    <span>N.D</span>
                                                </p>
                                            </th>
                                            <th width="24%">
                                                <p class="pr-2 pl-2 mb-0 d-flex align-items-center justify-content-between">
                                                    <span>N.B</span>
                                                    <span>D.Y</span>
                                                </p>
                                            </th>
                                            <th width="24%">L</th>
                                            <th width="24%">P</th>
                                        </tr>
                                        <tr ng-repeat="item in patrolMachineList">
                                            <input type="hidden" name="machine_id[]" ng-value="item.machine_id">
                                            <input type="hidden" name="sale_price[]" ng-value="item.sale_price">
                                            <th>@{{ item.machine_no }}</th>
                                            <td>
                                                <input type="text" name="previous_reading[]"
                                                       ng-model="item.previous_reading"
                                                       class="form-control-plaintext pl-2" placeholder="0" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="current_reading[]"
                                                       ng-model="item.current_reading"
                                                       class="form-control-plaintext pl-2" placeholder="0" min="0"
                                                       required>
                                            </td>
                                            <td>
                                                <input type="text" name="liter[]" ng-value="getLiterFn($index, 'patrol')"
                                                       class="form-control-plaintext pl-2" placeholder="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" ng-value="getAmountFn($index, 'patrol')"
                                                       class="form-control-plaintext pl-2" placeholder="0" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right pr-1">Total</th>
                                            <th><input type="text" class="form-control" ng-value="totalPatrol"
                                                       placeholder="0" readonly></th>
                                            <th><input type="text" class="form-control" ng-value="totalPatrolAmount"
                                                       placeholder="0" readonly></th>
                                            <input type="hidden" ng-value="getTotalFn('patrol')">
                                        </tr>
                                        <tr ng-repeat="item in dieselMachineList">
                                            <input type="hidden" name="machine_id[]" ng-value="item.machine_id">
                                            <input type="hidden" name="sale_price[]" ng-value="item.sale_price">
                                            <th>@{{ item.machine_no }}</th>
                                            <td>
                                                <input type="text" name="previous_reading[]"
                                                       ng-model="item.previous_reading"
                                                       class="form-control-plaintext pl-2" placeholder="0" readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="current_reading[]"
                                                       ng-model="item.current_reading"
                                                       class="form-control-plaintext pl-2" min="0" placeholder="0"
                                                       required>
                                            </td>
                                            <td>
                                                <input type="text" name="liter[]" ng-value="getLiterFn($index, 'diesel')"
                                                       class="form-control-plaintext pl-2" placeholder="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" ng-value="getAmountFn($index, 'diesel')"
                                                       class="form-control-plaintext pl-2" placeholder="0" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right pr-1">Total</th>
                                            <th><input type="text" class="form-control" ng-value="totalDiesel"
                                                       placeholder="0" readonly></th>
                                            <th><input type="text" class="form-control" ng-value="totalDieselAmount"
                                                       placeholder="0" readonly></th>
                                            <input type="hidden" ng-value="getTotalFn('diesel')">
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" ng-show="machineListActive">
                            <div class="col-12">
                                <div class="table-responsive table_bottom">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="4%"></th>
                                            <td width="24%"></td>
                                            <td width="24%"></td>
                                            <td width="24%">
                                                <input type="text" ng-value="literTotal" class="form-control-plaintext pl-2" placeholder="0">
                                            </td>
                                            <td width="24%">
                                                <input type="text" ng-value="amountTotal" class="form-control-plaintext pl-2" placeholder="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr ng-hide="(shift == 'first_shift' ? true : false)">
                                            <th>D</th>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Previous Cash</span>
                                                    </div>
                                                    <input type="number" name="" ng-model="previous_cash"  class="form-control-plaintext pl-2" readonly placeholder="0">
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>D</th>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Retail</span>
                                                    </div>
                                                    <input type="number" name="input16" ng-model="saleInfo.input16" ng-readonly="(shift == 'first_shift' ? true : false)"
                                                           class="form-control-plaintext pl-2" placeholder="0">
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp</th>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO</span>
                                                    </div>
                                                    <input type="text" name="input17" ng-value="getGrandTotalAmountFn()"
                                                           class="form-control-plaintext pl-2" placeholder="0" readonly>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th rowspan="2">Tank</th>
                                            <td rowspan="2"></td>
                                            <td rowspan="2"></td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+</span>
                                                    </div>
                                                    <input type="text" name="input18" ng-model="saleInfo.input18"
                                                           class="form-control-plaintext pl-2" placeholder="0" readonly>
                                                </div>
                                            </td>
                                            <td rowspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">-</span>
                                                    </div>
                                                    <input type="text" name="input19" ng-model="saleInfo.input19" class="form-control-plaintext pl-2" placeholder="0" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end pr-3 mt-3">
                            <div class="form-group">
                                <button type="submit" class="btn submit_btn" ng-disabled="isDisable">Save</button>
                            </div>
                        </div>
                    </form>
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
        table.table.table-bordered tr th, .table_bottom table.table tr td {
            padding: 0px !important;
        }

        .table_bottom table.table tr th {
        }

        .table_bottom table.table tr th {
            text-align: center;
            background: #eee;
        }
    </style>
@endpush

@push('header-script')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
@endpush

@push('footer-script')
    <script>

        var app = angular.module("myApp", []);

        app.controller("appController", function ($scope, $http) {

            // set shift
            $scope.isDisable = true;
            $scope.showForm = false;
            $scope.shift = '';
            $scope.createdDate = '';
            $scope.saleRecordId = '';
            $scope.shiftData = '';
            $scope.previous_cash = 0;
            $scope.machineListActive = false;
            $scope.machineList = [];

            $scope.saleInfo = {
                input1: '',
                input2: '',
                input3: '',
                input4: '',
                input5: '',
                input6: '',
                input7: '',
                input8: '',
                input9: '',
                input10: '',
                input11: '',
                input12: '',
                input13: '',
                input14: '',
                input15: '',
                input16: '',
                input17: '',
                input18: '',
                input19: '',
            };

            $scope.resetFrom = function(){
                $scope.showForm = false;
                $scope.machineListActive = false;
                $scope.machineList = [];
            };

            $scope.getFormDataFn = function () {

                $scope.isDisable = true;
                $scope.showForm = true;
                $scope.machineListActive = false;
                $scope.machineList = [];
                $scope.shiftData = '';
                $scope.createdDate = '';
                $scope.saleRecordId = '';

                $scope.saleInfo = {
                    input1: '',
                    input2: '',
                    input3: '',
                    input4: '',
                    input5: '',
                    input6: '',
                    input7: '',
                    input8: '',
                    input9: '',
                    input10: '',
                    input11: '',
                    input12: '',
                    input13: '',
                    input14: '',
                    input15: '',
                    input16: '',
                    input17: '',
                    input18: '',
                    input19: '',
                };

                var createdDate = document.getElementById('created').value;

                if (typeof createdDate !== 'undefined' && createdDate != '' && $scope.shift != '') {

                    $scope.isDisable = false;
                    $scope.createdDate = createdDate;
                    $scope.shiftData = $scope.shift;

                    // check machine info
                    $http({
                        url: '{{route('admin.sale.sale-info')}}',
                        method: 'POST',
                        data: {created: createdDate, shift: $scope.shift, _token: '{{ csrf_token() }}'},
                        dataType: 'json',
                    }).then(function (saleInfo) {

                        if (saleInfo.data.length > 0) {
                            $scope.machineListActive = true;

                            $scope.saleRecordId = saleInfo.data[0].id;

                            // get all sales data
                            $scope.saleInfo = {
                                input1: (saleInfo.data[0].input1 > 0 ? parseFloat(saleInfo.data[0].input1) : ''),
                                input2: (saleInfo.data[0].input2 > 0 ? parseFloat(saleInfo.data[0].input2) : ''),
                                input3: (saleInfo.data[0].input3 > 0 ? parseFloat(saleInfo.data[0].input3) : ''),
                                input4: (saleInfo.data[0].input4 > 0 ? parseFloat(saleInfo.data[0].input4) : ''),
                                input5: (saleInfo.data[0].input5 > 0 ? parseFloat(saleInfo.data[0].input5) : ''),
                                input6: (saleInfo.data[0].input6 > 0 ? parseFloat(saleInfo.data[0].input6) : ''),
                                input7: (saleInfo.data[0].input7 > 0 ? parseFloat(saleInfo.data[0].input7) : ''),
                                input8: (saleInfo.data[0].input8 > 0 ? parseFloat(saleInfo.data[0].input8) : ''),
                                input9: (saleInfo.data[0].input9 > 0 ? parseFloat(saleInfo.data[0].input9) : ''),
                                input10: (saleInfo.data[0].input10 > 0 ? parseFloat(saleInfo.data[0].input10) : ''),
                                input11: (saleInfo.data[0].input11 > 0 ? parseFloat(saleInfo.data[0].input11) : ''),
                                input12: (saleInfo.data[0].input12 > 0 ? parseFloat(saleInfo.data[0].input12) : ''),
                                input13: (saleInfo.data[0].input13 > 0 ? parseFloat(saleInfo.data[0].input13) : ''),
                                input14: (saleInfo.data[0].input14 > 0 ? parseFloat(saleInfo.data[0].input14) : ''),
                                input15: (saleInfo.data[0].input15 > 0 ? parseFloat(saleInfo.data[0].input15) : ''),
                                input16: (saleInfo.data[0].input16 > 0 ? parseFloat(saleInfo.data[0].input16) : ''),
                                input17: (saleInfo.data[0].input17 > 0 ? parseFloat(saleInfo.data[0].input17) : ''),
                                input18: (saleInfo.data[0].input18 > 0 ? parseFloat(saleInfo.data[0].input18) : ''),
                                input19: (saleInfo.data[0].input19 > 0 ? parseFloat(saleInfo.data[0].input19) : ''),
                            };

                            // get previous retail balance
                            if(saleInfo.data[0].shift == 'first_shift'){
                                $http({
                                    method: "POST",
                                    url: "{{route('admin.sale.retail-balance')}}",
                                    data: {created: createdDate, shift: 'second_shift', _token: '{{ csrf_token() }}'},
                                }).then(function (retailBalance) {
                                    if(retailBalance.data.length > 0){
                                        $scope.saleInfo.input16 = parseFloat(retailBalance.data[0].input16);
                                    }
                                });
                            }


                            // get previous total cash
                            if(saleInfo.data[0].shift == 'second_shift'){
                                $http({
                                    method: "POST",
                                    url: "{{route('admin.sale.cash-balance')}}",
                                    data: {created: createdDate, shift: 'first_shift', _token: '{{ csrf_token() }}'},
                                }).then(function (retailBalance) {
                                    if(retailBalance.data.length > 0){
                                        $scope.previous_cash = parseFloat(retailBalance.data[0].input10);
                                    }
                                });
                            }

                            // get machine info
                            $http({
                                url: "{{route('admin.sale.machine-info')}}",
                                method: "POST",
                                data: {created: createdDate, shift: $scope.shift, _token: '{{ csrf_token() }}'},
                                dataType: "json",
                            }).then(function (machineInfo) {
                                if (machineInfo.data.length > 0) {
                                    angular.forEach(machineInfo.data, function (row, index) {
                                        row.previous_reading = parseFloat(row.previous_reading);
                                        row.current_reading = parseFloat(row.current_reading);
                                        row.sale_price = parseFloat(row.sale_price);
                                    });
                                    $scope.machineList = machineInfo.data;

                                    // filter machine
                                    $scope.patrolMachineList = $scope.machineList.filter(e => e.machine_type == 'Patrol');
                                    $scope.dieselMachineList = $scope.machineList.filter(e => e.machine_type == 'Diesel');
                                }
                            });
                        } else {
                            $scope.machineListActive = false;
                        }
                    });
                }
            };

            // get liter fn
            $scope.getLiterFn = function (index, machine_type) {

                if (machine_type == 'patrol') {
                    var currentReading = !isNaN(parseFloat($scope.patrolMachineList[index].current_reading)) ? parseFloat($scope.patrolMachineList[index].current_reading) : 0;
                    var previousReading = parseFloat($scope.patrolMachineList[index].previous_reading);
                    var liter = 0;
                    if (currentReading > previousReading) {
                        liter = currentReading - previousReading;
                    }
                    $scope.patrolMachineList[index].liter = liter;
                    return $scope.patrolMachineList[index].liter;
                }

                if (machine_type == 'diesel') {
                    var currentReading = !isNaN(parseFloat($scope.dieselMachineList[index].current_reading)) ? parseFloat($scope.dieselMachineList[index].current_reading) : 0;
                    var previousReading = parseFloat($scope.dieselMachineList[index].previous_reading);
                    var liter = 0;
                    if (currentReading > previousReading) {
                        liter = currentReading - previousReading;
                    }
                    $scope.dieselMachineList[index].liter = liter;
                    return $scope.dieselMachineList[index].liter;
                }
            };

            // get amount fn
            $scope.getAmountFn = function (index, machine_type) {

                if (machine_type == 'patrol') {

                    var amount = parseFloat($scope.patrolMachineList[index].sale_price) * parseFloat($scope.patrolMachineList[index].liter);

                    $scope.patrolMachineList[index].amount = amount;

                    $scope.getPatrolTotalFn();

                    return $scope.patrolMachineList[index].amount;
                }

                if (machine_type == 'diesel') {

                    var amount = parseFloat($scope.dieselMachineList[index].sale_price) * parseFloat($scope.dieselMachineList[index].liter);

                    $scope.dieselMachineList[index].amount = amount;

                    $scope.getDieselTotalFn();
                    $scope.getliterAmountTotalFn();

                    return $scope.dieselMachineList[index].amount;
                }
            };

            // get patrol total function
            $scope.totalPatrol = 0;
            $scope.totalPatrolAmount = 0;
            $scope.getPatrolTotalFn = function () {

                var liter = amount = 0;
                angular.forEach($scope.patrolMachineList, function (row) {
                    liter += parseFloat(row.liter);
                    amount += parseFloat(row.amount);
                });
                $scope.totalPatrol = liter;
                $scope.totalPatrolAmount = amount;
            };

            // get diesel total function
            $scope.totalDiesel = 0;
            $scope.totalDieselAmount = 0;
            $scope.getDieselTotalFn = function () {

                var liter = amount = 0;
                angular.forEach($scope.dieselMachineList, function (row) {
                    liter += parseFloat(row.liter);
                    amount += parseFloat(row.amount);
                });

                $scope.totalDiesel = liter;
                $scope.totalDieselAmount = amount;
            };

            $scope.getliterAmountTotalFn = function () {
                $scope.literTotal = $scope.totalPatrol + $scope.totalDiesel;
                $scope.amountTotal = $scope.totalPatrolAmount + $scope.totalDieselAmount;
            }


            // get cash total fn
            $scope.getCashFn = function () {
                var input1 = !isNaN(parseFloat($scope.saleInfo.input1)) ? parseFloat($scope.saleInfo.input1) : 0;
                var input4 = !isNaN(parseFloat($scope.saleInfo.input4)) ? parseFloat($scope.saleInfo.input4) : 0;
                var input7 = !isNaN(parseFloat($scope.saleInfo.input7)) ? parseFloat($scope.saleInfo.input7) : 0;

                return (input1 + input4 + input7);
            };

            // get withdraw total fn
            $scope.getCash2Fn = function () {
                var input2 = !isNaN(parseFloat($scope.saleInfo.input2)) ? parseFloat($scope.saleInfo.input2) : 0;
                var input5 = !isNaN(parseFloat($scope.saleInfo.input5)) ? parseFloat($scope.saleInfo.input5) : 0;
                var input8 = !isNaN(parseFloat($scope.saleInfo.input8)) ? parseFloat($scope.saleInfo.input8) : 0;
                var input11 = !isNaN(parseFloat($scope.saleInfo.input11)) ? parseFloat($scope.saleInfo.input11) : 0;

                return (input2 + input5 + input8 + input11);
            };

            // get withdraw total fn
            $scope.getCash3Fn = function () {
                var input3 = !isNaN(parseFloat($scope.saleInfo.input3)) ? parseFloat($scope.saleInfo.input3) : 0;
                var input6 = !isNaN(parseFloat($scope.saleInfo.input6)) ? parseFloat($scope.saleInfo.input6) : 0;
                var input9 = !isNaN(parseFloat($scope.saleInfo.input9)) ? parseFloat($scope.saleInfo.input9) : 0;
                var input13 = !isNaN(parseFloat($scope.saleInfo.input13)) ? parseFloat($scope.saleInfo.input13) : 0;

                return (input3 + input6 + input9 + input13);
            };

            // get grand total fn
            $scope.getGrandTotalFn = function () {
                return $scope.getCashFn() + $scope.getCash2Fn() + $scope.getCash3Fn();
            };

            // get grand total amount
            $scope.getGrandTotalAmountFn = function () {

                var input16 = !isNaN(parseFloat($scope.saleInfo.input16)) ? parseFloat($scope.saleInfo.input16) : 0;

                var totalAmount = 0;

                if($scope.shift == 'first_shift'){
                    totalAmount = $scope.amountTotal + input16;
                }

                if($scope.shift == 'second_shift'){
                    totalAmount = ($scope.amountTotal + $scope.previous_cash);
                }

                var cashTotal = parseFloat($scope.getGrandTotalFn()) - totalAmount;

                if(cashTotal < 0){
                    $scope.saleInfo.input18 = 0;
                    $scope.saleInfo.input19 = cashTotal;
                }else{
                    $scope.saleInfo.input18 = cashTotal;
                    $scope.saleInfo.input19 = 0;
                }

                return totalAmount;
            };
        });
    </script>
@endpush


