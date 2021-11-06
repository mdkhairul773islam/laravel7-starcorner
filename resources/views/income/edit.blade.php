@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('income.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Edit Income</h4>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.income.update')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Showroom</label>
                            <div class="col-5">
                                <select name="showroom_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected>Select Showroom</option>
                                    <option value="">Option One</option>
                                    <option value="">Option Two</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Income Category</label>
                            <div class="col-5">
                                <select name="category_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected>Select Items</option>
                                    @if(!empty($categoryList) && $categoryList->isNotEmpty())
                                        @foreach($categoryList as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Income Field</label>
                            <div class="col-5">
                                <select name="field_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected>Select Items</option>
                                    @if(!empty($fieldList) && $fieldList->isNotEmpty())
                                        @foreach($fieldList as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-3">Description</label>
                            <div class="col-5">
                                <textarea name="description" class="form-control" placeholder="Description" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label class="col-3 col-form-label text-right">Amount</label>
                            <div class="col-5">
                                <input type="number" class="form-control" name="amount" placeholder="0.00" value="0.00">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label class="col-3 col-form-label text-right">Income By</label>
                            <div class="col-5">
                                <input type="text" class="form-control" name="incomeby" placeholder="Income By">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 text-right">
                                <button type="reset" class="btn reset_btn" name="reset">Reset</button>
                                <button type="submit" class="btn submit_btn" name="submit">Submit</button>
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