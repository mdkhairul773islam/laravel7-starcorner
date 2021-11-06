@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    @include('supplier.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Supplier</h4>
                    <a id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">

                    <form action="{{route('admin.supplier')}}" method="POST">
                        @csrf
                        <div class="form-row print_hide">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="id" class="form-control selectpicker" data-live-search="true">
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
                                    <button type="submit" class="btn submit_btn" name="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr class="mt-0">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th width="30">SL</th>
                                <th>Supplier Name</th>
                                <th>Contact Person</th>
                                <th>Mobile</th>
                                <th>Initial Balance</th>
                                <th>Current Balance</th>
                                <th width="125" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>

                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)

                                    @php($partyBalance = partyBalance($row->id))
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->contact_person}}</td>
                                        <td>{{$row->mobile}}</td>
                                        <td>{{$row->initial_balance}}</td>
                                        <td class="{{$partyBalance->status}}">{{$partyBalance->balance}}</td>

                                        <td class="operation_btn  print_hide text-right print_hide">
                                            <a href="{{route('admin.supplier.show', $row->id)}}" class="view"
                                               title="View">
                                                <i class="far fa-eye"></i>
                                            </a>

                                            <a href="{{route('admin.supplier.edit', $row->id)}}" class="edit"
                                               title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <a href="{{route('admin.supplier.destroy', $row->id)}}"
                                               onclick="return confirm('Do you want to delete this data?')"
                                               class="delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <th colspan=""></th>
                                </tr>
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
