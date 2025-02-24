@extends("FrontEnd.layout.main")
@section("main-section")



                    <!--Page Title-->
        <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
            <div class="auto-container">
                <h1>Director</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Director</li>
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
                        <!--Content Column-->
                        <div style="text-align: justify;" class="content-column col-md-12 col-sm-12 col-xs-12">
                            <div class="inner-box">
                                <div class="sec-title">
                                    <h2>Director</h2>
                                </div>
                            </div>
                        </div>
                        <!--Image Column-->
                        <div class="image-column col-md-12 col-sm-12 col-xs-12">
                            <div style="text-align: center;" class="image">
                                <img src="{{ url('/') }}/public/assets/site_assets/old/images/paras-bishwas.jpeg" alt="" class="img-responsive img-thumbnail">
                                     <h3 style="font-weight: bold;padding: 9px;">Paras Bishwas</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End About Section-->

@endsection("main-section")
