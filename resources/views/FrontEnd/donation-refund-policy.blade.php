@extends('FrontEnd.layout.main')
@section('main-section')

<!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="pull-left">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>

        </div>
    </section>
    <!--End Page Info-->


    <!--About Section-->
    <section class="about-section">
        <div class="auto-container">
            <div class="about-inner">
                <div class="row clearfix">
                    <div class="content-column col-sm-12 col-xs-12">
                        <div class="inner-box">

                            <div class="container"
                                style="padding: 0px 20px; width: auto; min-width: 320px; max-width: 984px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px; background-color: #fff;">
                                <h2 class="h2" align="center"
                                    style="font-weight: bolder; line-height: 1.1; color: rgb(224, 147, 26); margin-top: 20px; margin-bottom: 10px; font-size: 40px; border: aliceblue; box-shadow: black 0px 0px 0px inset; text-shadow: black -2px -1px 4px;">
                                    Refund Policy</h2>

                            </div>
                            <h3 class="h3"
                                style="font-family: Roboto, sans-serif; line-height: 1.1; color: rgb(51, 122, 183); margin-top: 20px; margin-bottom: 10px; font-size: 24px; box-shadow: black 0px 0px 9px 0px inset; background-color: rgb(242 , 110 ,33); padding: 10px; text-shadow: black 2px -1px 0px;">
                                Policy</h3><br>

                            Thank you for choosing to donate to Prgativad Bal Vidyalaya. Your contribution plays a crucial role in supporting our mission to empower
                            underprivileged children and communities. Before proceeding with your donation, please carefully
                            review the following terms and conditions: <br><br>
                            <ul>
                                <li><b>Non-Refundable Donations:</b> All donations made to the NGO are non-refundable.
                                    Once a donation is processed, it cannot be refunded for any reason, except in the case
                                    of a proven error in donation processing. <br></li>

                                    <li><b>Voluntary Contribution:</b>  Your donation to the NGO is voluntary and made out
                                    of your own free will. The NGO does not coerce or pressure individuals or entities into
                                    making donations.</li>


                                <li><b>Transparency:</b>
                                     The NGO is committed to maintaining transparency in all financial
                                    transactions. Donors can request information regarding the utilization of their
                                    donations, and the NGO will provide updates on how the funds are being utilized for
                                    charitable purposes. <br></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection("main-section")
