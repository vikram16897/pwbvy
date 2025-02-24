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
                                    <li class="breadcrumb-item active text-capitalize">Gallery</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Gallery</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">


                                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Title</th>
                                                <th>Link URL</th>
                                                <th>Image Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $num = 1;
                                            @endphp
                                            @foreach ($gallery as $gallerydata)

                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>

                                                    <img src="{{ asset('public/assets/uploads/website/gallery/'.$gallerydata['photo']) }}" class="img-fluid"
                                                        width="60" />
                                                </td>
                                                <td width="30%">{{ $gallerydata['title'] }} </td>
                                                <td>{{ $gallerydata['link'] }}</td>
                                                <td>{{ $gallerydata['caption'] }}</td>
                                                <td>
                                                    <span class="badge @if($gallerydata['status'] == 1) badge-success @else bg-danger @endif">@if($gallerydata['status'] == 1) Active @else Block @endif</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col-sm-6 text-right"><a href="{{ route("admin_show_gallery") }}/edit/{{ $gallerydata['id'] }}"
                                                                class="btn btn-primary btn-sm" title="Edit"><i
                                                                    class="far fa-edit"></i> Edit</a></div>
                                                        <div class="col-sm-6 text-left">
                                                            <a href="{{ route("admin_show_gallery") }}/delete/{{ $gallerydata['id'] }}" onclick="return confirm('Can you Delete this Data !');"
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
                            {{-- <div class="d-flex justify-content-between">
                                <div>
                                    Showing {{ $gallery->currentPage() }} to {{ $gallery->lastPage() }} of {{ $gallery->total() }} entries
                                </div>

                            <div>
                            <ul class="pagination pagination-rounded justify-content-end mb-2">
                                <div class="d-flex">
                                    {!! $gallery->links() !!}
                                </div>
                            </ul>
                        </div>
                        </div> --}}
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

