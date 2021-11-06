@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('supplier.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Edit Supplier</h4>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.supplier.update')}}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{$info->id}}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Supplier Name</label>
                            <div class="col-md-5">
                                <input type="text" name="name" value="{{$info->name}}" placeholder="Supplier Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Contact Person</label>
                            <div class="col-md-5">
                                <input type="text" name="contact_person" value="{{$info->contact_person}}" placeholder="Contact Person" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Mobile</label>
                            <div class="col-md-5">
                                <input type="tel" name="mobile" value="{{$info->mobile}}" placeholder="Without +88" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-3">Address</label>
                            <div class="col-md-5">
                                <textarea name="address" class="form-control" placeholder=""> {{$info->address}} </textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-md-3">Remarks</label>
                            <div class="col-md-5">
                                <textarea name="remarks" class="form-control" placeholder=""> {{$info->remarks}} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Initial Balance (TK)</label>
                            <div class="col-md-3">
                                <input type="number" name="initial_balance" value="{{(abs($info->initial_balance))}}" placeholder="Initial Balance (TK)" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <select name="balance_status" class="form-control" data-live-search="true">
                                    <option value="payable" {{($info->initial_balance < 0 ? 'selected' : '')}}>Payable</option>
                                    <option value="receivable" {{($info->initial_balance >= 0 ? 'selected' : '')}}>Receivable</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 text-right">
                                <button type="submit" class="btn submit_btn" name="submit">Update</button>
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
