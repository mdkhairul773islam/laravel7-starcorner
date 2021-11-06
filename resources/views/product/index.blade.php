@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    @include('product.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Products</h4>
                    <a href="#" id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th width="30">SL</th>
                                <th>Product Name</th>
                                <th>Model</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Status</th>
                                <th width="100" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>

                            @if($results->isNotEmpty())
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->model}}</td>
                                        <td>{{(!empty($row->category->name) ? $row->category->name : 'N/A')}}</td>
                                        <td>{{(!empty($row->subcategory->name) ? $row->subcategory->name : 'N/A')}}</td>
                                        <td>{{(!empty($row->brand->name) ? $row->brand->name : 'N/A')}}</td>
                                        <td>{{(!empty($row->unit->unit) ? $row->unit->unit : 'N/A')}}</td>
                                        <td>{{$row->purchase_price}}</td>
                                        <td>{{$row->sale_price}}</td>
                                        <td>{{strFilter($row->status)}}</td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="{{route('admin.product.edit', $row->id)}}" class="edit" title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.product.destroy', $row->id)}}" onclick="return confirm('Do you want to delete this data?')" class="delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
