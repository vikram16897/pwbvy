<!DOCTYPE html>
<html lang="en">
<head>
<base href="{{ url('/') }}/public/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Pragativad Bal Vikas Yojana" name="author" />
    <meta name="theme-color" content="#C9C518" />
    <link rel="shortcut icon" href="assets/uploads/website/favicon/favicon.png">
    <link rel="apple-touch-icon" href="assets/uploads/website/favicon/favicon.png" />
    <meta property="og:type" content="website" />
    <meta name="og_site_name" property="og:site_name" content="Pragativad Bal Vikas Yojana" />
    <meta name="twitter:app:country" content="in">

    <title>Pragativad Bal Vikas Yojana</title>
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


    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- Stylesheets -->
    <link href="assets/site_assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/site_assets/css/revolution-slider.css" rel="stylesheet">
    <link href="assets/site_assets/css/style.css" rel="stylesheet">
    <link href="assets/site_assets/css/responsive.css" rel="stylesheet">
    <link href="assets/site_assets/css/pwbvy.css" rel="stylesheet">

    <script src="assets/site_assets/js/jquery.js"></script>
    <script src="assets/site_assets/js/bootstrap.min.js"></script>
    <style>
        :root {
            --theme-color: #C9C518 !important;
            --primary: #C9C518 !important;
            --primarynew: #C9C518 !important;
            --bs-gutter-x: .5rem;
        }

        #hideDiv {
            position: fixed;
            width: 400px;
            height: 50px !important;
            margin: 0 auto;
            left: 35%;
            top: 45%;
            color: #fff;
            padding: 10px;
            text-align: center;
            background: #000;
            z-index: 9999999 !important;
        }

        .main-header .header-lower {
            background: #FFF !important;
            box-shadow: 0px 1px 0px 0px rgba(0, 0, 0, 0.1);
        }

        .nav-main {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-gap: 10px;
        }

        .donate-now {
            background-color: #33338c !important;
            padding: 0px 30px 0px 0px !important;
            margin-top: 5px !important;
            margin-right: 15px !important;
            border-radius: 5px;
        }

        .btn-box .donate-now img {
            padding: 5px;
        }

        @media screen and (min-width:1024px) and (max-width:3000px) {


            .hw {

                height: 350px;
            }

            .regist {
                margin-left: 191px;
            }
        }

        @media screen and (min-width:224px) and (max-width:768px) {
            .head5 {
                margin-top: -19px;
                margin-bottom: -21px;
            }

            .regist {
                margin-left: 0px;
            }

            .nav-logo-lg {
                display: none;
            }

            .donate-now {
                margin-top: 0px !important;
            }

        }
    </style>
</head>

<body>

    <div class="page-wrapper">

        <!-- Main Header-->
        <header class="main-header">

            <!--Header Top-->
            <div class="header-top">
                <div class="auto-container">
                    <div class="clearfix">
                        <div class="top-left">
                            <ul class="clearfix">
                                <li><span class="icon fa fa-hand-o-right" style="font-size:24px"></span><strong
                                        style="font-size:24px"> Welcome to Pragativad Bal Vikas Yojana</strong>
                                </li>
                                <li class="regist"><strong> Registration No.:-110</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="top-right clearfix">
                            <ul class="clearfix">
                                <li><a href="https://www.facebook.com/pragativadbalvikas.yojana?mibextid=ZbWKwL"><span
                                            class="icon fa fa-facebook" style="font-size:24px;color:blue;"></span> </a>
                                </li>
                                <li><a href="https://twitter.com/pwbvyindia"><span class="icon fa fa-twitter"
                                            style="font-size:24px; color:red;"></span> </a></li>
                                <li><a href="https://www.youtube.com/@PWBVYINDIA"><span
                                            class="icon fa fa-youtube"style="font-size:24px; color:yellow;"></span> </a>
                                </li>
                                <li><a href="https://www.instagram.com/pwbvyindia/"><span
                                            class="icon fa fa-instagram"style="font-size:24px; color:brown;"></span>
                                    </a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <!--Header Lower-->
            <div class="header-lower">

                <div class="auto-container clearfix">
                    <div class="nav-main">
                        <!--Logo-->
                        <div class="logo nav-logo-lg">
                            <a href="{{ url('/') }}"><img
                                    src="assets/uploads/master/logo/logo.png"
                                    style="max-width: 130px" alt="Pragativad Bal Vikas Yojana"></a>
                        </div>

                        <!--Right Col-->
                        <div class="">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        onclick="openNav()">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ Route('FrontEnd_member_join') }}"> Registration</a></li>
                                        <li><a href="{{ Route('FrontEnd_examapanal') }}"> Examimation</a></li>
                                        <li><a href="{{ route('FrontEnd_download') }}">Download</a></li>
                                        <li class="dropdown ">

                                            <a href="#"> Verification</a>
                                            <ul>
                                                <li> <a href="{{ Route('FrontEnd_member_verify') }}">Registration
                                                        Verification</a></li>
                                                <li> <a href="{{ Route('FrontEnd_centre_verify') }}">Centre
                                                        Verification</a></li>
                                                <li> <a href="{{ Route('FrontEnd_member_employee_verify') }}">Employee
                                                        Verification</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('FrontEnd_Bank_account_details') }}">Account Details</a>
                                        </li>

                                        <li><a href="{{ Route('FrontEnd_Pwbvy_center') }}">PWBVY center</a></li>
                                        <li><a href="{{ Route('FrontEnd_Gallery') }}">Gallery</a></li>
                                        <li><a href="{{route('scholarship')}}">Scholarship</a></li>
                                        
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                        </div>

                        <div class="btn-box">
                            <a href="{{ Route('FrontEnd_Donate') }}" class="donate-btn theme-btn donate-now">
                                <img style="max-width: 50px" src="assets/images/download.gif" />
                                Donate Now <i style="font-weight: bold;font-size:15px;margin:5px;"
                                    class="icon fa fa-angle-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <!--End Header Lower-->

            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <div class="nav-main">
                        <!--Logo-->
                        <div class="logo pull-left">
                            <a href="{{ url('/') }}"><img
                                    src="assets/uploads/master/logo/logo.png"
                                    style="max-width: 120px" alt="Pragativad Bal Vikas Yojana"></a>
                        </div>

                        <!--Right Col-->
                        <div class="right-col pull-right">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        onclick="openNav()">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ Route('FrontEnd_member_join') }}"> Registration</a></li>
                                        <!--<li><a href="https://pwbvyindia.org/pwbvy/scholarship/">Scholarship</a></li>-->
                                        <li><a href="{{route('scholarship')}}">Scholarship</a></li>
                                        <li><a href="{{ route('FrontEnd_download') }}">Download</a></li>
                                        <li class="dropdown ">

                                            <a href="#"> Verification</a>
                                            <ul>
                                                <li> <a href="{{ Route('FrontEnd_member_verify') }}">Registration
                                                        Verification</a></li>
                                                <li> <a href="{{ Route('FrontEnd_centre_verify') }}">Centre
                                                        Verification</a></li>
                                                <li> <a href="{{ Route('FrontEnd_member_employee_verify') }}">Employee
                                                        Verification</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('FrontEnd_Bank_account_details') }}">Account Details</a>
                                        </li>

                                        <li><a href="{{ Route('FrontEnd_Pwbvy_center') }}">PWBVY center</a></li>
                                        <li><a href="{{ Route('FrontEnd_Gallery') }}">Gallery</a></li>
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                        </div>

                        <div class="btn-box">
                            <a href="{{ Route('FrontEnd_Donate') }}" class="donate-btn theme-btn donate-now">
                                <img style="max-width: 50px" src="assets/images/download.gif" />
                                Donate Now <i style="font-weight: bold;font-size:15px;margin:5px;"
                                    class="icon fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sticky Header-->

        </header>
        <!--End Main Header -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <li><a href="{{ url('/') }}">Home</a></li>

            <li><a href="{{ route('FrontEnd_about') }}">About Us</a></li>
            <li><a href="{{ route('FrontEnd_about_volunteer') }}">Our Team</a></li>

            <li><a href="{{ route('FrontEnd_about_chairman') }}">Director</a></li>
            <li><a href="{{ route('FrontEnd_about_mission') }}">Mission Vision & Values</a></li>

            <li><a href="{{ route('FrontEnd_member_join') }}">Registration</a></li>
            <li><a href="{{ Route('FrontEnd_member_verify') }}">Registration Verification</a></li>
            <li><a href="{{ Route('FrontEnd_centre_verify') }}">Centre Verification</a></li>
            <li><a href="{{ Route('FrontEnd_member_employee_verify') }}">Employee Verification</a></li>
            <li><a href="{{ Route('FrontEnd_Projects') }}">Our Projects</a></li>
            <li><a href="{{ Route('FrontEnd_Pwbvy_center') }}">PWBVY center</a></li>
            <li><a href="{{route('scholarship')}}">Scholarship</a></li>
            <!--<li><a href="https://pwbvyindia.org/pwbvy/scholarship/">Scholarship</a></li>-->
            <li><a href="{{ Route('FrontEnd_Gallery') }}">Gallery</a></li>
            <li>
                <a href="{{ Route('FrontEnd_Donate') }}">Donate Now</a>
            </li>

            <li class="dropdown "><a href="#" class="dropdown-toggle" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Projects</a>
                <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="assets/projects">Pragativad Bal
                            Vidhyalaya</a></li>
                    <li class="dropdown-item"><a href="assets/about/volunteer">Pragativad Coching
                            Center</a></li>
                    <li><a href="assets/about/Chairman">Pragativad shishu Vidhylaya</a></li>
                    <li><a href="assets/about/mission">Pragativad Kanya Vivah</a></li>
                    <li><a href="assets/about/mission">Pragativad Scholarship</a></li>
                    <li><a href="assets/about/mission">Pragativad Helping Fund</a></li>
                </ul>
            </li>
            <li><a href="assets/pwbvy_center">PWBVY center</a></li>
            <li><a href="assets/Gallery">Gallery</a></li>
            <li><a href="assets/">Contact Us</a></li>

        </div>



        <x-user.message error="error" success="success" alert="alert" />
