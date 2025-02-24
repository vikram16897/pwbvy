@extends("FrontEnd.layout.main")
@section("main-section")


                    <!--Page Title-->
        <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
            <div class="auto-container">
                <h1>Mission Vision & Values</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Mission Vision & Values</li>
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
            <div class="col-md-4">
             <img alt="" src="{{ url('/') }}/assets/site_assets/old/images/about/d2.jpg" class="img-fullwidth">
            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <h2 class="text-theme-colored mt-0">Mission Vision & Values</h2>
                  <p>
                      Vision:-
This Organisation based on legitimate rights , equity , Justice , Honesty , Socialsentivity and culture of service in which all are self reliant . Our Organisation is running various projects with named of Pragativad Bal Vidyalay , Pragativad Coaching Centre , Scholar Ship to the needy students and Pragativad Kanya Vivah Yojana in the state of Bihar,Jharkhand and Utter Pradesh.
<br><br><br>

Mission:-
Our primary objective is to empower the poor and marginalized , Provideeducation , Shelter to the sick and destitutes , Promote community health programmes and services , Support literacy centre , Work towards Empowerment of women , facilitates livelihood programmes , help the poor to enable them to be self – reliant and enjoy a healthy,dignified and sustainable quality of life and to that end , act as a resource to and collaborate with other agencies,governmental or non governmental , as well as suitably intervene in policy formulation.

                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->

@endsection("main-section")
