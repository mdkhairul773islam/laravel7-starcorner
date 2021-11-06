@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container" ng-app="myApp" ng-controller="transactionController" ng-cloak>
    @include('supplier.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Edit Transaction</h4>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.transaction.update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{$info->id}}">
                        <input type="hidden" name="party_id" value="{{$info->party_id}}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Supplier Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="text" name="created" value="{{$info->created}}" class="form-control datepicker">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Supplier Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="text" value="{{$info->party->name}}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-3">Balance <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" ng-value="partyInfo.balance" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text" ng-bind="partyInfo.previous_sign"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Transaction Method <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <select name="transaction_method" ng-init="transactionMethod='{{$info->transaction_method}}'" ng-model="transactionMethod" class="form-control" required>
                                    <option value="">Select Method</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>
                                    <option value="check">Check</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-3">Paid <span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="number" name="paid" ng-model="partyInfo.paid" class="form-control"
                                       step="any" placeholder="0" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-3">Commission </label>
                            <div class="col-md-5">
                                <input type="number" name="commission" ng-model="partyInfo.commission"
                                       class="form-control" step="any" placeholder="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-3">Current Balance</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" ng-value="getCurrentBalanceFn()" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text" ng-bind="partyInfo.previous_sign"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-3">Transaction By </label>
                            <div class="col-md-5">
                                <input type="text" name="transaction_by" value="{{$info->transaction_by}}" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-3">Remarks</label>
                            <div class="col-md-5">
                                <textarea name="remarks" class="form-control" placeholder="">{{$info->remarks}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 text-right">
                                <button type="submit" class="btn submit_btn" name="submit">Save</button>
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

@push('header-script')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
@endpush

@push('footer-script')
    <script>

        var app = angular.module("myApp", []);

        app.controller("transactionController", function ($scope, $http) {

            $scope.partyInfo = {
                paid: parseFloat('{{$info->debit}}'),
                commission: parseFloat('{{$info->commission}}'),
                balance: parseFloat('{{abs($balanceInfo->balance)}}'),
                previous_balance: parseFloat('{{$balanceInfo->balance}}'),
                previous_sign: '{{$balanceInfo->status}}',
                current_balance: 0,
                current_sign: 'Receivable'
            };

            // calculate party balance
            $scope.getCurrentBalanceFn = function () {

                var paid = !isNaN(parseFloat($scope.partyInfo.paid)) ? parseFloat($scope.partyInfo.paid) : 0;
                var commission = !isNaN(parseFloat($scope.partyInfo.commission)) ? parseFloat($scope.partyInfo.commission) : 0;

                var balance = parseFloat($scope.partyInfo.previous_balance) + paid + commission;

                $scope.partyInfo.current_balance = Math.abs(balance);
                $scope.partyInfo.current_sign = (balance < 0 ? 'Payable' : 'Receivable');

                return $scope.partyInfo.current_balance;
            };
        });
    </script>
@endpush

