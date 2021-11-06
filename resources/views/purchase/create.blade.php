@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container" ng-app="myApp" ng-controller="purchaseController" ng-cloak>
    @include('purchase.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Add New Purchase</h4>
                </div>

                <form action="{{route('admin.purchase.store')}}" method="POST">
                    @csrf
                    <div class="panel_body">
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="created" value="{{date('Y-m-d')}}" class="form-control datepicker" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" name="cv_no" placeholder="Voucher No." ng-model="cvNo" ng-model-options="{ debounce: 725 }" ng-change="checkExistsFn(cvNo)" class="form-control" required>
                                    <span class="text-danger" ng-hide="cvValidation">This voucher already exists.</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="party_id" class="form-control selectpicker" ng-init="partyId=''"
                                            ng-model="partyId" ng-change="getPartyInfoFn(partyId)"
                                            data-live-search="true"
                                            required>
                                        <option value="" selected>Select Supplier</option>
                                        @if(!empty($supplierList) && $supplierList->isNotEmpty())
                                            @foreach($supplierList as $item)
                                                <option
                                                    value="{{$item->id}}">{{($item->name .' - '. $item->mobile)}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select ng-model="productId" ng-change="addNewProduct(productId)"
                                            class="form-control selectpicker" data-live-search="true">
                                        <option value="" selected>Select Product</option>
                                        @if(!empty($productList) && $productList->isNotEmpty())
                                            @foreach($productList as $item)
                                                <option value="{{$item->id}}">{{($item->name)}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-0">

                        <div class="table-responsive">
                            <table class="table table-bordered list-table">
                                <tr>
                                    <th width="30">SL</th>
                                    <th width="24%">Product Name</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Purchase Price</th>
                                    <th>Sale Price</th>
                                    <th>Amount</th>
                                    <th width="30" class="text-right print_hide">Action</th>
                                </tr>

                                <tr ng-repeat="row in cart">
                                    <input type="hidden" name="product_id[]" ng-value="row.product_id">

                                    <td ng-bind="$index+1"></td>
                                    <td class="td_readonly" ng-bind="row.name"></td>
                                    <td class="td_readonly" ng-bind="row.unit"></td>
                                    <td class="td_input">
                                        <input type="number" name="quantity[]" ng-model="row.quantity" step="any"
                                               placeholder="0" min="0" class="form-control" autocomplete="off" required>
                                    </td>
                                    <td class="td_input">
                                        <input type="number" name="purchase_price[]" ng-model="row.purchase_price"
                                               step="any" min="0" placeholder="0" class="form-control" autocomplete="off">
                                    </td>
                                    <td class="td_input">
                                        <input type="number" name="sale_price[]" ng-model="row.sale_price" step="any" min="0"
                                               placeholder="0" class="form-control" autocomplete="off">
                                    </td>
                                    <td class="td_input">
                                        <input type="text" name="subtotal[]" ng-value="getItemSubtotalFn($index)"
                                               step="any" placeholder="0" class="form-control" readonly>
                                    </td>
                                    <td class="operation_btn text-center">
                                        <a ng-click="removeItemFn($index)" class="delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">Sub Total</label>
                                    <div class="col-sm-8">
                                        <input type="text" ng-value="getSubtotalFn()" class="form-control"
                                               placeholder="0" readonly>
                                        <input type="hidden" name="total_quantity" ng-value="totalQuantity">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">Discount</label>
                                    <div class="col-sm-8">
                                        <input name="total_discount" ng-model="discount" type="text"
                                               class="form-control" placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">Grand Total</label>
                                    <div class="col-sm-8">
                                        <input name="total_bill" type="text" ng-value="getGrandTotalFn()"
                                               class="form-control" placeholder="0" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">Previous Balance</label>
                                    <div class="col-sm-5">
                                        <input name="previous_balance" type="text" ng-value="partyInfo.balance"
                                               class="form-control" placeholder="0" readonly>
                                    </div>
                                    <div class="col-sm-3 pl-0">
                                        <input name="previous_sign" type="text" ng-value="partyInfo.previous_sign"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">Paid</label>
                                    <div class="col-sm-5">
                                        <input type="number" name="paid" ng-model="paid" class="form-control" step="any"
                                               placeholder="0">
                                    </div>
                                    <div class="col-sm-3 pl-0">
                                        <select name="transaction_method" ng-init="transactionMethod='cash'"
                                                class="form-control" data-live-search="true">
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank</option>
                                            <option value="cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-right">Current Balance</label>
                                    <div class="col-sm-5">
                                        <input type="text" ng-value="getCurrentBalanceFn()" class="form-control"
                                               placeholder="0" readonly>
                                    </div>
                                    <div class="col-sm-3 pl-0">
                                        <input type="text" class="form-control" ng-value="partyInfo.current_sign"
                                               readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-md-3 text-right">
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


@push('header-script')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
@endpush

@push('footer-script')
    <script>

        var app = angular.module("myApp", []);

        app.controller("purchaseController", function ($scope, $http) {

            $scope.partyInfo = {
                balance: 0,
                previous_balance: 0,
                previous_sign: 'Receivable',
                current_balance: 0,
                current_sign: 'Receivable'
            };

            // get pary balnce
            $scope.getPartyInfoFn = function (partyId) {

                $scope.partyInfo = {
                    balance: 0,
                    previous_balance: 0,
                    previous_sign: 'Receivable',
                    current_balance: 0,
                    current_sign: 'Receivable'
                };

                if (typeof partyId !== 'undefined' && partyId != '') {

                    $http({
                        url: '{{route('admin.transaction.party-info')}}',
                        method: 'POST',
                        data: {party_id: partyId, _token: '{{ csrf_token() }}'},
                        dataType: 'json',
                    }).then(function (balanceInfo) {

                        $scope.partyInfo.balance = Math.abs(parseFloat(balanceInfo.data.balance));
                        $scope.partyInfo.previous_balance = parseFloat(balanceInfo.data.balance);
                        $scope.partyInfo.previous_sign = balanceInfo.data.status;
                    });
                }
            };

            // check custom voucher no exists
            $scope.isDisable = true;
            $scope.cvValidation = true;
            $scope.checkExistsFn = function(cvNo){

                $scope.cvValidation = true;

                if(typeof cvNo !== 'undefined' && cvNo != ''){

                    $http({
                        url: '{{route('admin.purchase.cv-exists')}}',
                        method: 'POST',
                        data: {cv_no: cvNo, _token: '{{ csrf_token() }}'},
                        dataType: 'json',
                    }).then(function (existsResponse) {

                        if(existsResponse.data.length > 0){
                            $scope.cvValidation = false;
                        }
                    });
                }
            }

            // add new product
            $scope.cart = [];
            $scope.addNewProduct = function (productId) {

                if (typeof productId !== 'undefined' && productId != '') {

                    $http({
                        url: '{{route('admin.purchase.product-info')}}',
                        method: 'POST',
                        data: {product_id: productId, _token: '{{ csrf_token() }}'},
                        dataType: 'json',
                    }).then(function (productInfo) {

                        var product = productInfo.data;

                        if (product.length > 0) {

                            var item = {
                                product_id: product[0].id,
                                name: product[0].name,
                                model: product[0].model,
                                product_type: product[0].product_type,
                                purchase_price: parseFloat(product[0].purchase_price),
                                sale_price: parseFloat(product[0].sale_price),
                                unit: product[0].unit.unit,
                                quantity: '',
                                discount: 0,
                                subtotal: 0
                            };

                            $scope.cart.push(item);
                        }
                    });
                }
            };

            // calculate item subtotal
            $scope.getItemSubtotalFn = function (index) {

                var quantity = !isNaN(parseFloat($scope.cart[index].quantity)) ? parseFloat($scope.cart[index].quantity) : 0;
                var purchasePrice = !isNaN(parseFloat($scope.cart[index].purchase_price)) ? parseFloat($scope.cart[index].purchase_price) : 0;
                var subtotal = purchasePrice * quantity;

                $scope.cart[index].subtotal = Math.abs(subtotal.toFixed(2));

                return $scope.cart[index].subtotal;
            };

            // get subtotal
            $scope.totalQuantity = 0;
            $scope.getSubtotalFn = function () {

                var totalQuantity = subtotal = 0;
                angular.forEach($scope.cart, function (row, index) {

                    totalQuantity += !isNaN(parseFloat(row.quantity)) ? parseFloat(row.quantity) : 0;
                    subtotal += !isNaN(parseFloat(row.subtotal)) ? parseFloat(row.subtotal) : 0;
                });

                $scope.totalQuantity = totalQuantity;

                return subtotal;
            };

            // get subtotal
            $scope.getGrandTotalFn = function () {

                var discount = !isNaN(parseFloat($scope.discount)) ? parseFloat($scope.discount) : 0;
                var transportCost = !isNaN(parseFloat($scope.transportCost)) ? parseFloat($scope.transportCost) : 0;

                var grandTotal = parseFloat($scope.getSubtotalFn()) - discount + transportCost;

                return grandTotal;
            };

            // calculate party balance
            $scope.getCurrentBalanceFn = function () {

                var paid = !isNaN(parseFloat($scope.paid)) ? parseFloat($scope.paid) : 0;
                var balance = $scope.partyInfo.previous_balance - parseFloat($scope.getGrandTotalFn()) + paid;

                $scope.partyInfo.current_balance = Math.abs(balance);
                $scope.partyInfo.current_sign = (balance < 0 ? 'Payable' : 'Receivable');

                $scope.isDisable  = ($scope.totalQuantity > 0 && $scope.cvValidation == true ? false : true);

                return $scope.partyInfo.current_balance;
            };

            // remove card item
            $scope.removeItemFn = function (index) {
                $scope.cart.splice(index, 1);
            };
        });
    </script>
@endpush

