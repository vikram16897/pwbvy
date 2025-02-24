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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">PragatiWad Bal Vikas Yojana</a>
                                    </li>
                                    <li class="breadcrumb-item active text-capitalize">Slider</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Slider</h4>
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
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Link URL</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($sliders as $sliderdata)

                                            <tr>
                                                <td>{{ $sliderdata['id'] }}</td>
                                                <td>

                                                    <img src="{{ asset('public/assets/uploads/website/slider/'.$sliderdata['photo']) }}" class="img-fluid"
                                                        width="60" />
                                                </td>
                                                <td>{{ $sliderdata['title'] }} </td>
                                                <td>{{ $sliderdata['button_url'] }} </td>
                                                <td>
                                                    <span class="badge @if($sliderdata['status'] == 1)badge-success @else badge-danger @endif">
                                                        @if($sliderdata['status'] == 1)
                                                        Active
                                                        @else
                                                        Inactive
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6 text-right"><a href="{{ route('admin_show_slider') }}/edit/{{ $sliderdata['id'] }}"
                                                                class="btn btn-primary btn-sm" title="Edit"><i
                                                                class="far fa-edit"></i> Edit</a></div>
                                                                <div class="col-sm-6 text-left">
                                                                    <a href="{{ route('admin_show_slider') }}/delete/{{ $sliderdata['id'] }}" onclick="return confirm('Can you Delete this Data !');"
                                                                    class="btn btn-danger btn-sm" title="Delete"> Delete</a>
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
