<!doctype html>
<html lang="en">
    <head>
        <title>Pragativad Bal Vikas Yojana </title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
       
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="PragatiWad Bal Vikas Yojana" name="author" />
    <meta name="theme-color" content="#C9C518" />
    <link rel="shortcut icon" href="{{ url("/") }}/public/assets/uploads/website/favicon/favicon.png">
    <link rel="apple-touch-icon" href="{{ url("/") }}/public/assets/uploads/website/favicon/favicon.png" />
    <meta property="og:type" content="website" />
    <meta name="og_site_name" property="og:site_name" content="PragatiWad Bal Vikas Yojana" />
    <meta name="twitter:app:country" content="in">

    <meta content="" name="title" />
    <meta content="" name="keyword" />
    <meta content="" name="description" />
    <link rel="canonical" href="about">

    <meta name="og:title" content="" />
    <meta name="og:description" content="" />
    <meta property="og:image" content="assets/uploads/website/share_image/share_image.png">

    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta property="twitter:image" content="assets/uploads/website/share_image/share_image.png" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <style>
            table, th, td {
              border:1px solid black;
              color: #6c8ad4 !important;
              font-size: 12px;
            }

            table{
                margin-top: -15px;
            }

            .container{
                height: 100vh !important;
                overflow: hidden !important;
            }

            .container .logo{
                width: 100px;
            }

            .container .text1{
                font-size: 15px;
            }
            .container .text_two{
                margin-top: -20px;
            }

            .container .text_two div p{
                color: #6c8ad4;
                font-weight:500;
                font-size: 12px;
            }
            .Receipt{
                margin-top: -20px;
            }

            .texttable{
                margin-top: -20px;
            }

            .texttable p{
                font-size: 12px;
            }
            .text_details{
                margin-top: 15px;
            }
            .text_details p, .text_details span,.text_details input {
                font-size: 10px;
                height: 12px;
            }
            </style>
    </head>

    <body>

        {{-- <p>{{ dd($paymentData) }}</p> --}}

        <div class="container d-flex justify-content-center">
        <div class="row w-100">
            <div class="col-6 col-md-6 col-lg-6">
                <img class="logo img-fluid mx-auto d-block" width="250px" src="{{ url("/") }}/public/assets/uploads/master/logo/logo.png" alt="">
            </div>
            <div class="col-6 col-md-6 col-lg-6">
                <h3 class="mt-3 text1 text-center">Registration Number- 110</h3>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="text-center text_two">
                    <h3 class="fs-5" style="color: brown;">Pragativad Bal Vikas Yojana Trust</h3>
                    <div class="mb-5 mt-3">
                        <p>NITI AAYOG DARPAN Registered: DL/2020/0251982</p>
                        <p style="margin-top: -17px">Reg. Office: H. No: 223 Block-E Landmarks- Shaheed Sukhdev Nagar Wazirpur <br> Industrial Area Delhi - 110052</p>
                        <p style="margin-top: -17px" >Corp. Office: 309, 3rd Floor Aadarsh Complex Wazirpur Industrial Area Delhi - 110052</p>
                        <p style="margin-top: -17px">Phone: <a href="tel:+91 7667264045">+91 7667264045</a>, <a href="tel:+91 7255965354">+91 7255965354</a> E-mails: <a href="mailto:info@pwbvyindia.org">info@pwbvyindia.org</a></p>
                        <p style="margin-top: -17px"><a href="https://www.pwbvyindia.org/">www.pwbvyindia.org</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-12 Receipt" >
                <h2  style="margin-top: -17px" class="text-success fs-6 text-decoration-underline text-center ">Donation Receipt</h2>
            </div>

            <div class="col-lg-12 col-md-12 col-12 texttable">
                <div class="mt-1 d-flex justify-content-center" style="color: #6c8ad4;">
                    <div class="w-50">
                    <p class="float-left">Received with thanks from:</p>
                    <table style="width:100%">
                        <thead>
                        <tr>
                          <th>Donar Name</th>
                          <th>Donar Pan Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>{{ $donerData->name }}</td>
                          <td>{{ $donerData->txtpan }}</td>
                        </tr>
                    </tbody>
                    </table>

                    <div class="mt-1">
                        <p class="float-left">Donar Address:</p>
                        <table style="width:100%">
                            <thead>
                            <tr>
                              <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>{{ $donerData->address }}</td>
                            </tr>
                        </tbody>
                        </table>

                    </div>
                </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-12">
                <div class="d-flex justify-content-center text_details">
                <div class="row w-75">
                    <div class="col-lg-6 col-md-6 col-6">
                        <div  style="color: #6c8ad4;line-height:5px;">
                        <p>Payment Mode: Online/offline</p>
                        <div class="mb-2" style="margin-top: -15px;">
                        <input class="mt-1" type="checkbox" checked> <span class="ms-2">online</span></div>
                        <p >Amount: Rs.{{ $donerData->amount }}/-</p>
                        <p  style="margin-top: -15px">Purpose: Donation</p>
                      <p  style="margin-top: -15px">Date: {{ $donerData->created_at }} </p>
                        <p  style="margin-top: -15px;line-height:10px;">Place: {{ $donerData->address }} , {{ $donerData->country }}</p>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                        <div style="color: #6c8ad4;">
                        <!--<p class="text-center mb-5 pb-3">Signature with stamp</p>-->
                        <div class="d-flex justify-content-center">
                            <div class="w-25">
                            <img width="40px" class="img-fluid mx-auto d-block ms-3" style="position: absolute;margin-top:-30px" src="{{ url('/') }}/public/assets/site_assets/images/sign.png">
                            <img width="50px" style="position: absolute;margin-top:-50px" class="img-fluid mx-auto d-block" src="{{ url('/') }}/public/assets/site_assets/images/pwbvystamp.png">
                        </div>
                        </div>
                        <p class="text-dark my-1 pt-2 text-center">Pragativad Bal Vikas Yojana Trust</p>
                        <p class="text-center">President</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <!--<div class="col-lg-12 col-md-12 col-12">-->
            <!--    <div class="d-flex justify-content-center">-->
            <!--    <div class="w-75" style="color: #6c8ad4;font-weight:500;font-size:12px;margin-top:-10px;">-->
                    <!--<p>(Cheque subject to realisation)</p>-->
            <!--        <div style="padding:1px;background:#d6d6d6;">-->
            <!--            <div class=" bg-primary" style="height:5px;margin:2px; "></div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--</div>-->

            <div class="col-lg-12 col-md-12 col-12">
                <div class="d-flex justify-content-center">
                    <div class="w-100" style="color: #6c8ad4;font-weight:400;font-size:13px;">
                    <p class="text-center" style="margin-top: -5px">TAX EXEMPTION</p>
                    <p class="text-justify">Donations to “Pragativad Bal Vikas Yojana Trust”, NGO PAN No: AAETP3469J are eligible for deduction
                        under Sec. 80 G of the Income tax Act 1961. Approval No. AAETP3469JE20214 Government of India, O/o of
                        the Director of Income Tax (Exemptions), Income Tax Department, New Delhi Date- 08-02-2022 gave
                        exemption for donations received under Clause (vi) of Sec. 80 G (5) in the Finance Act 2009 wef 1-10-2009,
                        the above Certificate does not need renewal and is valid for donations received in the current financial
                        year.</p>
                </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12" style="margin-top: -13px">
                <div class="d-flex justify-content-center">
                    <button id="print" onclick="window.print()">print</button>
                </div>
            </div>
        </div>
        </div>


        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

        <script>
            $(document).ready(function(){
                $("#print").click(function(){
                    $("#print").hide();
                });
            });
        </script>
    </body>
</html>
