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
                                    <li class="breadcrumb-item active text-capitalize">Old Volunteer</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Old Volunteer</h4>
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
                                                <th>Address</th>
                                                <th>User Id</th>
                                                <!--<th>Profile Photo</th>-->
                                                <th>Full Name</th>
                                                <th>Father's / Mother's / Husband's Name</th>
                                                <th>DOB</th>
                                                <th>Gender</th>
                                                <th>Mobile No.</th>
                                                <th>Email ID</th>
                                                <th>Panchayat</th>
                                                <th>Block</th>
                                                <th>District</th>
                                                <th>State</th>
                                                <th>Pin Code</th>
                                                <th>Adhar No.</th>
                                                <th>PAN No.</th>
                                                <th>Account No.</th>
                                                <th>Bank Name</th>
                                                <th>Branch Name</th>
                                                <th>IFSC Code</th>
                                                <th>Posting Area</th>
                                                <th>Addon</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @php
                                                $num = 1;
                                            @endphp
                                            @foreach ($OldEmployees as $OldEmployeesData)

                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>
                                                    <a href="#custom-modal"
                                                        class="btn btn-info btn-sm waves-effect waves-light"
                                                        onclick="viewaddress('#address_{{ $OldEmployeesData['id'] }}')" data-animation="fadein"
                                                        data-plugin="custommodal" data-overlayspeed="100"
                                                        data-overlaycolor="#36404a">View Address</a>
                                                    <input type="hidden" id="address_{{ $OldEmployeesData['id'] }}" value="{{ $OldEmployeesData['address'] }}">
                                                </td>
                                                <td>{{ $OldEmployeesData['user'] }}</td>
                                                <!--<td><img src="assets/uploads/website/uploads/{{ $OldEmployeesData['profile_pic'] }}"-->
                                                <!--        class="w-75 img-fluid" /></td>-->
                                                <td>{{ $OldEmployeesData['name'] }}</td>
                                                <td>{{ $OldEmployeesData['fname'] }}</td>
                                                <td>{{ $OldEmployeesData['dob'] }}</td>
                                                <td>{{ $OldEmployeesData['gender'] }}</td>
                                                <td>{{ $OldEmployeesData['mob'] }}</td>
                                                <td>{{ $OldEmployeesData['email'] }}</td>
                                                <td>{{ $OldEmployeesData['panchayat'] }}</td>
                                                <td>{{ $OldEmployeesData['block'] }}</td>
                                                <td>{{ $OldEmployeesData['district'] }}</td>
                                                <td>{{ $OldEmployeesData['state'] }}</td>
                                                <td>{{ $OldEmployeesData['pin'] }}</td>
                                                <td>{{ $OldEmployeesData['aadhar'] }}</td>
                                                <td>{{ $OldEmployeesData['pan'] }}</td>
                                                <td>{{ $OldEmployeesData['ac_no'] }}</td>
                                                <td> {{ $OldEmployeesData['bank'] }}</td>
                                                <td> {{ $OldEmployeesData['branch'] }}</td>
                                                <td> {{ $OldEmployeesData['ifsc'] }}</td>
                                                <td> {{ $OldEmployeesData['work_area'] }}</td>
                                                <td>{{ $OldEmployeesData['created_at'] }}</td>
                                                <td>
                                                    <span class="badge @if($OldEmployeesData['status'] == 1) badge-success @else bg-danger @endif"> @if($OldEmployeesData['status'] == 1) Active @else Block @endif</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-12 mb-1">
                                                            <!--<a href="master/old_volunteer/id_card/11" target="_blank" class="btn btn-xs btn-warning">ID CARD</a>
            <a href="master/old_volunteer/edit/11" target="_blank" class="btn btn-xs btn-success">Edit</a>-->
                                                        </div>
                                                        <div class="col-sm-6 text-left">
                                                            <a href="{{ route('admin_pragatiwad') }}/delete/{{ $OldEmployeesData['id'] }}" onclick="return confirm('Can you Delete this Data !');"
                                                            class="btn btn-danger btn-sm" title="Delete"> Delete</a>
                                                </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

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
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">User address</h4>
        <div class="custom-modal-text text-muted overflow-y-auto mb-3" id="address_data"></div>
    </div>
    <style>
        .overflow-y-auto {
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

    @endsection("main-section")

<!-- Modal -->

{{-- <script type="text/javascript">
    function deleteold_volunteer() {
        if (confirm("Are You Sure You Want TO Delete old_volunteer ?")) {
            return true;
        }
        return false;
    }
</script> --}}
