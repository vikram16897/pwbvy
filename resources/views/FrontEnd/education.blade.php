@extends("FrontEnd.layout.main")
@section("main-section")

                    <!--Page Title-->
        <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
            <div class="auto-container">
                <h1>EDUCATION</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>EDUCATION</li>
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
                              <h4 class="text-theme-colored text-uppercase m-0">EDUCATION</h4>
                              <div class="line-bottom mb-30"></div>
                              <form   class="mt-30" method="post" action="brj_education/reg" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-10">
                                        <label>Name:-</label>
                                      <input name="name" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
                                    </div>
                                  </div>
                                  <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-10">
                                        <label>Father's / Mother's / Husband's Name:-</label>
                                      <input name="fname" class="form-control" type="text" required="" placeholder="Enter Father Name" aria-required="true">
                                    </div>
                                  </div>
                                    <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-10">
                                        <label>Date Of Birth:-</label>
                                      <input name="dob" imax="2023-11-22" class="form-control required" type="text" required placeholder="Enter Date Of Birth" aria-required="true">
                                    </div>
                                  </div>

                                   <div class="col-sm-6 col-md-4">
                                        <div class="form-group">
                                            <label>Gender :-</label>
                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1">
                                              <label class="form-check-label" for="flexRadioDefault1">
                                                Male
                                              </label> &nbsp;&nbsp;&nbsp;
                                              <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" checked>
                                              <label class="form-check-label" for="flexRadioDefault2">
                                                Female
                                              </label> &nbsp;&nbsp;&nbsp;
                                              <input class="form-check-input" type="radio" name="gender" value="Other" id="flexRadioDefault3" checked>
                                              <label class="form-check-label" for="flexRadioDefault3">
                                                Other
                                              </label>
                                            </div>
                                        </div>
                                   </div>


                                  <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-10">
                                        <label>Caste :-</label>
                                      <input name="caste" class="form-control required " type="text" placeholder="Caste " required aria-required="true">
                                    </div>
                                  </div>

                                  <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-10">
                                        <label>Caste Category:-</label>
                                      <input name="caste_category" class="form-control required " type="text" placeholder="Caste Category" required aria-required="true">
                                    </div>
                                  </div>

                                   <div class="col-sm-6 col-md-4">
                                        <div class="form-group mb-10">
                                            <label>Qualification:-</label>
                                          <input name="qualification" required class="form-control required"  placeholder="Enter Qualification" aria-required="true">
                                        </div>
                                   </div>


                                   <div class="col-sm-6 col-md-4">
                                        <div class="form-group mb-10">
                                            <label>Address :-</label>
                                          <input name="address" class="form-control required"  placeholder="Enter Address" required aria-required="true">
                                        </div>
                                   </div>

                                   <div class="col-sm-6 col-md-4">
                                        <div class="form-group mb-10">
                                            <label>District:-</label>
                                          <input name="district" required class="form-control required"  placeholder="Enter District" aria-required="true">
                                        </div>
                                   </div>

                                   <div class="col-sm-6 col-md-4">
                                        <div class="form-group mb-10">
                                            <label>State:-</label>
                                          <input name="state" class="form-control required"  placeholder="Enter State" required aria-required="true">
                                        </div>
                                   </div>

                                   <div class="col-sm-6 col-md-4">
                                        <div class="form-group mb-10">
                                            <label>Pincode:-</label>
                                          <input name="pincode" class="form-control required"  placeholder="Enter Pincode" required aria-required="true">
                                        </div>
                                   </div>


                                  <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-10">
                                        <label>Mobile No. :-</label>
                                      <input name="mob1" class="form-control required" type="tel" pattern="[0-9]{10}" required placeholder="Enter Mobile No." aria-required="true">
                                    </div>
                                  </div>

                                  <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-10">
                                        <label>Alternet Mobile No. :-</label>
                                      <input name="mob" class="form-control required" required type="tel" pattern="[0-9]{10}" placeholder="Enter Alternet Mobile No." aria-required="true">
                                    </div>
                                  </div>

                                   <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-10">
                                        <label>Photo:-</label>
                                      <input name="photo" class="form-control required " type="file"  required>
                                    </div>
                                  </div>
                                   <div class="col-sm-6 col-md-4">
                                    <div class="form-group mb-0 mt-20">
                                        <label>&nbsp;</label>
                                      <button type="submit" class="btn btn-success form-control" data-loading-text="Please wait...">Submit</button>
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
