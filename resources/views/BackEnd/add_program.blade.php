
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
                                <li class="breadcrumb-item active text-capitalize">Program</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Program</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-10 col-xl-8">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">

                                @if (Route::current()->getName() == 'admin_program')

                                <form class="form-horizontal" action="{{ route("add.admin_program") }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <h4 class="header-title mb-4">Photo </h4>
                                    <input type="file" name="photo" class="dropify"  required data-max-file-size="3M" />

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
                                        <button type="reset" class="btn float-right m-2 btn-secondary">Block</button>
                                    </div>

                                </form>

                                @elseif (Route::current()->getName() == 'admin_edit_program')

                                <form class="form-horizontal" action="{{ route("edit.admin_edit_program") }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $program_edit['id'] }}">

                                    <h4 class="header-title mb-4">File </h4>
                                    <input type="file" name="photo" class="dropify" data-max-file-size="3M" data-default-file="{{ asset('public/assets/uploads/website/services/'.$program_edit['photo']) }}" />

                                    <h4 class="header-title my-4">Title</h4>
                                    <div class="form-group">
                                        <input type="text" name="title" value="{{ $program_edit['title'] }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Description</h4>
                                    <div class="form-group">
                                        <textarea name="description" required="" class="form-control" >
                                            {{ $program_edit['description'] }}
                                        </textarea>
                                    </div>

                                    <h4 class="header-title">Status</h4>
                                    <div class="form-group mb-5">
                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status" @if($program_edit['status'] == 1) checked @endif>
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status" @if($program_edit['status'] == 0) checked @endif>
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right m-2">Submit</button>
                                        <button type="reset" class="btn float-right m-2 btn-secondary">Block</button>
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
