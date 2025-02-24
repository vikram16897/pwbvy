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
                                    <li class="breadcrumb-item active text-capitalize">Program</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Program Show</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="key-table" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>File</th>
                                                <th>Description</th>
                                                <th>Addon</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php $num = 1; @endphp
                                            @foreach ($programs as $programsData)

                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $programsData['title'] }} </td>
                                                <td>

                                                    <a target="blank" href="{{ asset('public/assets/uploads/website/services/'.$programsData['photo']) }}"
                                                        class="btn btn-sm btn-info"> View</a>
                                                </td>
                                                <td title="{{ $programsData->description }}">{{ Str::words($programsData->description,4) }}</td>
                                                <td>{{ $programsData['created_at'] }}</td>
                                                <td>
                                                    <span class="badge @if($programsData['status'] == 1) badge-success @else bg-danger @endif">@if($programsData['status'] == 1)Active @else Block @endif</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6 text-right"><a href="{{ route('admin_program') }}/edit/{{ $programsData['id'] }}"
                                                                class="btn btn-primary btn-sm" title="Edit"><i
                                                                    class="far fa-edit"></i> Edit</a></div>
                                                        <div class="col-sm-6 text-left">
                                                            <div class="col-sm-6 text-left">
                                                                <a href="{{ route('admin_program') }}/delete/{{ $programsData['id'] }}" onclick="return confirm('Can you Delete this Data !');"
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

