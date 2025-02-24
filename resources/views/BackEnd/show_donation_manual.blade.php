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
                                <li class="breadcrumb-item active text-capitalize">Donations</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Donations</h4>
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
        									<th>Address</th>
        									<th>Name</th>
        									<th>Email</th>
        									<th>Phone</th>
        									<th>DOB</th>
        									<th>Country</th>
        									<th>Donation type</th>
        									<th>Pan</th>
        									<th>AMOUNT</th>
        									<th>Payment Id</th>
        									<th>Donor Id</th>
        									<th>Addon</th>
        									<th>Action</th>
                                        </tr>
                                    </thead>


                                        <tbody>

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
    <h4 class="custom-modal-title">User address</h4>
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
	function deletedonation() {
		if (confirm("Are You Sure You Want TO Delete donation ?")) {
            return true;
		}
		return false;
	}
</script>
