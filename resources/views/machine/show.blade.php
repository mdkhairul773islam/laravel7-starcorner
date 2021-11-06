@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">

        @include('machine.nav').

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Show Details</h4>
                    <a href="#" id="print"><i class="icon ion-md-print"></i> Print</a>
                </div>
                <div class="panel_body">

                </div>
                <div class="panel_footer"></div>
            </div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection
