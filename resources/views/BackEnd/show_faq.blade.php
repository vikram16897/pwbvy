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
							    <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="30%">#ID</th>
        									<th>Title</th>
        									<!--<th>Content</th>-->
        									<th>Status</th>
        									<th>Action</th>
                                        </tr>
                                    </thead>


                                        <tbody>

																									        <tr>
                                            <td> 1</td>
        									<td>Registration</td>
        									<!--<td><p>How do I registration?</p><p>Click sign in button in right top </p></td>-->
        									<td>
        										        											<span class="badge badge-success">Active</span>
        										        									</td>
        									<td>
        									    <div class="row">
        									        <div class="col-sm-6 text-right"><a href="https://www.pwbvyindia.org/master/faq/edit/1" class="btn btn-primary btn-sm" title="Edit"><i class="far fa-edit"></i> Edit</a></div>
        									        <div class="col-sm-6 text-left">
        									            <form class="form-horizontal" onsubmit="return deletefaq();" action="https://www.pwbvyindia.org/master/action/delete" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="table" value="tbl_faq" />
                                                            <input type="hidden" name="page" value="faq" />
                                                            <input type="hidden" name="id" value="1" />
                                                            <input type="hidden" name="column" value="faq_id" />

                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
                										</form>
        									        </div>
        									    </div>
        									</td>
        								</tr>
																        <tr>
                                            <td> 2</td>
        									<td>How do I Register</td>
        									<!--<td><p>You can register by clicking on the "<b>Sign In</b>" section located at the top right corner on the home page &amp; Click on <b>REGISTER</b> then Please enter your Mobile Number and click on<b> CREATE YOUR ACCOUNT</b>. We will send a one-time password (OTP) to verify your mobile number. Post verification, you can start shopping on <b>Anoopkirana</b>.&nbsp;<br></p></td>-->
        									<td>
        										        											<span class="badge badge-danger">Block</span>
        										        									</td>
        									<td>
        									    <div class="row">
        									        <div class="col-sm-6 text-right"><a href="https://www.pwbvyindia.org/master/faq/edit/2" class="btn btn-primary btn-sm" title="Edit"><i class="far fa-edit"></i> Edit</a></div>
        									        <div class="col-sm-6 text-left">
        									            <form class="form-horizontal" onsubmit="return deletefaq();" action="https://www.pwbvyindia.org/master/action/delete" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="table" value="tbl_faq" />
                                                            <input type="hidden" name="page" value="faq" />
                                                            <input type="hidden" name="id" value="2" />
                                                            <input type="hidden" name="column" value="faq_id" />

                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
                										</form>
        									        </div>
        									    </div>
        									</td>
        								</tr>
																        <tr>
                                            <td> 3</td>
        									<td> Do I need to register before shopping on Anoopkirana?                                 </td>
        									<!--<td><p><span style="color: rgb(51, 51, 51); font-family: JioLight; font-size: 14px;">Yes, you do need to register before shopping with us. However, you can browse the website without registration. You are required to login or register while you checkout.</span><br></p></td>-->
        									<td>
        										        											<span class="badge badge-danger">Block</span>
        										        									</td>
        									<td>
        									    <div class="row">
        									        <div class="col-sm-6 text-right"><a href="https://www.pwbvyindia.org/master/faq/edit/3" class="btn btn-primary btn-sm" title="Edit"><i class="far fa-edit"></i> Edit</a></div>
        									        <div class="col-sm-6 text-left">
        									            <form class="form-horizontal" onsubmit="return deletefaq();" action="https://www.pwbvyindia.org/master/action/delete" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="table" value="tbl_faq" />
                                                            <input type="hidden" name="page" value="faq" />
                                                            <input type="hidden" name="id" value="3" />
                                                            <input type="hidden" name="column" value="faq_id" />

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
