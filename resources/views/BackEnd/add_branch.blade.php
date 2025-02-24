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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikas Yojana</a></li>
                                <li class="breadcrumb-item active text-capitalize">Branch</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Branch</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-10 col-xl-8">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (Route::current()->getName() == 'admin_add_branch')
                                <form class="form-horizontal" action="{{ route("add.admin_add_branch") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <input type="hidden" name="table" value="tbl_branch" />
                                    <input type="hidden" name="page" value="branch/create" /> --}}
                                    {{-- <input type="hidden" name="id" > --}}

                                    <h4 class="header-title my-4">Center code</h4>
                                    <div class="form-group">
                                        <input type="text" name="c_code" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Ward number</h4>
                                    <div class="form-group">
                                        <input type="text" name="w_num" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Place</h4>
                                    <div class="form-group">
                                        <input type="text" name="place" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Panchayat</h4>
                                    <div class="form-group">
                                        <input type="text" name="panchayat" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Prakhand</h4>
                                    <div class="form-group">
                                        <input type="text" name="prakhand" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Sevika</h4>
                                    <div class="form-group">
                                        <input type="text" name="sevika" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Shayika</h4>
                                    <div class="form-group">
                                        <input type="text" name="shayika" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Supervisor</h4>
                                    <div class="form-group">
                                        <input type="text" name="supervisor" required="" class="form-control" />
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
                                        <button type="reset" class="btn float-right m-2 btn-secondary">Back</button>

                                    </div>

                                </form>
                                @elseif (Route::current()->getName() == 'admin_edit_branch')
                                <form class="form-horizontal" action="{{ route("edit.admin_edit_branch") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <input type="hidden" name="table" value="tbl_branch" />
                                    <input type="hidden" name="page" value="branch/create" /> --}}
                                    <input type="hidden" name="id" value="{{ $branchEdit->id }}">

                                    <h4 class="header-title my-4">Center code</h4>
                                    <div class="form-group">
                                        <input type="text" name="c_code" value="{{ $branchEdit->c_code }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Ward number</h4>
                                    <div class="form-group">
                                        <input type="text" name="w_num" value="{{ $branchEdit->w_num }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Place</h4>
                                    <div class="form-group">
                                        <input type="text" name="place" value="{{ $branchEdit->place }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Panchayat</h4>
                                    <div class="form-group">
                                        <input type="text" name="panchayat" value="{{ $branchEdit->panchayat }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Prakhand</h4>
                                    <div class="form-group">
                                        <input type="text" name="prakhand" value="{{ $branchEdit->prakhand }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Sevika</h4>
                                    <div class="form-group">
                                        <input type="text" name="sevika" value="{{ $branchEdit->sevika }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Shayika</h4>
                                    <div class="form-group">
                                        <input type="text" name="shayika" value="{{ $branchEdit->shayika }}" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Supervisor</h4>
                                    <div class="form-group">
                                        <input type="text" value="{{ $branchEdit->supervisor }}" name="supervisor" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title">Status</h4>
                                    <div class="form-group mb-5">
                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status" @if($branchEdit->status == 1) checked @endif>
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status" @if($branchEdit->status == 0) checked @endif>
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right m-2">Submit</button>
                                        <button type="reset" class="btn float-right m-2 btn-secondary">Back</button>

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
