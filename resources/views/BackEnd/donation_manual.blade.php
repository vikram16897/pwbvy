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
                                <li class="breadcrumb-item active text-capitalize">Add Manual Donations</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Add Manual Donations</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12  col-xl-12">
                    <div class="card-box">
                        <form class="form-horizontal" action="https://www.pwbvyindia.org/master/donation/manual_add" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="table" value="tbl_donation" />
                            <input type="hidden" name="page" value="donation/manual" />

                            <h4 class="header-title mb-4">Manual Donation</h4>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">AMOUNT <span class="text-danger">*</span></label>
                                        <input type="text" name="AMOUNT" required="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" required="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" required="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="txtPhone" required="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">Address <span class="text-danger">*</span></label>
                                        <textarea type="text" name="address" required="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">Country <span class="text-danger">*</span></label>
                                        <input type="text" name="country" required="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">Donation type <span class="text-danger">*</span></label>
                                        <select name="Donationtype" required="" class="form-control">
                                            <option value="" title="Donation type">Select Donation type</option>
                                            <option value="One time" title="One time">One time</option>
    										<option value="Monthly" title="Monthly">Monthly</option>
    										<option value="Quarterly" title="Quarterly">Quarterly</option>
    										<option value="Half yearly" title="Half yearly">Half yearly</option>
    										<option value="Yearly" title="Yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">DOB <span class="text-danger">*</span></label>
                                        <input type="date" name="dob" required="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">Pan </label>
                                        <input type="text" name="txtpan"class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="userName">Payment Receipt <span class="text-danger">*</span></label>
                                        <input type="file" name="payment_receipt" class="dropify" accept="image/png, image/jpeg, image/jpg, image/gif"  data-max-file-size="1M" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right my-2">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
