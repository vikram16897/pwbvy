@extends("BackEnd.layout.main")
@section("main-section")
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">                    <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">PragatiWad Bal Vikas Yojana</a></li>
                                            <li class="breadcrumb-item active text-capitalize">profile</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title text-uppercase">profile</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="nav flex-column border-right nav-pills nav-pills-tab" id="tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link show mb-2 active" id="full_name-tab" data-toggle="pill" href="#full_name" role="tab" aria-controls="full_name" aria-selected="true">
                                                    Update Information</a>
                                                <a class="nav-link show mb-2" id="photo-tab" data-toggle="pill" href="#photo" role="tab" aria-controls="Photo" aria-selected="false">
                                                    Update Profile Photo</a>
                                                <a class="nav-link mb-2" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                                    Update Password</a>
                                            </div>
                                        </div> <!-- end col-->
                                        <div class="col-sm-9">
                                            <div class="tab-content text-muted pt-0">
                                                <div class="tab-pane fade active show" id="full_name" role="tabpanel" aria-labelledby="full_name-tab">
                                                    <form class="form-horizontal" action="{{ route("edit.admin_profile_update") }}" method="post" enctype="multipart/form-data">
                                                        {{-- <input type="hidden" name="table" value="tbl_user" />
                                                        <input type="hidden" name="page" value="profile/profile/1" /> --}}
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ Auth::User()->id }}">
                                                        <input type="hidden" name="sec" value="1">

                                                        <h4 class="header-title mb-4">Update Information</h4>

                                                        <div class="form-group">
                                                            <label for="userName"> Full Name<span class="text-danger">*</span></label>
                                                            <input name="full_name" required="" class="form-control" value="{{ Auth::User()->full_name }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="userName"> Email<span class="text-danger">*</span></label>
                                                            <input name="email" required="" class="form-control" value="{{ Auth::User()->email }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="userName"> Phone Number<span class="text-danger">*</span></label>
                                                            <input name="phone" required="" class="form-control" value="{{ Auth::User()->phone }}">
                                                        </div>


                                                        <button type="submit" class="btn btn-success float-right my-2">Update</button>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                                                    <form class="form-horizontal" action="{{ route("edit.admin_profile_update") }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        {{-- <input type="hidden" name="table" value="tbl_user" />
                                                        <input type="hidden" name="page" value="profile/profile/1" /> --}}
                                                        <input type="hidden" name="id" value="{{ Auth::User()->id }}" />
                                                        <input type="hidden" name="sec" value="2" />

                                                        <h4 class="header-title mb-4">User Photo</h4>
                                                        <input type="file" name="photo" class="dropify" data-default-file="{{ asset('public/BackEnd/uploads/master/user/'.Auth::User()->photo) }}" data-max-file-size="1M" />
                                                        <button type="submit" class="btn btn-success float-right my-2">Update Photo</button>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                                    <form class="form-horizontal" action="{{ route("edit.admin_profile_update") }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        {{-- <input type="hidden" name="table" value="tbl_user" />
                                                        <input type="hidden" name="page" value="profile/profile/1" /> --}}

                                                        <input type="hidden" name="id" value="{{ Auth::User()->id }}">
                                                        <input type="hidden" name="sec" value="3" />

                                                        <h4 class="header-title mb-4">Update Password</h4>

                                                        <div class="form-group">
                                                            <label for="userName"> Enter New Password<span class="text-danger">*</span></label>
                                                            <input name="password" required="" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="userName"> Confirm New Password<span class="text-danger">*</span></label>
                                                            <input name="password2" required="" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="userName"> Enter Old Password<span class="text-danger">*</span></label>
                                                            <input name="password3" required="" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success float-right my-2">Update</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- end col-->
                                    </div> <!-- end row-->
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- end container-fluid -->
                </div> <!-- end content -->


@endsection("main-section")
