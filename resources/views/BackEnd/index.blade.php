@extends("BackEnd.layout.main")
@section("main-section")


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
           <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikash Yojana
</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <a href="{{ route('admin_show_branch') }}">
                            <div class="card-box tilebox-two">
                                <img width="50px" class="float-right mt-2"
                                    src="{{ url('/') }}/public/BackEnd/office-building.png">
                                <h6 class="text-body mt-0 text-uppercase">Branch</h6>
                                @php
                                    $Branch = App\Models\Branch::orderBy('created_at', 'DESC')
                                        ->get()
                                        ->count();
                                @endphp
                                <h3><span data-plugin="counterup">{{ $Branch }}</span></h3>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <a href="{{ route('admin_show_vendor') }}">
                            <div class="card-box tilebox-two">
                                <img width="50px" class="float-right mt-2" src="{{ url('/') }}/public/BackEnd/division.png">
                                <h6 class="text-body mt-0 text-uppercase">Volunteer</h6>
                                @php
                                    $employee = App\Models\Employee::orderBy('created_at', 'DESC')
                                        ->get()
                                        ->count();
                                @endphp
                                <h3><span data-plugin="counterup">{{ $employee }}</span></h3>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <a href="{{ route('admin_employee') }}">
                            <div class="card-box tilebox-two">
                                <img width="50px" class="float-right mt-2" src="{{ url('/') }}/public/BackEnd/division.png">
                                <h6 class="text-body mt-0 text-uppercase">Employee</h6>
                                @php
                                    $OldEmployee = App\Models\OldEmployee::orderBy('created_at', 'DESC')
                                        ->get()
                                        ->count();
                                @endphp
                                <h3><span data-plugin="counterup">{{ $OldEmployee }}</span></h3>
                            </div>
                        </a>
                    </div>


                </div>
                <!-- end row -->


            </div> <!-- end container-fluid -->

        </div> <!-- end content -->

@endsection("main-section")
