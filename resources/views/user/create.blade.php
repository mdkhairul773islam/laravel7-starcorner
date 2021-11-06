@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
    @include('user.nav')
    <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Create New User</h4>
                </div>
                <div class="panel_body">
                    <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="user_profile">
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="profile_info">
                                        <div class="header_info">
                                            <span class="profile_img">
                                                <img class="file-upload-image" src="{{asset('public/backend')}}/images/user/01.png" alt="">
                                                <span class="cover">
                                                    <i class="fas fa-images"></i>
                                                </span>
                                                <input class="file-upload-input" type="file" name="avatar" accept="image/*">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <div class="password_form">
                                        <h4>Your Information</h4>
                                        <form action="#" method="POST">
                                            <div class="form-group row">
                                                <label class="col-form-label text-md-right required col-md-3">Full
                                                    Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" placeholder="Your Full Name"
                                                           class="form-control" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-md-right col-md-3">Mobile</label>
                                                <div class="col-md-9">
                                                    <input type="tel" name="mobile" placeholder="Without +88"
                                                           class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-md-right col-md-3">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" name="email" placeholder="Your Email Address"
                                                           class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-md-right col-md-3">Address</label>
                                                <div class="col-md-9">
                                                    <textarea name="address" class="form-control"
                                                              placeholder="Add Your Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-form-label text-md-right required col-md-3 ">Username</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="username"
                                                           placeholder="lower Case & No Space" class="form-control"
                                                           autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-form-label text-md-right required col-md-3">Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password" placeholder="Password"
                                                           autocomplete="off" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-md-right required col-md-3">Confirm
                                                    Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password_confirmation"
                                                           placeholder="Confirm password" class="form-control"
                                                           autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-form-label text-md-right required col-md-3">Privilege</label>
                                                <div class="col-md-9">
                                                    <select name="privilege" class="form-control" required>
                                                        <option value="" selected>Select Privilege</option>
                                                        {{--<option value="super">Super</option>--}}
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 text-right">
                                                    <button type="submit" class="btn submit_btn">Submit</button>
                                                    <button type="reset" class="btn reset_btn">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
    <link rel="stylesheet" href="{{asset('backend')}}/style/profile.css">
    <style>
        .user_profile .header_info {
            justify-content: center;
        }

        .user_profile .profile_img {
            max-width: 185px;
            width: 100%;
            height: 185px;
            margin-right: 0px;
        }

        .user_profile h4 {
            border-bottom: 1px solid #303F9F85;
            padding-bottom: 10px;
        }
    </style>
@endpush

@push('footer-script')
    <script>
       /* function cl(x) {
            return document.getElementsByClassName(x);
        }

        /!* image upload script start *!/
        var file_upload_input = document.getElementsByClassName('file-upload-input'),
            file_upload_inputL = file_upload_input.length,
            i = 0;

        for (i; i < file_upload_inputL; i++) {
            file_upload_input[i].setAttribute('onchange', "set_for_upload(" + i + ",this)");
        }

        function set_for_upload(index, e) {
            var file = URL.createObjectURL(e.files[0]);
            cl('file-upload-image')[index].src = file;
        }*/
    </script>
@endpush
