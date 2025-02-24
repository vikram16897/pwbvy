<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('/') }}/public/">
    <meta charset="utf-8" />
    <title>DASHBOARD || Pragativad Bal Vikash Yojana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2b3d5130" />
    <meta content="Pragativad Bal Vikash Yojana" name="description" />
    <meta content="Decent Web Services LLP" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="BackEnd/uploads/master/favicon/favicon.png">


    <!-- Table datatable css -->
    <link href="BackEnd/assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="BackEnd/assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="BackEnd/assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="BackEnd/assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />


    <!-- Sweet Alert-->
    <link href="BackEnd/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom box css -->
    <link href="BackEnd/assets/libs/custombox/custombox.min.css" rel="stylesheet">

    <link href="BackEnd/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"
        type="text/css" />

    <link href="BackEnd/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="BackEnd/assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="BackEnd/assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="BackEnd/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="BackEnd/assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="BackEnd/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="BackEnd/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="BackEnd/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.3.67/css/materialdesignicons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <style>
        /*.display-none{*/
        /*    display: none;*/
        /*}*/

        /*.dataTables_info{*/
        /*    display: none;*/
        /*}*/

        .navbar-custom {
            position: fixed !important;
        }

        .left-side-menu {
            height: 100vh !important;
            position: fixed !important;
        }
    </style>
</head>

<body class="unsticky-layout">

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ url('/') }}/public/BackEnd/uploads/master/logo/logo.png" alt="user-image"
                            class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1 font-weight-medium">Pragativad Bal Vikash
                            Yojana</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow text-white m-0">Welcome Pragativad Bal Vikash Yojana!</h6>
                        </div>
                        <!-- item-->
                        <a href="{{ route("admin_profile") }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-box"></i>
                            <span>Settings</span>
                        </a>
                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{route("admin_logout_profile")}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ url('/') }}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="BackEnd/uploads/master/logo/logo.png" alt="" width="90%">
                        <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">U</span> -->
                        <img src="BackEnd/uploads/master/logo/logo.png" alt="" width="90%">
                    </span>
                </a>

                <a href="{{ url('/') }}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="BackEnd/uploads/master/logo/logo.png" alt="" width="90%">
                        <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">U</span> -->
                        <img src="BackEnd/uploads/master/logo/logo.png" alt="" width="90%">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="{{ route("admin_dashboard") }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        {{-- <li>
                            <a href="#">
                                <i class="mdi mdi-settings-outline"></i>
                                <span> Settings </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin_customer') }}">
                                <i class="mdi mdi-account-circle-outline"></i>
                                <span> Customer </span>
                            </a>
                        </li>--}}
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-folder-multiple-image"></i>
                                <span> Home Banner Slider </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route("admin_add_slider") }}"><i class="mdi mdi-arrow-right"></i> Add
                                        Slider</a>
                                </li>
                                <li><a href="{{ route("admin_show_slider") }}"><i class="mdi mdi-arrow-right"></i>
                                        Slider List</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-folder-multiple-image"></i>
                                <span> Gallery </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route("admin_add_gallery") }}"><i class="mdi mdi-arrow-right"></i> Add
                                        Gallery</a></li>
                                <li><a href="{{ route("admin_show_gallery") }}"><i class="mdi mdi-arrow-right"></i>
                                        Gallery List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-star"></i>
                                <span> Our Program </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin_program') }}"><i class="mdi mdi-arrow-right"></i> Add
                                        Program</a></li>
                                <li><a href="{{ route("admin_show_program") }}"><i class="mdi mdi-arrow-right"></i>
                                        Program List</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-star"></i>
                                <span> Examination </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('create_question') }}"><i class="mdi mdi-arrow-right"></i> Create
                                        Questions</a></li>
                                <li><a href="{{ route('list_question') }}"><i class="mdi mdi-arrow-right"></i> Questions
                                        List</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-star"></i>
                                <span>Renewal</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin_renewal') }}"><i class="mdi mdi-arrow-right"></i>Renewal
                                        List</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-star"></i>
                                <span> Class </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <!-- <li><a href="{{ route('create_question') }}"><i class="mdi mdi-arrow-right"></i> Create Questions</a></li> -->
                                <li><a href="{{ route('class_list') }}"><i class="mdi mdi-arrow-right"></i> Class
                                        List</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-star"></i>
                                <span> Users Exam List </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <!-- <li><a href="{{ route('create_question') }}"><i class="mdi mdi-arrow-right"></i> Create Questions</a></li> -->
                                <li><a href="{{ route('users.exam.results') }}"><i class="mdi mdi-arrow-right"></i>
                                        Users Exam List</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-star"></i>
                                <span> Users Registration list </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('registrationlist') }}"><i class="mdi mdi-arrow-right"></i> Users
                                        Registation list</a></li>
                                <!--<li><a href="{{ route('list_question') }}"><i class="mdi mdi-arrow-right"></i> Questions List</a>-->
                        </li>
                    </ul>
                    </li>
                    {{-- <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-star"></i>
                            <span> Projects </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route(" admin_add_project") }}"><i class="mdi mdi-arrow-right"></i> Add
                                    Projects</a></li>
                            <li><a href="#"><i class="mdi mdi-arrow-right"></i> Projects List</a></li>
                        </ul>
                    </li>--}}
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-account-tie"></i>
                            <span> Our Team </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('admin_add_team_member') }}"><i class="mdi mdi-arrow-right"></i> Add
                                    Team
                                    Member</a></li>
                            <li><a href="{{ route("admin_show_team_member") }}"><i class="mdi mdi-arrow-right"></i> Team
                                    Member
                                    List</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-account-tie"></i>
                            <span> Vendor </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route(" admin_add_vendor") }}"><i class="mdi mdi-arrow-right"></i> Add
                                    Vendor</a></li>
                            <li><a href="{{ route(" admin_show_vendor") }}"><i class="mdi mdi-arrow-right"></i> Vendor
                                    List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-account-plus"></i>
                            <span> Current Openings </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="#"><i class="mdi mdi-arrow-right"></i> Add Current Openings</a></li>
                            <li><a href="#"><i class="mdi mdi-arrow-right"></i> Current Openings List</a></li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-account-plus"></i>
                            <span> Download </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route("admin_download") }}"><i class="mdi mdi-arrow-right"></i> Add
                                    Download</a></li>
                            <li><a href="{{ route('admin_show_download') }}"><i class="mdi mdi-arrow-right"></i> Current
                                    Download</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-account-plus"></i>
                            <span> Branch </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route("admin_add_branch") }}"><i class="mdi mdi-arrow-right"></i> Add
                                    Branch</a>
                            </li>
                            <li><a href="{{ route("admin_show_branch") }}"><i class="mdi mdi-arrow-right"></i> Branch
                                    Details</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-account-plus"></i>
                            <span> Requirement </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route("admin_add_requirement") }}"><i class="mdi mdi-arrow-right"></i> Add
                                    Requirement</a></li>
                            <li><a href="{{ route("admin_show_requirement") }}"><i class="mdi mdi-arrow-right"></i>
                                    Requirement
                                    Details</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-help-circle-outline"></i>
                            <span> Faq </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route(" admin_add_faq") }}"><i class="mdi mdi-arrow-right"></i> Add Faq</a>
                            </li>
                            <li><a href="{{ route(" admin_show_faq") }}"><i class="mdi mdi-arrow-right"></i> Faq
                                    List</a></li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-newspaper"></i>
                            <span> News </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('admin_add_news') }}"><i class="mdi mdi-arrow-right"></i> Add News</a>
                            </li>
                            <li><a href="{{ route("admin_show_news") }}"><i class="mdi mdi-arrow-right"></i> News
                                    List</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{ route("admin_donation") }}">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                            <span> Donation List </span>
                        </a>
                    </li>
                    {{--
                    <!--<li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-file-outline"></i>
                                    <span> Dynamic Page </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="master/dynamic/about"><i class="mdi mdi-arrow-right"></i> About Us</a></li>-->
                    <!--<li><a href="master/dynamic/faq"><i class="mdi mdi-arrow-right"></i> Faq</a></li>-->
                    <!--<li><a href="master/dynamic/contact"><i class="mdi mdi-arrow-right"></i> Contact Us</a></li>-->
                    <!--<li><a href="master/dynamic/terms_conditions"><i class="mdi mdi-arrow-right"></i> Terms & Conditions</a></li>
                                    <!--<li><a href="master/dynamic/privacy_policy"><i class="mdi mdi-arrow-right"></i> Privacy Policy</a></li>-->
                    <!-- </ul>
                            </li>-->

                    <!--<li>
                                <a href="master/career">
                                    <i class="mdi mdi-help-circle"></i>
                                    <span> Career Enquiry </span>
                                </a>
                            </li>-->

                    <!--<li>
                                <a href="master/feedback">
                                    <i class="mdi mdi-help-circle"></i>
                                    <span> Feedback </span>
                                </a>
                            </li>--> --}}

                    {{-- <li>
                        <a href="{{ route(" admin_subscription_enquiry") }}">
                            <i class="mdi mdi-help-circle"></i>
                            <span> Subscription Enquiry </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route(" admin_contact_enquiry") }}">
                            <i class="mdi mdi-help-circle"></i>
                            <span> Contact Enquiry </span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route("admin_employee") }}">
                            <i class="mdi mdi-help-circle"></i>
                            <span> Employee List </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("admin_pragatiwad") }}">
                            <i class="mdi mdi-help-circle"></i>
                            <span> Pragativad </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("admin_volunteer") }}">
                            <i class="mdi mdi-account"></i>
                            <span> Old Volunteer </span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-paypal"></i>
                            <span> Donation </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route(" admin_donation") }}"><i class="mdi mdi-arrow-right"></i> Online
                                    Donation List</a></li>
                            <li><a href="{{ route('admin_add_menual_donation') }}"><i class="mdi mdi-arrow-right"></i>
                                    Manual Donation</a></li>
                            <li><a href="{{ route(" admin_show_menual_donation") }}"><i class="mdi mdi-arrow-right"></i>
                                    Manual Donation List</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-account-tie"></i>
                            <span> Staff </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route(" admin_add_staff") }}"><i class="mdi mdi-arrow-right"></i> Add
                                    Staff</a></li>
                            <li><a href="{{route(" admin_show_staff")}}"><i class="mdi mdi-arrow-right"></i> Staff
                                    List</a></li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="master/db_backup">
                            <i class="mdi mdi-database"></i>
                            <span> Backup Database </span>
                        </a>
                    </li>
                    </ul>

                </div>
                <!-- End Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->