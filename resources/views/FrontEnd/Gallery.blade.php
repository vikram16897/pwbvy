@extends('FrontEnd.layout.main')
@section('main-section')
 <style>
 .gallary-images {
  height: 200px;
  width: 300px;
  object-fit: cover;
}
                    </style>
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/4.jpg);">
        <div class="auto-container">
            <h1>Gallery</h1>
        </div>
    </section>

    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="pull-left">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </div>

        </div>
    </section>
    <!--End Page Info-->

    @php
        $galleryFolder = public_path('assets/uploads/website/gallery/');
        $Gallery = App\Models\Gallery::orderBy('created_at', 'DESC')->get();
        $num = 1;
    @endphp
    <!--Gallery Section-->

    <section class="gallery-section gallery-page">
        <div class="auto-container">
            <div class="clearfix">
                <div>
                    <h3>Opening Ceremony</h3>
                    <hr>
                </div>

                @foreach ($Gallery as $galleryData)
                    @if ($galleryData->caption == 'opening-ceremony')
                        @php
                            $imagePath = $galleryFolder . $galleryData['photo'];
                        @endphp

                        @if (file_exists($imagePath))
                            <!-- Default Portfolio Item -->
                            <div class="default-portfolio-item col-md-3 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img class="gallary-images" src="{{ url('/') }}/public/assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                            alt="{{ $galleryData['title'] }}" title="{{ $galleryData['title'] }}">
                                    </figure>
                                    <!-- Overlay Box -->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                                    class="lightbox-image image-link" data-fancybox-group="example-gallery"
                                                    title="{{ $galleryData['title'] }}">
                                                    <span class="icon fa fa-expand"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>





    <section class="gallery-section gallery-page">
        <div class="auto-container">
            <div class="clearfix">


                <div>
                    <h3>News</h3>
                    <hr>
                </div>

                @foreach ($Gallery as $galleryData)
                    @if ($galleryData->caption == 'news')
                        @php
                            $imagePath = $galleryFolder . $galleryData['photo'];
                        @endphp

                        @if (file_exists($imagePath))
                            <!-- Default Portfolio Item -->
                            <div class="default-portfolio-item col-md-3 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img class="gallary-images" src="{{ url('/') }}/public/assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                            alt="{{ $galleryData['title'] }}" title="{{ $galleryData['title'] }}">
                                    </figure>
                                    <!-- Overlay Box -->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                                    class="lightbox-image image-link" data-fancybox-group="example-gallery"
                                                    title="{{ $galleryData['title'] }}">
                                                    <span class="icon fa fa-expand"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach

            </div>
        </div>
    </section>


    <section class="gallery-section gallery-page">
        <div class="auto-container">
            <div class="clearfix">
                <div>
                    <h3>Education</h3>
                    <hr>
                </div>

                @foreach ($Gallery as $galleryData)
                    @if ($galleryData->caption == 'education')
                        @php
                            $imagePath = $galleryFolder . $galleryData['photo'];
                        @endphp

                        @if (file_exists($imagePath))
                            <!-- Default Portfolio Item -->
                            <div class="default-portfolio-item col-md-3 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img class="gallary-images" src="{{ url('/') }}/public/assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                            alt="{{ $galleryData['title'] }}" title="{{ $galleryData['title'] }}">
                                    </figure>
                                    <!-- Overlay Box -->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                                    class="lightbox-image image-link" data-fancybox-group="example-gallery"
                                                    title="{{ $galleryData['title'] }}">
                                                    <span class="icon fa fa-expand"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>



    <section class="gallery-section gallery-page">
        <div class="auto-container">
            <div class="clearfix">
                <div>
                    <h3>Events</h3>
                    <hr>
                </div>

                @foreach ($Gallery as $galleryData)
                    @if ($galleryData->caption == 'events')
                        @php
                            $imagePath = $galleryFolder . $galleryData['photo'];
                        @endphp

                        @if (file_exists($imagePath))
                            <!-- Default Portfolio Item -->
                            <div class="default-portfolio-item col-md-3 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img class="gallary-images" src="{{ url('/') }}/public/assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                            alt="{{ $galleryData['title'] }}" title="{{ $galleryData['title'] }}">
                                    </figure>
                                    <!-- Overlay Box -->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                                    class="lightbox-image image-link" data-fancybox-group="example-gallery"
                                                    title="{{ $galleryData['title'] }}">
                                                    <span class="icon fa fa-expand"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach

            </div>
        </div>
    </section>
    <!--End Gallery Section-->
@endsection("main-section")
