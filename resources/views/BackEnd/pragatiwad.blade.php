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
                                    <li class="breadcrumb-item active text-capitalize">Member</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Member</h4>
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
                                                <th>Reg. No</th>
                                                <th>Address</th>
                                                <th>Photo</th>
                                                <th>Sign</th>
                                                <th>Aadhar</th>
                                                <th>Full Name</th>
                                                <th>Father's / Husband's Name</th>
                                                <th>DOB</th>
                                                <th>Age</th>
                                                <th>Adhar No</th>
                                                <th>Language:-</th>
                                                <th>Caste Category:-</th>
                                                <th>Post Office:-</th>
                                                <th>Panchayat:-</th>
                                                <th>Block:-</th>
                                                <th>Sub Division:-</th>
                                                <th>District:-</th>
                                                <th>State:-</th>
                                                <th>Pincode:-</th>
                                                <th>Email ID:-</th>
                                                <th>Qualification:-</th>
                                                <th>Working Experience:-</th>
                                                <th>Mobile:-</th>
                                                <th>8<sup>th</sup> Certificate No. :-</th>
                                                <th>10<sup>th</sup> Certificate No. :-</th>
                                                <th>12<sup>th</sup> Certificate No. :-</th>
                                                <th>Designation:-</th>
                                                <th>Addon:-</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $num = 1;
                                            @endphp
                                            @foreach ($employee as $employeeData)
                                                <tr>
                                                    <td>{{ $num++ }}</td>
                                                    <td>{{ $employeeData['reg_no'] }}</td>
                                                    <td>
                                                        <a href="#custom-modal"
                                                            class="btn btn-info btn-sm waves-effect waves-light"
                                                            onclick="viewaddress('#address_{{ $employeeData['reg_no'] }}')"
                                                            data-animation="fadein" data-plugin="custommodal"
                                                            data-overlayspeed="100" data-overlaycolor="#36404a">View
                                                            Address</a>
                                                        <input type="hidden" id="address_{{ $employeeData['reg_no'] }}"
                                                            value="{{ $employeeData['address'] }}">
                                                    </td>

                                                    @php
                                                    $galleryFolder = public_path('assets/uploads/website/volunteer/');

                                                    $galleryFolderSign = public_path('assets/uploads/website/volunteer/sign/');

                                                    $galleryFolderAadhar = public_path('assets/uploads/website/volunteer/aadhar/');

                                                    $imagePathPhoto = $galleryFolder . $employeeData['photo'];
                                                    $imagePathSign = $galleryFolderSign . $employeeData['sign'];
                                                    $imagePathAdhar = $galleryFolderAadhar . $employeeData['aadhar'];
                                                @endphp

                                                @if (file_exists($imagePathPhoto))
                                                    <td><img src="{{ asset('public/assets/uploads/website/volunteer/' . $employeeData['photo']) }}" class="w-75 img-fluid" /></td>
                                                    @else
                                                    <td><img src="{{ asset('public/assets/uploads/website/volunteer/dami.png') }}" class="w-75 img-fluid" /></td>
                                                    @endif

                                                    @if (file_exists($imagePathPhoto))
                                                    <td><img src="{{ asset('public/assets/uploads/website/volunteer/sign/' . $employeeData['sign']) }}" class="w-75 img-fluid" /></td>
                                                    @else
                                                    <td>---</td>
                                                    @endif

                                                    @if (file_exists($imagePathAdhar))
                                                    <td><img src="{{ asset('public/assets/uploads/website/volunteer/aadhar/' . $employeeData['aadhar']) }}" class="w-75 img-fluid" /></td>
                                                    @else
                                                    <td>---</td>
                                                    @endif

                                                         @php
        $dob = \Carbon\Carbon::parse($employeeData['dob']);
        $currentDate = \Carbon\Carbon::now();
        $age = $dob->diffInYears($currentDate);
    @endphp

                                                    <td>{{ $employeeData['name'] }}</td>
                                                    <td>{{ $employeeData['fname'] }}</td>
                                                    <td>{{ $employeeData['dob'] }}</td>
                                                      @if($employeeData['dob'] == '0000-00-00')
                                            <td>---</td>
                                            @else
                                            <td>{{ $age }}</td>
                                            @endif
                                                    <td>{{ $employeeData['adhar'] }}</td>
                                                    <td>{{ $employeeData['language'] }}</td>
                                                    <td>{{ $employeeData['caste'] }}</td>
                                                    <td>{{ $employeeData['post_office'] }}</td>
                                                    <td>{{ $employeeData['panchayat'] }}</td>
                                                    <td>{{ $employeeData['block'] }}</td>
                                                    <td>{{ $employeeData['sub_division'] }}</td>
                                                    <td>{{ $employeeData['district'] }}</td>
                                                    <td>{{ $employeeData['state'] }}</td>
                                                    <td>{{ $employeeData['pincode'] }}</td>
                                                    <td>{{ $employeeData['email'] }}</td>
                                                    <td>{{ $employeeData['qualification'] }}</td>
                                                    <td>{{ $employeeData['work_experience'] }}</td>
                                                    <td>{{ $employeeData['mob1'] }}</td>
                                                    <td>{{ $employeeData['eighth'] }}</td>
                                                    <td>{{ $employeeData['tenth'] }}</td>
                                                    <td>{{ $employeeData['twelveth'] }}</td>
                                                    <td>{{ $employeeData['designation'] }}</td>
                                                    <td>{{ $employeeData['created_at'] }}</td>
                                                    <td>
                                                        <span
                                                            class="badge @if ($employeeData['status'] == 1) badge-success @else bg-danger @endif">
                                                            @if ($employeeData['status'] == 1)
                                                                Active
                                                            @else
                                                                Block
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="row">
                                                            <div class="col-sm-12 mb-1">
                                                                <a href="{{ route('admin_employee') }}/id_card/{{ $employeeData['id'] }}"
                                                                    target="_blank" class="btn btn-xs btn-success">ID
                                                                    CARD</a>
                                                                <a href="{{ route('admin_employee') }}/welcome/{{ $employeeData['id'] }}"
                                                                    target="_blank"
                                                                    class="btn btn-xs btn-success">Welcome</a>
                                                                <a href="{{ route('admin_employee') }}/appointment/{{ $employeeData['id'] }}"
                                                                    target="_blank"
                                                                    class="btn btn-xs btn-success">Appointment</a>
                                                                <!--<a href="master/volunteer/documents/226" target="_blank" class="btn btn-xs btn-success">Documents</a>-->
                                                                <!--<a href="master/employee/add_emp/226" target="_blank" class="btn btn-xs btn-success">Qualify</a>-->
                                                                  <a onclick="return confirm('Approve volunteer ({{ $employeeData['name'] }} and ID is: {{ $employeeData['id'] }}) Data')" href="{{ route('admin_pragatiwad') }}/approve/{{ $employeeData['id'] }}" class="btn btn-xs btn-primary">approve</a>
                                                                <a href="{{ route('admin_employee') }}/edit/{{ $employeeData['id'] }}"
                                                                    target="_blank" class="btn btn-xs btn-success">Edit</a>
                                                                    <a onclick="return confirm('Delete volunteer ({{ $employeeData['name'] }} and ID is: {{ $employeeData['id'] }}) Data ?')" href="{{ route('admin_pragatiwad') }}/delete/{{ $employeeData['id'] }}" class="btn btn-xs btn-danger">Delete</a>
                                                            </div>
                                                            <!--<div class="col-sm-12 mt-5">-->
                                                            <!--    <form class="form-horizontal"-->
                                                            <!--        onsubmit="return deletevolunteer();"-->
                                                            <!--        action="master/action/delete" method="post"-->
                                                            <!--        enctype="multipart/form-data">-->
                                                            <!--        <input type="hidden" name="table"-->
                                                            <!--            value="tbl_volunteer" />-->
                                                            <!--        <input type="hidden" name="page" value="Volunteer" />-->
                                                            <!--        <input type="hidden" name="id" value="226" />-->

                                                            <!--        <button type="submit" class="btn btn-danger btn-sm"-->
                                                            <!--            title="Delete">Delete</button>-->
                                                            <!--    </form>-->
                                                            <!--</div>-->
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
