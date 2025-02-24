@extends("BackEnd.layout.main")
@section("main-section")
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikash Yojana</a></li>
                                <li class="breadcrumb-item active text-capitalize">Team Member</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Team Member</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-10 col-xl-8">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (Route::current()->getName() == 'admin_add_team_member')

                                <form class="form-horizontal" action="{{ route("add.create_team_member") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <input type="hidden" name="table" value="tbl_Guest_member" />
                                    <input type="hidden" name="page" value="Guest_member/create" /> --}}

                                    <h4 class="header-title mb-4">Photo </h4>
                                    <input type="file" name="photo" class="dropify" accept="image/png, image/jpeg, image/jpg, image/gif"  data-max-file-size="1M" />

                                    <h4 class="header-title my-4">Title</h4>
                                    <div class="form-group">
                                        <input type="text" name="title" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Description</h4>
                                    <div class="form-group">
                                        <textarea name="description" required="" class="form-control" ></textarea>
                                    </div>

                                    <h4 class="header-title">Status</h4>
                                    <div class="form-group mb-5">
                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status">
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status">
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right m-2">Submit</button>
                                        <a href="#" class="btn float-right m-2 btn-secondary" title="">Back</a>
                                    </div>

                                </form>


                                @elseif (Route::current()->getName() == 'admin_edit_team_member')
                                <form class="form-horizontal" action="{{ route("edit.admin_edit_team_member") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <input type="hidden" name="table" value="tbl_Guest_member" />
                                    <input type="hidden" name="page" value="Guest_member/create" /> --}}
                                    <input type="hidden" name="id" value="{{ $Team_MemberEdit['id'] }}">

                                    <h4 class="header-title mb-4">Photo </h4>
                                    <input type="file" name="photo" class="dropify" accept="image/png, image/jpeg, image/jpg, image/gif" data-default-file="{{ asset('public/assets/uploads/website/Guest_member/'.$Team_MemberEdit['photo']) }}"  data-max-file-size="1M" />

                                    <h4 class="header-title my-4">Title</h4>
                                    <div class="form-group">
                                        <input type="text" name="title" required="" value="{{ $Team_MemberEdit['title'] }}" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Description</h4>
                                    <div class="form-group">
                                        <textarea name="description" required=""  class="form-control" >{{ $Team_MemberEdit['description'] }}</textarea>
                                    </div>

                                    <h4 class="header-title">Status</h4>
                                    <div class="form-group mb-5">
                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status" @if($Team_MemberEdit['status'] == 1) checked @endif >
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status"  @if($Team_MemberEdit['status'] == 0) checked @endif>
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right m-2">Submit</button>
                                        <a href="#" class="btn float-right m-2 btn-secondary" title="">Back</a>
                                    </div>

                                </form>

                                @endif
				            </div>
					    </div>
					</div>
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

   @endsection("main-section")
