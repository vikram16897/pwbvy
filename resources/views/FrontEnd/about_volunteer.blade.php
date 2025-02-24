@extends("FrontEnd.layout.main")
@section("main-section")



                    <!--Page Title-->
        <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
            <div class="auto-container">
                <h1>Our Team</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Our Team</li>
                    </ul>
                </div>

            </div>
        </section>
        <!--End Page Info-->

        <!--Services Section-->
        <section class="services-section">
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- our team users style  -->

                    <style>

                        .row .team-wrap{
                            align-items: center;
                        }
                        .row #imgg{
                            height: 280px;
                            width: 250px;
                            border-radius: 10px;
                            padding: 5px;
                        }
                        .row h6{
                            font-family: bold;
                            font-size: 18px;
                        }


                         .gallary-images {
  height: 300px;
  width: 300px;
  object-fit: cover;
}
                    </style>
                     <!-- our team users style  end -->
                    <!--Services Style One-->
                    <div class="container">


                        <div class="row team-row">

                            @php
                            $Guest_memberFolder = public_path('assets/uploads/website/Guest_member/');
                            $Guest_member = DB::table("tbl_guest_member")->where('status',1)->get();
                            @endphp
                            @foreach ($Guest_member as $Guest_memberData)
                            @php
                                $imagePath = $Guest_memberFolder . $Guest_memberData->photo;
                            @endphp
                          <div class="col-md-3 col-sm-6 team-wrap">
                            <div class="team-member text-center">
                              <div class="team-img">
                                @if (file_exists($imagePath))
                                <img id="igg" class="gallary-images" src="{{ url('/') }}/public/assets/uploads/website/Guest_member/{{ $Guest_memberData->photo }}"
                                    alt="{{ $Guest_memberData->title }}">
                                    @else
                                    <img style="max-width: 195px;margin-left:25px;" src="{{ url('/') }}/pubic/assets/uploads/website/Guest_member/gust_member.png"
                                    alt="{{ $Guest_memberData->title }}">
                                    @endif

                              </div>
                              <h6 class="team-title">{{ $Guest_memberData->title }}</h6>
                              <span>{{ $Guest_memberData->description }}</span>
                            </div>
                          </div>
                          @endforeach


                        </div>

                      </div>



              </div>
            </div>
        </section>
        <!--End Services Section-->
@endsection("main-section")
