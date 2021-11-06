@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

    @include('user.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>All User</h4>
                    <a href="#" id="print" class="print_btn">
                        <i class="icon ion-md-print"></i> Print
                    </a>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <thead>
                            <tr>
                                <th width="30">SL</th>
                                <th width="60">Photo</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Username</th>
                                <th>Privilege</th>
                                <th class="text-right print_hide" width="100">Action</th>
                            </tr>
                            </thead>

                            @if(!empty($results) && $results->isNotEmpty())
                                @foreach($results as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td class="img">
                                            <img src="{{asset($row->avatar)}}" alt="">
                                        </td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->mobile}}</td>
                                        <td>{{$row->address}}</td>
                                        <td>{{$row->username}}</td>
                                        <td>{{strFilter($row->privilege)}}</td>
                                        <td class="operation_btn text-right print_hide">

                                            <a href="{{route('admin.user.show', $row->id)}}" class="view" title="View">
                                                <i class="far fa-eye"></i>
                                            </a>

                                            <a href="{{route('admin.user.destroy', $row->id)}}" onclick="return confirm('Do you want to delete this data?')" class="delete" title="Delete">
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
@push('header-style')
    <link rel="stylesheet" href="{{asset('backend')}}/style/profile.css">
@endpush
