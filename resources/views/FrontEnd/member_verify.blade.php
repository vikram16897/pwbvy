@extends("FrontEnd.layout.main")
@section("main-section")



                    <!--Page Title-->
        <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
            <div class="auto-container">
                <h1>VERIFY MEMBER</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>VERIFY MEMBER</li>
                    </ul>
                </div>

            </div>
        </section>
        <!--End Page Info-->

        {{-- @if(session($error))
        <div class="alert alert-primary" role="alert">
            <strong>{{ session($error) }}</strong>
        </div>
        @endif --}}

        <!--About Section-->
        <section class="about-section grey-bg">
            <div class="auto-container">
                <div class="about-inner">
                    <div class="row clearfix">
          <div class="col-md-4 col-md-offset-4">
            <div class="border-1px p-25">
              <h4 class="text-theme-colored text-uppercase m-0">VERIFY MEMBER</h4>
              <div class="line-bottom mb-30"></div>


              <form   class="mt-30" method="post" action="{{ route("find.FrontEnd_member_verify") }}">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="reg_no" class="form-control required" type="text" placeholder="Enter Registration No." aria-required="true" required>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-0 mt-20">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" name="centre" class="btn btn-success form-control" data-loading-text="Please wait...">Submit</button>
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
