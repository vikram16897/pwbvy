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
                                <li class="breadcrumb-item active text-capitalize">Slider</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Slider</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-10 col-xl-8">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">

                                @if (Route::current()->getName() == 'admin_add_slider')

                                <form class="form-horizontal" action="{{ route("add.create_slider") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="table" value="tbl_slider" />
                                    <input type="hidden" name="page" value="slider/create" />

                                    <h4 class="header-title mb-4">Photo (1440px X 590px) </h4>
                                    <input type="file" name="photo" class="dropify" accept="image/png, image/jpeg, image/jpg, image/gif"  data-max-file-size="1M" />

                                    <h4 class="header-title my-4">Title</h4>
                                    <div class="form-group">
                                        <input type="text" name="title" required="" class="form-control"  />
                                    </div>

                                    <h4 class="header-title my-4">Link URL</h4>
                                    <div class="form-group">
                                        <input type="text" name="button_url" required="" class="form-control" />
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
                                        <a href="master/slider/" class="btn float-right m-2 btn-secondary" title="">Back</a>
                                    </div>

                                </form>

                                @elseif (Route::current()->getName() == 'admin_edit_slider')

                                <form class="form-horizontal" action="{{ route("edit.admin_edit_slider") }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-12" hidden>
                                        <input type="text" name="id" value="{{ $sliderEdit['id'] }}">
                                    </div>
                                    {{-- <input type="hidden" name="table" value="tbl_slider" />
                                    <input type="hidden" name="page" value="slider/create" /> --}}

                                    <h4 class="header-title mb-4">Photo (1440px X 590px) </h4>
                                    <input type="file" name="photo" class="dropify" accept="image/png, image/jpeg, image/jpg, image/gif" data-default-file="{{ asset('public/assets/uploads/website/slider/'.$sliderEdit['photo']) }}"  data-max-file-size="1M" />

                                    <h4 class="header-title my-4">Title</h4>
                                    <div class="form-group">
                                        <input type="text" name="title" required="" value="{{ $sliderEdit['title'] }}" class="form-control"  />
                                    </div>

                                    <h4 class="header-title my-4">Link URL</h4>
                                    <div class="form-group">
                                        <input type="text" name="button_url" required="" value="{{ $sliderEdit['button_url'] }}" class="form-control" />
                                    </div>

                                    <h4 class="header-title">Status</h4>
                                    <div class="form-group mb-5">
                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status" @if($sliderEdit['status'] == 1) checked @endif >
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status" @if($sliderEdit['status'] == 0) checked @endif >
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right m-2">Submit</button>
                                        <a href="master/slider/" class="btn float-right m-2 btn-secondary" title="">Back</a>
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
