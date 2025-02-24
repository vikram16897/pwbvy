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
                                <li class="breadcrumb-item active text-capitalize">Faq</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Faq</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action="https://www.pwbvyindia.org/master/action/create" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="table" value="tbl_faq" />
                                    <input type="hidden" name="page" value="faq/create" />

                                    <h4 class="header-title mb-4">Faq</h4>
                                    <div class="form-group">
                                        <label for="userName">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="faq_title" required="" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="userName">Content <span class="text-danger">*</span></label>
                                        <textarea type="text" name="faq_content" id="summernote" required="" class="form-control"></textarea>
                                    </div>


                                    <div class="form-group">

                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" id="statusActive" name="status" />
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" id="statusBlock" name="status" />
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right my-2">Submit</button>
                                    </div>

                                </form>
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
