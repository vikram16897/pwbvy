@extends("FrontEnd.layout.main")
@section("main-section")



                    <!--Page Title-->
        <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
            <div class="auto-container">
                <h1>About</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Bank account details</li>
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
                        <div class="content-column col-md-12 col-sm-12 col-xs-12">
                            <div class="inner-box">
                                <div class="sec-title">
                                    <h2>Bank account details</h2>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <table class="table">
                                        <tr><td colspan=2>PRAGATIVAD BAL VIKASH TRUST</td></tr>
                                        <tr><td>Bank Name</td><td>PUNJAB NATIONAL BANK</td></tr>
                                        <tr><td>A/C No.</td><td>2488002100004412</td></tr>
                                        <tr><td>IFSC Code</td><td>PUNB0248800</td></tr>
                                    </table>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <table class="table">
                                        <tr><td colspan=2>PRAGATVAD BAL VIKAS TRUST</td></tr>
                                        <tr><td>Bank Name</td><td>ICICI Bank</td></tr>
                                        <tr><td>A/C No.</td><td>260805002089</td></tr>
                                        <tr><td>IFSC Code</td><td>ICIC0002608</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End About Section-->
@endsection("main-section")
