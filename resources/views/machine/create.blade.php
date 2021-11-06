@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('machine.nav')

        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Machine</h4>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.machine.store')}}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Machine No</label>
                            <div class="col-md-5">
                                <input type="text" name="machine_no" placeholder="Machine No." class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Machine Type <span class="text-danger">*</span></label>
                            <div class="col-5">
                                <select name="machine_type" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="" selected>Select Items</option>
                                    <option value="Patrol">Patrol</option>
                                    <option value="Diesel">Diesel</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Reading No <span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="number" name="reading" class="form-control" min="0" placeholder="0" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Sale Price (per ltr) <span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="number" name="sale_price" class="form-control" step="any" min="0" placeholder="0" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Remarks</label>
                            <div class="col-md-5">
                                <textarea name="remarks" placeholder="Your Description" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 text-right">
                                {{--<button type="reset" class="btn reset_btn" name="reset">Reset</button>--}}
                                <button type="submit" class="btn submit_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel_footer"></div>
        </div>
        <!-- body content end -->
    </div>
    <!-- body container end -->
@endsection
