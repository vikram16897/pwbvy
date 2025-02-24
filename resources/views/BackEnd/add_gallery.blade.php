
@extends("BackEnd.layout.main")
@section("main-section")
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikash Yojana</a></li>
                                <li class="breadcrumb-item active text-capitalize">Gallery</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Gallery</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-10 col-xl-8">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-sm-12">

                                @if (Route::current()->getName() == 'admin_add_gallery')
                                <form class="form-horizontal" action="{{ route("add.admin_add_gallery") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <input type="hidden" name="table" value="tbl_photo" />
                                    <input type="hidden" name="page" value="gallery/create" /> --}}

                                    <h4 class="header-title mb-4">Photo </h4>
                                    <input type="file" name="photo" class="dropify" accept="image/png, image/jpeg, image/jpg, image/gif"  data-max-file-size="1M" />

                                    <h4 class="header-title mt-4">Title</h4>
                                    <div class="form-group">
                                        <input type="text" name="title" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title mt-4">Link URL</h4>
                                    <div class="form-group">
                                        <input type="text" name="link" required="" class="form-control" />
                                    </div>

                                    <h4 class="header-title mt-4">Image Category</h4>
                                    <div class="form-group">
                                        <select name="caption" id="" class="form-control">
                                            <option value="news">News</option>
                                            <option value="education">Education</option>
                                            <option value="opening-ceremony">Opening Ceremony</option>
                                            <option value="events">Events</option>
                                        </select>
                                    </div>

                                    <h4 class="header-title">Status</h4>
                                    <div class="form-group mb-5">
                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status">
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status">
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right m-2">Submit</button>
                                        <a href="master/gallery/" class="btn float-right m-2 btn-secondary" title="">Back</a>
                                    </div>

                                </form>

                                @elseif (Route::current()->getName() == 'admin_edit_gallery')

                                <form class="form-horizontal" action="{{ route("edit.admin_edit_gallery") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <input type="hidden" name="table" value="tbl_photo" />
                                    <input type="hidden" name="page" value="gallery/create" /> --}}
                                    <input type="hidden" value="{{ $GalleryEdit['id'] }}" name="id">
                                    <h4 class="header-title mb-4">Photo </h4>
                                    <input type="file" name="photo" class="dropify" accept="image/png, image/jpeg, image/jpg, image/gif" data-default-file="{{ asset('public/assets/uploads/website/gallery/'.$GalleryEdit['photo'])}}" data-max-file-size="1M" />

                                    <h4 class="header-title my-4">Title</h4>
                                    <div class="form-group">
                                        <input type="text" name="title" required="" value="{{ $GalleryEdit['title'] }}" class="form-control" />
                                    </div>

                                    <h4 class="header-title my-4">Link URL</h4>
                                    <div class="form-group">
                                        <input type="text" name="link" required="" value="{{ $GalleryEdit['link'] }}" class="form-control" />
                                    </div>

                                    <h4 class="header-title mt-4">Image Category</h4>
                                    <div class="form-group">
                                        <select name="caption" id="" class="form-control">
                                            <option value="news" @if($GalleryEdit->caption == 'news')selected @endif >News</option>
                                            <option value="education" @if($GalleryEdit->caption == 'education')selected @endif>Education</option>
                                            <option value="opening-ceremony" @if($GalleryEdit->caption == 'opening-ceremony')selected @endif>Opening Ceremony</option>
                                            <option value="events" @if($GalleryEdit->caption == 'events')selected @endif>Events</option>
                                        </select>
                                    </div>

                                    <h4 class="header-title">Status</h4>
                                    <div class="form-group mb-5">
                                        <div class="custom-control custom-radio float-left">
        									<input class="custom-control-input" value="1" type="radio" required id="statusActive" name="status"  @if($GalleryEdit['status'] == 1) checked @endif>
        									<label for="statusActive" class="custom-control-label">Active</label>
        								</div>
        								<div class="custom-control custom-radio float-left ml-3">
        									<input class="custom-control-input" value="0" type="radio" required id="statusBlock" name="status"  @if($GalleryEdit['status'] == 0) checked @endif>
        									<label for="statusBlock" class="custom-control-label">Block</label>
        								</div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success float-right m-2">Submit</button>
                                        <button type="reset" class="btn btn-danger float-right m-2">reset</button>
                                    </div>

                                </form>


                                @endif

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
