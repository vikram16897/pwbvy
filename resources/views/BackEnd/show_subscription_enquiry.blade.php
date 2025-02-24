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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">PragatiWad Bal Vikas Yojana</a></li>
                                <li class="breadcrumb-item active text-capitalize">Subscription Enquiry</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Subscription Enquiry</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">
							    <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
        									<th>Full Name</th>
        									<th>Phone</th>
        									<th>Email ID</th>
        									<th>Address</th>
        									<th>Referred ID</th>
        									<th>Addon</th>
        									<th>Status</th>
        									<th>Action</th>
                                        </tr>
                                    </thead>


                                        <tbody>

																									        <tr>
                                            <td>1</td>
        									<td>Sonu Kumar</td>
        									<td>9939527762</td>
        									<td>chandrabhushan1225@gmail.com</td>
        									<td>
        									    <a href="#custom-modal" class="btn btn-info btn-sm waves-effect waves-light"  onclick="viewaddress('#address_1')" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">View address</a>
        									    <input type="hidden" id="address_1" value="test">
        									</td>
        									<td>1234567</td>
        									<td>08 Apr 2021 08:12:34 AM</td>
        									<td>
        										        											<span class="badge badge-success">Active</span>
        										        									</td>
        									<td class="text-center">
        									    <div class="row">
        									        <div class="col-sm-12">
        									            <form class="form-horizontal" onsubmit="return deleteenquiry();" action="https://www.pwbvyindia.org/master/action/delete" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="table" value="tbl_enquiry" />
                                                            <input type="hidden" name="page" value="Subscription Enquiry" />
                                                            <input type="hidden" name="id" value="1" />

                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
                										</form>
        									        </div>
        									    </div>
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
<!-- Modal -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Subscriber Address</h4>
    <div class="custom-modal-text text-muted overflow-y-auto mb-3" id="address_data"></div>
</div>
<style>
    .overflow-y-auto{
        overflow-y: auto;
        max-height: 300px;
    }
</style>
<script type="text/javascript">
    function viewaddress(id) {
        var val = $(id).val();
        $("#address_data").html(val);
    }
</script>

<script type="text/javascript">
	function deleteenquiry() {
		if (confirm("Are You Sure You Want TO Delete Subscription Enquiry ?")) {
            return true;
		}
		return false;
	}
</script>
