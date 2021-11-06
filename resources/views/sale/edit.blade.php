@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('sale.nav')
        
        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Add Sale</h4>
                </div>
                <div class="panel_body">
                    <form action="" method="">
                        <div class="row">
                            <div class="col-md-8 pr-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Cash =</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2" placeholder="Cash" value="550.00" aria-label="Cash" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">B:K:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2" placeholder="B:K:" value="6697.00" aria-label="bk" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">M:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2" value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">H:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">A:G:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">P:T:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">The Rest</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">A:R:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">&nbsp;</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">-</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">haram</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO:</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                            <th>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">&nbsp;</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-4 pl-0">
                                <div class="h-100 border border-secondary d-flex justify-content-center align-items-center">
                                    <div class="text text-center">
                                        <h4>Freelance IT Lab</h4>
                                        <p>Date: 2021-08-07</p>
                                    </div>    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive table_bottom">
                                    <table class="table table-bordered mb-0">
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>
                                                <p class="pr-2 pl-2 mb-0 d-flex align-items-center justify-content-between">
                                                    <span>N.B</span>
                                                    <span>N.D</span>
                                                </p>
                                            </th>
                                            <th>
                                                <p class="pr-2 pl-2 mb-0 d-flex align-items-center justify-content-between">
                                                    <span>N.B</span>
                                                    <span>D.Y</span>
                                                </p>
                                            </th>
                                            <th>L</th>
                                            <th>P</th>
                                        </tr>
                                        <tr>
                                            <th>01</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>02</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>03</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>04</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>05</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>06</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>07</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>08</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>09</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>10</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive table_bottom">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="5%">91</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>95</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>D</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Retail</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">TO</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th rowspan="2">Tank</th>
                                            <td rowspan="2">
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td rowspan="2">
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                            <td>
                                               <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                            <td rowspan="2">
                                                <input type="text" class="form-control-plaintext pl-2"  value="0.00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">-</span>
                                                    </div>
                                                    <input type="text" class="form-control-plaintext pl-2"  value="0.00" aria-describedby="basic-addon1">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end pr-3">
                            <div class="form-group">
                                <div class="btn-group">
                                    <button type="submit" class="btn submit_btn" name="save">Save</button>
                                </div>
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
@push('header-style')
<style>
    table.table.table-bordered tr th, .table_bottom table.table tr td {
        padding: 0px !important;
    }
    .table_bottom table.table tr th {}
    .table_bottom table.table tr th {text-align: center; background: #eee;}
</style>
@endpush