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
                                <li class="breadcrumb-item active text-capitalize">Vendor</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Vendor</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action="https://www.pwbvyindia.org/master/vendor/add" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="table" value="tbl_vendor" />
                                    <input type="hidden" name="page" value="vendor/create" />
                                    <input type="hidden" name="addon" value="2023-11-22 11:48:24" />

                                    <h4 class="header-title mb-4">Vendor</h4>
                                    <div class="form-group">
                                        <label for="ShopName">Shop Name <span class="text-danger">*</span></label>
                                        <input type="text" name="shop_name" required="" class="form-control" />
                                        <input type="hidden" name="unique_vendor_id" required="" value="PST221123114824" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="userName">Owner Name <span class="text-danger">*</span></label>
                                        <input type="text" name="owner_name" required="" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="userName">Mobile No. <span class="text-danger">*</span></label>
                                        <input type="tel" name="mobile_no" pattern="[0-9]{10}" placeholder="1234567890" required="" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="userName">Email Id <span class="text-danger">*</span></label>
                                        <input type="email" name="email" required="" placeholder="example@gmail.com" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label for="userName">Address <span class="text-danger">*</span></label>
                                        <textarea type="text" name="address" rows="3" required="" class="form-control"></textarea>
                                    </div>

                                    <div class="col-sm-12"><label for="" class="control-label">Status <span>*</span></label></div>
            					        <div class="col-sm-12 mb-2">
                                            <div class="form-group mb-1">
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

                                    <div class="form-group text-right">
                                        <a href="https://www.pwbvyindia.org/master/vendor" class="btn btn-dark my-3">Back</a>
                                        <button type="submit" class="btn btn-success my-3">Submit</button>
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
