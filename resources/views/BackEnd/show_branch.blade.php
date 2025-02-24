@extends('BackEnd.layout.main')
@section('main-section')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikas Yojana</a>
                                    </li>
                                    <li class="breadcrumb-item active text-capitalize">Branch</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Branch</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <style>
                    table {
                        overflow-x: scroll;
                        width: 100%;
                    }
                </style>
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card-box">
                            <div class="row w-100">
                                <div class="col-xl-12">
                                    <table id="key-table" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Center code</th>
                                                <th>Ward number</th>
                                                <th>Place</th>
                                                <th>Panchayat</th>
                                                <th>Prakhand</th>
                                                <th>Sevika</th>
                                                <th>Shayika</th>
                                                <th>Supervisor</th>
                                                <th>Addon:-</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $num = 1;
                                            @endphp
    @foreach($Branchs as $Branchdata)
    <tr>
        <td>{{ $num++ }}</td>
                                                <td>{{ $Branchdata['c_code'] }}</td>
                                                <td>{{ $Branchdata['w_num'] }}</td>
                                                <td>{{ $Branchdata['place'] }}</td>
                                                <td>{{ $Branchdata['panchayat'] }}</td>
                                                <td>{{ $Branchdata['prakhand'] }}</td>
                                                <td>{{ $Branchdata['sevika'] }}</td>
                                                <td>{{ $Branchdata['shayika'] }}</td>
                                                <td>{{ $Branchdata['supervisor'] }}</td>
                                                <td>{{ $Branchdata['created_at'] }}</td>
                                                <td>
                                                    <span class="badge @if($Branchdata['status'] == 1) badge-success @else bg-danger @endif">@if($Branchdata['status'] ==1 )Active @else Block @endif</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-12 mt-5">
                                                            <div class="col-sm-6 text-left">
                                                                <a href="{{ route('admin_show_branch') }}/edit/{{ $Branchdata['id'] }}"
                                                                class="btn btn-primary btn-sm" title="Edit"> Edit</a>
                                                                <a href="{{ route('admin_show_branch') }}/delete/{{ $Branchdata['id'] }}" onclick="return confirm('Can you Delete this Data !');"
                                                                class="btn btn-danger btn-sm" title="Delete"> Delete</a>
                                                    </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection("main-section")
