@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    @include('machine.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All Machine</h4>
                    <a href="#" id="print" class="print_btn"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th width="30">SL</th>
                                <th>Machine No.</th>
                                <th>Machine Type</th>
                                <th>Reading</th>
                                <th>Sale Price (per ltr)</th>
                                <th>Remark</th>
                                <th width="100" class="text-right print_hide">Action</th>
                            </tr>
                            </thead>
                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$row->machine_no}}</td>
                                        <td>{{$row->machine_type}}</td>
                                        <td>{{$row->reading}}</td>
                                        <td>{{$row->sale_price}}</td>
                                        <td>{{$row->remarks}}</td>
                                        <td class="operation_btn text-right print_hide">
                                            <a href="{{route('admin.machine.edit', $row->id)}}" class="edit"
                                               title="Edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.machine.destroy', $row->id)}}"
                                               onclick="return confirm('Do you want to delete this data?')"
                                               class="delete" title="Delete">
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
