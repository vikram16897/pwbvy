
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
                                <li class="breadcrumb-item active text-capitalize">Requirement</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Requirement</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-10 col-xl-8">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (Route::current()->getName() == 'admin_add_requirement')

                                <form class="form-horizontal" action="{{ route("add.admin_add_requirement") }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <h4 class="header-title my-4">Post Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="post1" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Sallery</h4>
                                    <div class="form-group">
                                        <input type="number" name="sallery" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Vacancy</h4>
                                    <div class="form-group">
                                        <input type="text" name="blank_place" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Qualification</h4>
                                    <div class="form-group">
                                        <input type="text" name="qualification" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Registration Charge</h4>
                                    <div class="form-group">
                                        <input type="text" name="reg_charge" required="" class="form-control" />
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
                                        <a href="{{ route("admin_show_requirement") }}" class="btn float-right m-2 btn-secondary" title="">Back</a>
                                    </div>

                                </form>

                                @elseif (Route::current()->getName() == 'admin_edit_requirement')
                                <form class="form-horizontal" action="{{ route("edit.admin_edit_requirement") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $requirementEdit['id'] }}" name="id">
                                    <h4 class="header-title my-4">Post Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="post1" required="" value="{{ $requirementEdit['post1'] }}" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Sallery</h4>
                                    <div class="form-group">
                                        <input type="number" name="sallery" required="" value="{{ $requirementEdit['sallery'] }}" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Vacancy</h4>
                                    <div class="form-group">
                                        <input type="text" name="blank_place" required="" class="form-control" value="{{ $requirementEdit['blank_place'] }}" />
                                    </div>

                                    <h4 class="header-title my-4">Qualification</h4>
                                    <div class="form-group">
                                        <input type="text" name="qualification" required="" class="form-control"  value="{{ $requirementEdit['qualification'] }}" />
                                    </div>

                                    <h4 class="header-title my-4">Registration Charge</h4>
                                    <div class="form-group">
                                        <input type="text" name="reg_charge"  value="{{ $requirementEdit['reg_charge'] }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title">Status</h4>
                                    <div class="form-group mb-5">
                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status" @if($requirementEdit['status'] == 1) checked @endif>
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status" @if($requirementEdit['status'] == 0) checked @endif>
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right m-2">Submit</button>
                                        <button type="reset" class="btn float-right m-2 btn-secondary">reset</button>
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
