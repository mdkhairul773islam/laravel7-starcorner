@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Privilege Heading</h4>
                </div>

                <div class="panel_body privilege_content">
                    <form action="#" method="POST">
                        <div class="form-row print_hide">
                            <div class="col-md-4">
                                <label class="form-label">Privilege Select</label>
                                <div class="form-group">
                                    <select id="setPrivilege" onchange="getUserList()" class="form-control">
                                        <option value="" selected>Select Privilege</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">User Select</label>
                                <div class="form-group">
                                    <select id="userList" onchange="getUserRoles()" class="form-control selectpicker" data-live-search="true">
                                        <option value="" selected>Select User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr style="margin-top: 0;">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" width="50">SL</th>
                                <th>Data Menu</th>
                                <th>Data Submenu</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">01</td>
                                <td>
                                    <div class="custom-control custom-switch main_menu">
                                        <input type="checkbox" data-menu="dashboard" class="custom-control-input" id="dashboard">
                                        <label class="custom-control-label" for="dashboard">Dashboard</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="dashboardAddPurchase">
                                        <label class="custom-control-label" for="dashboardAddPurchase">Add Purchase</label>
                                    </div>

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="dashboardAllPurchase">
                                        <label class="custom-control-label" for="dashboardAllPurchase">All Purchase</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">02</td>
                                <td>
                                    <div class="custom-control custom-switch main_menu">
                                        <input type="checkbox" class="custom-control-input" id="purchase_checked">
                                        <label class="custom-control-label" for="purchase_checked">Purchase</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="group_menu">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="purchase_new_checked">
                                            <label class="custom-control-label" for="purchase_new_checked">Purchase
                                                New</label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="purchase_records_checked">
                                            <label class="custom-control-label" for="purchase_records_checked">Purchase
                                                Records</label>
                                        </div>
                                        <div class="condition_group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="purchase_new_checked01">
                                                <label class="custom-control-label" for="purchase_new_checked01">Purchase
                                                    New</label>
                                            </div>
                                            <div class="condition_btn">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="purchase_records_edit">
                                                    <label class="custom-control-label"
                                                           for="purchase_records_edit">Edit</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="purchase_new_delete">
                                                    <label class="custom-control-label"
                                                           for="purchase_new_delete">Delete</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="purchase_records_checked02">
                                            <label class="custom-control-label" for="purchase_records_checked02">Purchase
                                                Records</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">03</td>
                                <td>
                                    <div class="custom-control custom-switch main_menu">
                                        <input type="checkbox" class="custom-control-input" id="sale_checked">
                                        <label class="custom-control-label" for="sale_checked">Sale</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="group_menu">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="sale_new_checked">
                                            <label class="custom-control-label" for="sale_new_checked">Sale New</label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="sale_records_checked">
                                            <label class="custom-control-label" for="sale_records_checked">Sale
                                                Records</label>
                                        </div>
                                        <div class="condition_group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="sale_new_checked01">
                                                <label class="custom-control-label" for="sale_new_checked01">Sale
                                                    New</label>
                                            </div>
                                            <div class="condition_btn">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="sale_records_edit">
                                                    <label class="custom-control-label"
                                                           for="sale_records_edit">Edit</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="sale_new_delete">
                                                    <label class="custom-control-label"
                                                           for="sale_new_delete">Delete</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="sale_records_checked02">
                                            <label class="custom-control-label" for="sale_records_checked02">Sale
                                                Records</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">04</td>
                                <td>
                                    <div class="custom-control custom-switch main_menu">
                                        <input type="checkbox" class="custom-control-input" id="pages_checked">
                                        <label class="custom-control-label" for="pages_checked">Pages</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="group_menu">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="pages_new_checked">
                                            <label class="custom-control-label" for="pages_new_checked">Pages
                                                New</label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="pages_records_checked">
                                            <label class="custom-control-label" for="pages_records_checked">Pages
                                                Records</label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="pages_new_checked01">
                                            <label class="custom-control-label" for="pages_new_checked01">Pages
                                                New</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
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
    <link rel="stylesheet" href="{{ asset('backend/style/privilege.css') }}">
@endpush

@push('footer-script')
    <script>

        // get all user
        function getUserList() {
            var privilege = $('#setPrivilege').val();
            if(privilege != ''){
                $('#userList').empty();
                $.post("{{route('admin.privilege.user-list')}}", {privilege: privilege, _token: '{{csrf_token()}}'}).done(function (data) {
                    $('#userList').append(data);
                    $('.selectpicker').selectpicker('refresh');
                });
            }
        }

        // get user role
        function getUserRoles() {
            var userId = $('#userList').val();
            if(userId != ''){
                $.post("{{route('admin.privilege.user-role')}}", {user_id: userId, _token: '{{csrf_token()}}'}).done(function (data) {

                    var result =  JSON.parse(data);





                    console.log(JSON.stringify(result.user_role));

                    /*$.each( result.user_role, function( key, value ) {

                        console.log(value);
                    });*/
                });
            }
        }
    </script>
@endpush
