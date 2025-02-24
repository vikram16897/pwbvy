@extends("FrontEnd.layout.main")
@section("main-section")


{{-- @if (session($success))
    <script>
        <div class="alert alert-success" role="alert">
          <p class="mb-0">{{ session($success) }}</p>
        </div>
    </script>
@endif

@if (session($error))
    <script>
        <div class="alert alert-danger" role="alert">
          <p class="mb-0">{{ session($error) }}</p>
        </div>
    </script>
@endif --}}
                    <!--Page Title-->
        <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
            <div class="auto-container">
                <h1>REGISTERATION</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>REGISTERATION</li>
                    </ul>
                </div>

            </div>
        </section>
        <!--End Page Info-->

        <!--About Section-->
        <section class="about-section grey-bg">
            <div class="auto-container">
                <div class="about-inner">
                    <div class="row clearfix">
          <div class="col-md-12">
            <div class="border-1px p-25">
              <h4 class="text-theme-colored text-uppercase m-0">REGISTERATION</h4>
              <div class="line-bottom mb-30"></div>
              <form   class="mt-30" method="post" action="{{route("add.FrontEnd_member_join") }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Name:-</label>
                      <input name="name" class="form-control" type="text" value="{{ old("name") }}"  placeholder="Enter Name" aria-required="true">
                      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Father's / Husband's Name:-</label>
                      <input name="fname" class="form-control" type="text" value="{{ old("fname") }}" placeholder="Enter Father Name" aria-required="true">
                      @error('fname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                    <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>DOB:-</label>
                      <input name="dob" imax="2023-11-21" class="form-control" type="date" placeholder="Enter Date Of Birth"  value="{{ old("dob") }}"  aria-required="true">
                      @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>



                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Gender:-</label><br>
                      Male <input name="gender" class="form-inline " @if(old("gender") == "Male") checked @endif type="radio" value="Male"  aria-required="true">
                      Female <input name="gender"  class="form-inline " @if(old("gender") == "Female") checked @endif type="radio" value="Female"  aria-required="true">
                    </div>
                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Adhar No:-</label>
                      <input name="adhar" class="form-control" min="1" pattern="[0-9]{12}" type="text"  placeholder="Enter Adhar No" value="{{ old("adhar") }}" aria-required="true">
                      @error('adhar') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                  <!--<div class="col-sm-6 col-md-4">-->
                  <!--  <div class="form-group mb-10">-->
                  <!--      <label>Pan No:-</label>-->
                  <!--    <input name="pan" class="form-control" min="1" pattern="[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}" type="text"  placeholder="Enter Pan No" value="{{ old("pan") }}" aria-required="true">-->
                  <!--    @error('pan') <span class="text-danger">{{ $message }}</span> @enderror-->
                  <!--  </div>-->
                  <!--</div>-->

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Caste Category:-</label>
                      <input name="caste" class="form-control " value="{{ old("caste") }}"  type="text" placeholder="Caste Category" aria-required="true">
                      @error('caste') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Address (Vill./Nagar/Mohalla):-</label>
                          <input name="address" class="form-control"  value="{{ old("address") }}"  placeholder="Enter Address" aria-required="true">
                          @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Ward No:-</label>
                          <input name="ward" class="form-control"  value="{{ old("ward") }}"  placeholder="Enter Ward No" aria-required="true">
                          @error('ward') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Panchayat:-</label>
                          <input name="panchayat" class="form-control"  value="{{ old("panchayat") }}"  placeholder="Enter Panchayat" aria-required="true">
                          @error('panchayat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Post Office:-</label>
                          <input name="post_office" class="form-control"  value="{{ old("post_office") }}"  placeholder="Enter Post Office" aria-required="true">
                          @error('post_office') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Block:-</label>
                          <input name="block" class="form-control"  value="{{ old("block") }}" placeholder="Enter Block" aria-required="true">
                          @error('block') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Sub Division:-</label>
                          <input name="sub_division" class="form-control"  value="{{ old("sub_division") }}"  placeholder="Enter Sub Division" aria-required="true">
                          @error('sub_division') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>District:-</label>
                          <input name="district" class="form-control" value="{{ old("district") }}" placeholder="Enter District" aria-required="true">
                          @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>State:-</label>
                          <input name="state" class="form-control" value="{{ old("state") }}"  placeholder="Enter State" aria-required="true">
                          @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Pincode:-</label>
                          <input name="pincode" class="form-control" pattern="[0-9]{6}"  placeholder="Enter Pincode"  value="{{ old("pincode") }}"   aria-required="true">
                          @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Email:-</label>
                      <input name="email" class="form-control email"  value="{{ old("email") }}"  type="email" placeholder="Enter Email" aria-required="true">
                      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Qualification:-</label>
                          <input name="qualification" value="{{ old("qualification") }}" class="form-control"  placeholder="Enter Qualification" aria-required="true">
                          @error('qualification') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-sm-6 col-md-4">
                        <div class="form-group mb-10">
                            <label>Working Experience:-</label>
                          <input name="work_experience" class="form-control" value="{{ old("work_experience") }}" placeholder="Enter Working Experience" aria-required="true">
                          @error('work_experience') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Mobile No. (Self):-</label>
                      <input name="mob1" class="form-control" value="{{ old("mob1") }}" type="tel" pattern="[0-9]{10}" placeholder="Enter Mobile No. (Self)" aria-required="true">
                      @error('mob1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>8<sup>th</sup> Certificate No:-</label>
                      <input name="eighth" class="form-control" value="{{ old("eighth") }}" placeholder="Enter 8th Certificate No" aria-required="true">
                      @error('eighth') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>10<sup>th</sup> Certificate No:-</label>
                      <input name="tenth" class="form-control" value="{{ old("tenth") }}"  placeholder="Enter 10th Certificate No" aria-required="true">
                      @error('tenth') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>12<sup>th</sup> Certificate No:-</label>
                      <input name="twelveth" class="form-control" value="{{ old("twelveth") }}"   placeholder="Enter 12th Certificate No" aria-required="true">
                      @error('twelveth') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                   <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Photo:-</label>
                      <input name="photo" class="form-control" type="file" >
                      @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Signature:-</label>
                      <input name="sign" class="form-control " type="file"  >
                      @error('sign') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Aadhar Card:-</label>
                      <input name="aadhar" class="form-control " type="file">
                      @error('aadhar') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>

                   <div class="col-sm-6 col-md-4">
                    <div class="form-group mb-10">
                        <label>Post Applied:-</label>
                      <select name="designation" class="form-control "  aria-required="true">
                          <option  @if(old("designation") == "") selected @endif  value="">Designation</option>
                                                    <option @if(old("designation") == "Bihar Promoter") selected @endif value="Bihar Promoter">Bihar Promoter</option>
                                                    <option @if(old("designation") == "Sevika") selected @endif value="Sevika">Sevika</option>
                                                     <option  @if(old("designation") == "Sahaayika") selected @endif  value="Sahaayika">Sahaayika</option>
                                                     <option  @if(old("designation") == "Supervisor") selected @endif value="Supervisor">Supervisor</option>
                                                     <option @if(old("designation") == "District") selected @endif value="District coordinator">District coordinator</option>
                                                     <option @if(old("designation") == "Panchayat") selected @endif value="Panchayat Coordinator">Panchayat Coordinator</option>
                                                     <option @if(old("designation") == "Office Volunteer") selected @endif value="Office Volunteer">Office Volunteer</option>
                                                     <option @if(old("designation") == "Block") selected @endif value="Block coordinator">Block coordinator</option>
                                                     <option  @if(old("designation") == "Volunteer") selected @endif value="Volunteer ">Volunteer </option>
                                                     <option  @if(old("designation") == "Bal Prerak") selected @endif value="Bal Prerak">Bal Prerak </option>
                                                 </select>
                                                 @error('designation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>


                   <div class="col-sm-6 col-md-4">
                        <div class="form-group text-center mb-0 mt-20">
                            <label>&nbsp;<br><br></label>
                              <button type="reset" class="btn btn-danger btn-lg btn-theme-colored" data-loading-text="Please wait...">Reset</button>
                              <button type="submit" class="btn btn-success btn-lg btn-theme-colored" data-loading-text="Please wait...">Submit</button>
                        </div>
                      </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->

 @endsection("main-section")
