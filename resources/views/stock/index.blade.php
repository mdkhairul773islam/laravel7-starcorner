@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    {{--@include('stock.nav')--}}

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Stock</h4>
                    <a href="#" id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    {{--<form action="{{route('admin.stock')}}" method="POST">
                        @csrf

                        <div class="form-row print_hide">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="product_id" class="form-control selectpicker" data-live-search="true">
                                        <option value="" selected>Select Product</option>
                                        @if(!empty($productList) && $productList->isNotEmpty())
                                            @foreach($productList as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn submit_btn" name="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    <hr class="print_hide mt-0">--}}

                    @include('components.print')


                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th width="30">SL</th>
                                <th>Product Name</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                            </thead>

                            @php($totalAmount = $totalQuantity = 0)
                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)

                                    @php($saleQuantity = (!empty($machineRecords) ? ($machineRecords->where('machine_type', $row->category_name)->sum('liter')) : 0))

                                    @php($quantity = ($row->quantity - $saleQuantity))
                                    @php($subtotal = $row->purchase_price * $quantity)

                                    @php($totalAmount += $subtotal)
                                    @php($totalQuantity += $quantity)

                                    <tr>
                                        <td>{{(++$key)}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->unit}}</td>
                                        <td>{{$quantity}}</td>
                                        <td>{{$row->purchase_price}}</td>
                                        <td>{{$subtotal}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                <th colspan="3" class="text-right">Total</th>
                                <th>{{$totalQuantity}}</th>
                                <th></th>
                                <th>{{$totalAmount}}</th>
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
