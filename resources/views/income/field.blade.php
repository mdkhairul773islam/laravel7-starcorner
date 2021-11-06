@extends('layouts.backend')
@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('income.nav')
    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Income Field</h4>
                    <div class="">
                        <a href="#" class="print_btn" id="plus" data-toggle="modal" data-target="#addModal" data-whatever="@mdo">
                            <i class="fa fa-plus"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered list-table">
                            <tr>
                                <th width="30"> SL</th>
                                <th>Field Name</th>
                                <th>Income Category</th>
                                <th width="100" class="text-right print_hide">Action</th>
                            </tr>
                            @if($results->isNotEmpty())
                                @foreach($results as $key => $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->category}}</td>
                                    <td class="operation_btn text-right print_hide">
                                        <a href="#" onclick="editData('{{$row->id}}')" data-toggle="modal" data-target="#editModal"
                                            data-whatever="@mdo" class="edit" title="Edit">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.income.field-destroy', $row->id)}}"
                                            onclick="return confirm('Do you want to delete this data?')"
                                            class="delete" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <th colspan="4" class="text-center">No record found....!</th>
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

    <!-- field add modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form action="{{route('admin.income.field-store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Income Field</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Income Category</label>
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

                        <div class="form-group">
                            <label class="form-label">Income Field <span class="text-danger">*</span></label>
                            <input type="text" name="field" class="form-control modal_form" autocomplete="off" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn submit_btn" name="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- field edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form action="{{route('admin.product.field-update')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Income Field</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="fieldId" name="id">

                        <div class="form-group">
                            <label class="form-label">Income Category</label>
                            <div class="col-5">
                                <select id="category_id" name="category_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected>Select Items</option>
                                    @if(!empty($categoryList) && $categoryList->isNotEmpty())
                                        @foreach($categoryList as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Income Field <span class="text-danger">*</span></label>
                            <input type="text" id="fieldName" name="field" class="form-control modal_form" autocomplete="off" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn update_btn" name="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('footer-script')
    <script>
        function editData(id) {

            // set access token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // clear input data
            $('#fieldId').val('');
            $('#fieldName').val('');
            $('#category_id').val('');

            $.ajax({
                type: "POST",
                url: "{{route('admin.income.field-edit')}}",
                data: {id: id},
                dataType: 'json',
                success: function (response) {

                    // set input data
                    $('#fieldId').val(response.id);
                    $('#fieldName').val(response.name);
                    $('#category_id').val(response.category);
                },
            });
        }
    </script>
@endpush
