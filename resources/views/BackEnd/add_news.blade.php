
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
                                <li class="breadcrumb-item active text-capitalize">News</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">News</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
                                @if(Route::current()->getName() == "admin_add_news")
                                <form class="form-horizontal" action="{{ route('add.admin_add_news') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="header-title mb-4">News</h4>
                                    <div class="form-group">
                                        <label for="userName">News <span class="text-danger">*</span></label>
                                        <textarea name="news" required="" class="form-control"></textarea>
                                    </div>


            					        <div class="col-sm-6">
                                            <div class="form-group mb-5">
                                                <div class="col-sm-12"><label for="" class="control-label">Status <span>*</span></label></div>
                                                <div class="custom-control custom-radio float-left">
                									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status">
                									<label for="statusActive" class="custom-control-label">Active</label>
                								</div>
                								<div class="custom-control custom-radio float-left ml-3">
                									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status">
                									<label for="statusBlock" class="custom-control-label">Block</label>
                								</div>
                                            </div>
            					        </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right my-2">Submit</button>
                                    </div>

                                </form>

                                @elseif (Route::current()->getName() == "admin_edit_news")
                                <form class="form-horizontal" action="{{ route('edit.admin_edit_news') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $newsEdit['id'] }}" />
                                    <h4 class="header-title mb-4">News</h4>
                                    <div class="form-group">
                                        <label for="userName">News <span class="text-danger">*</span></label>
                                        <textarea name="news" required=""  value="" class="form-control">{{ $newsEdit['news'] }}</textarea>
                                    </div>


            					        <div class="col-sm-6">
                                            <div class="form-group mb-5">
                                                <div class="col-sm-12"><label for="" class="control-label">Status <span>*</span></label></div>
                                                <div class="custom-control custom-radio float-left">
                									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status" @if($newsEdit['status'] == 1) checked @endif>
                									<label for="statusActive" class="custom-control-label">Active</label>
                								</div>
                								<div class="custom-control custom-radio float-left ml-3">
                									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status" @if($newsEdit['status'] == 0) checked @endif>
                									<label for="statusBlock" class="custom-control-label">Block</label>
                								</div>
                                            </div>
            					        </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right my-2">Submit</button>
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
