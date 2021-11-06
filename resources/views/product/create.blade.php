@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('product.nav')

    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Product Add</h4>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.product.store')}}" method="POST">
                        @csrf
                        <div class="form-group row mt-3">
                            <label class="col-md-3 col-form-label text-right">Product Name</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Product Model</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="model" placeholder="Product Model">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Category</label>
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
                            <label class="col-form-label text-right col-3">Subcategory</label>
                            <div class="col-5">
                                <select name="subcategory_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected>Select Items</option>
                                    @if(!empty($subcategoryList) && $subcategoryList->isNotEmpty())
                                        @foreach($subcategoryList as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">brand</label>
                            <div class="col-5">
                                <select name="brand_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected>Select Items</option>
                                    @if(!empty($brandList) && $brandList->isNotEmpty())
                                        @foreach($brandList as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Purchase Price</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="purchase_price" value="0.00"
                                       placeholder="0.00">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-right">Sale Price</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="sale_price" value="0.00"
                                       placeholder="0.00">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Unit</label>
                            <div class="col-5">
                                <select name="unit_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected>Select Items</option>
                                    @if(!empty($unitList) && $unitList->isNotEmpty())
                                        @foreach($unitList as $item)
                                            <option value="{{$item->id}}">{{$item->unit}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-3">Status</label>
                            <div class="col-5">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="radio" name="status" value="available" id="option1" checked> Available
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="status" value="not_available" id="option2"> Not Available
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 text-right">
                                <button type="reset" class="btn reset_btn" name="reset">Reset</button>
                                <button type="submit" class="btn submit_btn" name="submit">Save</button>
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
