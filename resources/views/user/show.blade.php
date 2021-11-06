@extends('layouts.backend')

@section('content')
    <!-- body container start -->
    <div class="body_container">
        @include('user.nav')
        <!-- body content start -->
        <div class="body_content">
            <div class="panel_container">
                <div class="panel_heading">
                    <h4>Profile</h4>
                </div>
                <div class="panel_body">
                    <div class="user_profile">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="profile_info">
                                    <div class="header_info">
                                        <div class="profile_img">
                                            <img class="file-upload-image" src="{{asset($info->avatar)}}" alt="">
                                            <span class="cover">
                                                <i class="fas fa-images"></i>
                                            </span>
                                            <input class="file-upload-input" type="file" name="avatar" accept="image/*">
                                        </div>
                                        <div class="title">
                                            <h5>{{$info->name}}</h5>
                                            <p>{{ date('F j Y', strtotime($info->created_at)) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile_info">
                                    <div class="profile_edit">
                                        <h4>Personal Information</h4>
                                        <a href="#" data-toggle="modal" data-target="#edit_modal" title="Edit">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </div>
                                    <ul>
                                        <li><strong>Name</strong>: {{$info->name}}</li>
                                        <li><strong>Username</strong>: {{$info->username}}</li>
                                        <li><strong>Email</strong>: {{$info->email}}</li>
                                        <li><strong>Mobile</strong>: {{$info->mobile}}</li>
                                        <li><strong>Address</strong>: {{$info->address}}</li>
                                    </ul>
                                </div>

                                <!-- edit modal -->
                                <div class="modal fade" id="edit_modal">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Personal Information</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- form content -->
                                                <form action="{{route('admin.user.update')}}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="id" value="{{$info->id}}">

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Full Name</label>
                                                            <input type="text" name="name" value="{{$info->name}}" class="form-control">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Mobile Number</label>
                                                            <input type="text" name="mobile" value="{{$info->mobile}}" class="form-control">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" name="email" value="{{$info->email}}" class="form-control">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Address</label>
                                                            <input type="text" name="address" value="{{$info->address}}" class="form-control">
                                                        </div>

                                                        @if(Auth::user()->privilege != 'user')
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Privilege</label>
                                                            <select name="privilege" class="form-control" required>
                                                                <option value="">Select Privilege</option>
                                                                @if(Auth::user()->privilege == 'super')
                                                                <option value="super" {{($info->privilege == 'super' ? 'selected' : '')}}>Super</option>
                                                                @endif
                                                                <option value="admin" {{($info->privilege == 'admin' ? 'selected' : '')}}>Admin</option>
                                                                <option value="user" {{($info->privilege == 'user' ? 'selected' : '')}}>User</option>
                                                            </select>
                                                        </div>
                                                        @else
                                                            <input type="hidden" name="privilege" value="{{$info->privilege}}">
                                                        @endif

                                                        <div class="form-group col-md-12 text-right">
                                                            <button type="submit" class="btn submit_btn">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-6">
                                <div class="password_form">
                                    <h4>Change Password</h4>
                                    <form action="{{route('admin.user.change-password')}}" method="POST">
                                        @csrf

                                        <input type="hidden" name="id" value="{{$info->id}}">

                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="password" name="current_password" placeholder="Old password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="password" name="password" placeholder="New password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" placeholder="Confirm password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn submit_btn">Change Password</button>
                                                    <button type="reset" class="btn reset_btn">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

@push('footer-script')
    <script>
        function cl(x){
            return document.getElementsByClassName(x);
        }
        /* image upload script start */
        var file_upload_input  = document.getElementsByClassName('file-upload-input'),
        file_upload_inputL = file_upload_input.length,
        i                  = 0;

        for(i; i<file_upload_inputL; i++){
            file_upload_input[i].setAttribute('onchange', "set_for_upload("+i+",this)");
        }
        function set_for_upload(index,e){
            var file                                       = URL.createObjectURL(e.files[0]);
            cl('file-upload-image')[index].src             = file;
        }
    </script>
@endpush
