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
                                    <li class="breadcrumb-item active text-capitalize">Member Update</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Member Update</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="mt-30" method="post" action="{{ route('edit.admin_edit_employee') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="id" value="{{ $employeeId['id'] }}" />
                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Name:-</label>
                                                    <input name="name" class="form-control" type="text" required=""
                                                        placeholder="Enter Name" value="{{ $employeeId['name'] }}"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Father's / Husband's Name:-</label>
                                                    <input name="fname" class="form-control" type="text" required=""
                                                        placeholder="Enter Father Name" value="{{ $employeeId['fname'] }}"
                                                        aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>DOB:- </label>
                                                    <input name="dob" max="{{ date("Y-m-d") }}" class="form-control required"
                                                        type="date" required placeholder="Enter Date Of Birth"
                                                        value="{{ $employeeId['dob'] }}" aria-required="true">
                                                </div>
                                            </div>
                                            @php
                                                $dob = \Carbon\Carbon::parse($employeeId['dob']);
                                                $currentDate = \Carbon\Carbon::now();
                                                $age = $dob->diffInYears($currentDate);
                                            @endphp

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Age:-</label>
                                                    <input name="age" class="form-control" min="1"
                                                        pattern="[0-9]{2}" type="text" required=""
                                                        placeholder="Enter Age"
                                                        @if ($employeeId['dob'] == '0000-00-00') value="" @else value="{{ $age }}" @endif
                                                        aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <h4 class="header-title">Gender</h4>
                                                <div class="form-group mb-5">
                                                    <div class="custom-control custom-radio float-left">
                                                        <input class="custom-control-input" value="Male" type="radio"
                                                            id="genderActive" required name="gender"
                                                            @if ($employeeId['gender'] == "Male") checked @endif>
                                                        <label for="genderActive"
                                                            class="custom-control-label">Mail</label>
                                                    </div>
                                                    <div class="custom-control custom-radio float-left ml-3">
                                                        <input class="custom-control-input" value="Female" type="radio"
                                                            id="genderBlock" required name="gender"
                                                            @if ($employeeId['gender'] == "Female") checked @endif>
                                                        <label for="genderBlock"
                                                            class="custom-control-label">Female</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Adhar No:-</label>
                                                    <input name="adhar" class="form-control" min="1"
                                                        pattern="[0-9]{12}" type="text" required=""
                                                        placeholder="Enter Adhar No" value="{{ $employeeId['adhar'] }}"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Language:-</label>
                                                    <input name="language" class="form-control required " type="text"
                                                        placeholder=" Language" required
                                                        value="{{ $employeeId['language'] }}" aria-required="true">
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Caste Category:-</label>
                                                    <input name="caste" class="form-control required " type="text"
                                                        placeholder="Caste Category" required
                                                        value="{{ $employeeId['caste'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Address (Vill./Nagar/Mohalla):-</label>
                                                    <input name="address" class="form-control required"
                                                        placeholder="Enter Address" required
                                                        value="{{ $employeeId['address'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Panchayat:-</label>
                                                    <input name="panchayat" required class="form-control required"
                                                        placeholder="Enter Panchayat"
                                                        value="{{ $employeeId['panchayat'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Post Office:-</label>
                                                    <input name="post_office" required class="form-control required"
                                                        placeholder="Enter Post Office"
                                                        value="{{ $employeeId['post_office'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Block:-</label>
                                                    <input name="block" class="form-control required"
                                                        placeholder="Enter Block" required
                                                        value="{{ $employeeId['block'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Sub Division:-</label>
                                                    <input name="sub_division" required class="form-control required"
                                                        placeholder="Enter Sub Division"
                                                        value="{{ $employeeId['sub_division'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>District:-</label>
                                                    <input name="district" required class="form-control required"
                                                        placeholder="Enter District"
                                                        value="{{ $employeeId['district'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>State:-</label>
                                                    <input name="state" class="form-control required"
                                                        placeholder="Enter State" required
                                                        value="{{ $employeeId['state'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Pincode:-</label>
                                                    <input name="pincode" class="form-control required"
                                                        placeholder="Enter Pincode" required
                                                        value="{{ $employeeId['pincode'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Email:-</label>
                                                    <input name="email" class="form-control required email"
                                                        type="email" placeholder="Enter Email" required
                                                        value="{{ $employeeId['email'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Qualification:-</label>
                                                    <input name="qualification" required class="form-control required"
                                                        placeholder="Enter Qualification"
                                                        value="{{ $employeeId['qualification'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Working Experience:-</label>
                                                    <input name="work_experience" class="form-control required"
                                                        placeholder="Enter Working Experience"
                                                        value="{{ $employeeId['work_experience'] }}"
                                                        aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Mobile No. (Self):-</label>
                                                    <input name="mob1" class="form-control required" type="tel"
                                                        pattern="[0-9]{10}" required placeholder="Enter Mobile No. (Self)"
                                                        value="{{ $employeeId['mob1'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>8<sup>th</sup> Certificate No. :-</label>
                                                    <input name="eighth" class="form-control required"
                                                        placeholder="Enter Eighth Certificate No."
                                                        value="{{ $employeeId['eighth'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>10<sup>th</sup> Certificate No. :-</label>
                                                    <input name="tenth" class="form-control required"
                                                        placeholder="Enter Tenth Certificate No."
                                                        value="{{ $employeeId['tenth'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>12<sup>th</sup> Certificate No. :-</label>
                                                    <input name="twelveth" class="form-control required"
                                                        placeholder="Enter Twelveth Certificate No."
                                                        value="{{ $employeeId['twelveth'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group mb-10">
                                                    <label>Photo:-</label>
                                                    <input type="file" name="photo" class="dropify"
                                                        data-default-file="{{ asset('public/assets/uploads/website/volunteer/' . $employeeId['photo']) }}" />
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group mb-10">
                                                    <label>Sign:-</label>
                                                    <input type="file" name="sign" class="dropify"
                                                        data-default-file="{{ asset('public/assets/uploads/website/volunteer/sign/' . $employeeId['sign']) }}" />
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group mb-10">
                                                    <label>Aadhar Card:-</label>
                                                    <input type="file" name="aadhar" class="dropify"
                                                        data-default-file="{{ asset('public/assets/uploads/website/volunteer/aadhar/' . $employeeId['aadhar']) }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Posting Area:-</label>
                                                    <input name="post_area" required class="form-control required"
                                                        placeholder="Enter Posting Area"
                                                        value="{{ $employeeId['post_area'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Ward No:-</label>
                                                    <input name="ward" required class="form-control required"
                                                        placeholder="Enter Word No"
                                                        value="{{ $employeeId['ward'] }}" aria-required="true">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-10">
                                                    <label>Designation:-</label>
                                                    <!--<input name="designation" required class="form-control required"  placeholder="Enter Designation"  value="Sahaayika" aria-required="true">-->
                                                    <select name="designation" class="form-control required select2"
                                                        aria-required="true" required>
                                                        @php
                                                            $designations = \App\Models\Requirement::where("status", "1")->get();
                                                        @endphp
                                                        @foreach ($designations as $designationData)
                                                        <option value="{{ $designationData['post1'] }}"  @if($employeeId['designation'] == $designationData['post1']) selected @endif>{{ $designationData
                                                            ['post1'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <h4 class="header-title">Status</h4>
                                                <div class="form-group mb-5">
                                                    <div class="custom-control custom-radio float-left">
                                                        <input class="custom-control-input" value="1" type="radio"
                                                            id="statusActive" required name="status"
                                                            @if ($employeeId['status'] == 1) checked @endif>
                                                        <label for="statusActive"
                                                            class="custom-control-label">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio float-left ml-3">
                                                        <input class="custom-control-input" value="0" type="radio"
                                                            id="statusBlock" required name="status"
                                                            @if ($employeeId['status'] == 0) checked @endif>
                                                        <label for="statusBlock"
                                                            class="custom-control-label">Block</label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success"
                                                data-loading-text="Please wait...">Update</button>
                                            <a href="{{ route('admin_employee') }}"
                                                class="btn float-right m-2 btn-secondary" title="">Back</a>
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
