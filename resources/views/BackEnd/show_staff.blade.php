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
                                <li class="breadcrumb-item active text-capitalize">Staff</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Staff</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
							    <table id="key-table" class="table table-bordered dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>S.no.</th>
            								<th>Full Name</th>
            								<th>Email</th>
            								<th>Phone</th>
            								<th>Status</th>

            							    <th>Action</th>
                                        </tr>
                                    </thead>


                                        <tbody>

																        <tr>
                                            <td>1</td>

                                                <td>Test</td>
                                                <td>test@test.com</td>
                                                <td>9939000000</td>
                                                <td>Active</td>




                                          	<td>
        									    <a href="https://www.pwbvyindia.org/master/Staff/edit/2" class="btn btn-primary btn-sm" title="Edit">
        									        <i class="far fa-edit"></i> Edit
        									    </a>
									            <form class="form-horizontal" onsubmit="return StaffDelete();" action="https://www.pwbvyindia.org/master/Staff/delete" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="pid" value="2" />
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
        										</form>
        									</td>
        								</tr>
																							</tbody>
							</table>
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
<script type="text/javascript">
	function StaffDelete() {
		if (confirm("Are You Sure You Want TO Delete Staff ?")) {
            return true;
		}
		return false;
	}
</script>
