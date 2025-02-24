@extends('BackEnd.layout.main')
@section('main-section')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikash Yojana</a>
                                    </li>
                                    <li class="breadcrumb-item active text-capitalize">customer</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">customer</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="key-table" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Mobile Number </th>
                                                <!--<th>State </th>-->
                                                <!--<th>District </th>-->
                                                <!--<th>Address </th>-->
                                                <th>Registration </th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>


                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <img src="https://www.pwbvyindia.org/./uploads/website/customer/customer.png"
                                                        class="img-fluid" style="width:60px;" alt="Sonu Kumar"
                                                        title="Sonu Kumar" />

                                                </td>
                                                <td>Sonu Kumar</td>
                                                <td>chandrabhushan1225@gmail.com</td>
                                                <td>9939527762</td>
                                                <!--<td>Bihar</td>-->
                                                <!--<td>Vaishali</td>-->
                                                <!--<td>Nauwachak, Chandpur Fatah</td>-->
                                                <td>15-11-2020</td>
                                                <td>
                                                    <span class="badge badge-danger">Block</span>
                                                </td>
                                                <td>
                                                    <a href="https://www.pwbvyindia.org/master/customer/cust_status/1"
                                                        class="btn btn-success btn-sm" title="Change Status"><i
                                                            class="far fa-edit"></i> Change Status</a>
                                                    <a href="https://www.pwbvyindia.org/master/customer/view/1"
                                                        class="btn btn-info btn-sm" title="View"><i
                                                            class="far fa-eye"></i> View</a>
                                                    <a href="https://www.pwbvyindia.org/master/customer/send_message/1"
                                                        class="btn btn-warning btn-sm" title="Send Message"><i
                                                            class="far fa-chat"></i> Send Message</a>
                                                   <div class="col-sm-6 text-left">
            <form class="form-horizontal" onsubmit="return deletecustomer();" action="https://www.pwbvyindia.org/master/action/delete" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="table" value="tbl_customer" />
                                                                <input type="hidden" name="page" value="customer" />
                                                                <input type="hidden" name="id" value="1" />
                                                                <input type="hidden" name="column" value="cust_id" />

                                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
                    </form>
                </div>
                                                </td>


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
