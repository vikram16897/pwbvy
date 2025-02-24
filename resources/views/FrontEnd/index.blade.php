@extends('FrontEnd.layout.main')
@section('main-section')
    <style>
        .default-cause-box .upper-content h3 {
            font-size: 13px !important;
        }
    </style>
    <marquee class="asd123" onmouseover="this.stop()" onmouseout="this.start()" style="margin-bottom: -9px;">
        <a href="#" style="color:blue;">
            <!--<img src="images/new.gif">-->प्रगतिवाद बाल विकास योजना के अंतर्गत बिहार के सभी जिलों में वार्ड स्तरीय
            प्रगतिवाद बाल विद्यालय हेतू सेविका सहायिका और सुपरवाइजर की नियुक्ति प्रक्रिया प्रारंभ हो चुकी हैं ऑनलाइन आवेदन
            करके एडमिट कार्ड के साथ नजदीकी कार्यालय से संपर्क करें। इंटरव्यू की जानकारी आपके रजिस्टर्ड मोबाइल पे सूचित किया
            जाएगा। विशेष जानकारी के लिए लॉगइन करे : www.pwbvyindia.org </a>
        <a href="#" style="color:blue;">
            <!--<img src="images/new.gif">-->
            "हर घर शिक्षा दीप जलाए, बाल विवाह बंद कराएं" | "हम युवको का नारा है निरक्षर को साक्षर बनाना है" | "हम बच्चो का
            नारा है शिक्षा का अधिकार हमारा है" | "वृक्षों की जब करोगे रक्षा, तभी बनेगा जीवन अच्छा" | </a>
        <a href="#" style="color:blue;">
            <!--<img src="images/new.gif">-->सूचना: सर्वसाधारण को सूचित किया जाता है कि प्रगतिवाद बाल विकास ट्रस्ट जो भारत
            सरकार द्वारा भारतीय न्यास अधिनियम 1882 के अंतर्गत अखिल भारतीय स्तर पर वर्ष 2020 में पंजीकृत हुई जिसकी पंजीयन
            संख्या 110/2020 है। इस नाम से मिलता-जुलता कई संस्था फर्जी तरीके से आम जनता से पैसा की उगाही का काम करती है
            ।नौकरी का झांसा देखकर बेरोजगार युवाओं को ठगने का कार्य कर रही है ऐसी संस्थाओं से सावधान। यदि कोई व्यक्ति
            प्रगतिवाद बाल विकास ट्रस्ट के नाम पर नौकरी दिलाने का झांसा देकर किसी प्रकार का कोई उगाही करता है तो संस्था के
            संपर्क सूत्र 7255965354 पर सूचना करें हमारी संस्था नौकरी के नाम पर ऐसी कोई उगाही नहीं करती है। आदेशानुसार
            प्रबंधक प्रगतिवाद बाल विकास ट्रस्ट। </a>
    </marquee>
    <!--Main Slider-->
    <section class="main-slider" data-start-height="550">

        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    @php
                    $SliderFolder = public_path('assets/uploads/website/slider/');
                    $Slider =  App\Models\Slider::orderBy('created_at', 'DESC')->get();
                    @endphp
                    @foreach ($Slider as $sliderdata)
                    @php
                    $imagePath = $SliderFolder . $sliderdata['photo'];
                @endphp
                  @if (file_exists($imagePath))
                    <li data-thumb="{{ url('/') }}/public/assets/uploads/website/slider/{{ $sliderdata['photo'] }}"
                    data-title="{{  $sliderdata['title'] }}" class="noOverlay">
                    <img src="{{ url('/') }}/public/assets/uploads/website/slider/{{ $sliderdata['photo'] }}" alt="{{  $sliderdata['title'] }}" />
                </li>
                @endif
                @endforeach
                </ul>

            </div>
        </div>
    </section>
    <!--End Main Slider-->
    <!--About Section-->
    <section class="about-section grey-bg">
        <div class="auto-container">
            <div class="about-inner">
                <div class="row clearfix">
                    <!--Content Column-->
                    <div class="content-column col-md-7 col-sm-12 col-xs-12">
                        <div class="inner-box">
                            <div class="sec-title">
                                <h2>About Us</h2>
                            </div>
                            <div class="text text-justify">बिहार के सभी जिलों के ग्रामीण क्षेत्रों में प्रगतिवाद बाल विकास
                                योजना के अंतर्गत प्रगतिवाद बाल विद्यालय की स्थापना की जा रही है। इसे चलाने हेतु हर वार्ड में
                                एक सेविका और एक सहायिका की नियुक्ति की जा रही है। एवं सभी ब्लॉक में एक सुपरवाइजर की नियुक्ति
                                होगी। नियुक्ति की प्रक्रिया शुरू कर दी गई है । आवेदन फार्म के लिए कार्यालय से संपर्क करें।
                            </div>


                            <a href="{{ url('/') }}/assets/about" class="theme-btn btn-style-two">Read More</a>
                        </div>
                    </div>
                    <!--Image Column-->
                    <div class="image-column col-md-5 col-sm-12 col-xs-12">
                        <div class="panel bg-theme-color">
                            <h3 class="news-title">Latest News</h3>
                            <div class="panel-body bg-white">
                                @php
                                $Newses =  App\Models\News::orderBy('created_at', 'DESC')->get();
                                @endphp
                                @foreach ($Newses as $NewsesData)

                                <marquee behavior="scroll" scrollamount="3" direction="up" class="news-container"
                                onmouseout="this.start()" onmouseover="this.stop()">
                                    <p><i class="fa fa-angle-double-right text-success"></i>{{ $NewsesData['news'] }}</p>
                                </marquee>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section-->
    <!--Program Section-->
    <section class="causes-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h2>Our Program</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme">
                @php
                $servicesFolder = public_path('assets/uploads/website/services/');
                $services = DB::table("tbl_services")->where('status',1)->get();
                @endphp
                @foreach ($services as $servicesData)
                @php
                    $imagePath = $servicesFolder . $servicesData->photo;
                @endphp
                @if (file_exists($imagePath))
                <!--Default Cause Box-->
                <div class="default-cause-box">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="#"><img
                                        src="{{ url('/') }}/public/assets/uploads/website/services/{{ $servicesData->photo }}"
                                        alt="{{ $servicesData->title }}"></a>
                                <div class="overlay-box">
                                    <a href="#"
                                        class="theme-btn btn-style-one">Read More</a>
                                </div>
                            </figure>
                        </div>
                        <div class="donate-box">
                            <div class="upper-content">
                                <h3><a href="#">{{ $servicesData->title }}</a></h3>
                                <div class="text">
                                    {{ $servicesData->description }} </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </section>
    <!--Program Section End-->
    <!--Requirement Section-->
    <section class="causes-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#008000;">
                                    <th colspan="7" style="color:#fff; text-align:center; font-size:25px;">प्रगतिवाद
                                        बाल विद्यालय में नियुक्ति के लिए रिक्त स्थानों की विवरण</th>
                                </tr>
                                <tr>
                                    <th scope="col">क्र0 सं0</th>
                                    <th scope="col">पद</th>
                                    <th scope="col">मानदेय</th>
                                    <th scope="col">रिक्त स्थान</th>
                                    <th scope="col">योग्यता</th>
                                    <th scope="col">आवेदन शुल्क</th>
                                    <th scope="col">आवेदन करें</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                $requirement = App\Models\Requirement::where('status','1')->orderBy('created_at', 'DESC')->get();
                                $num = 1;
                                @endphp
                                @foreach ($requirement as $requirementData)

                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $requirementData->post1 }}</td>
                                    <td>{{ $requirementData->sallery }}</td>
                                    <td>{{ $requirementData->blank_place }}</td>
                                    <td>{{ $requirementData->qualification }}</td>
                                    <td>{{ $requirementData->reg_charge }}</td>
                                    <td><a href="{{ route("FrontEnd_member_join") }}" class="btn btn-success">Apply
                                        Now</a></td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Requirement Section End-->

    <!--Video Section-->
    <section class="causes-section">
        <div class="auto-container">
            <!--Sec Title-->
            <style>
                    .iframe-links .fecebook-iframe{
                        width: 100%;
                        height: 400px !important;
                    }

                    .iframe-links .youtube-iframe{
                        width: 100%;
                        height: 320px !important;
                    }
            </style>
            <div class="row iframe-links">
                <div class="col-lg-6 col-12">
                        <iframe class="fecebook-iframe" src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fnn24in%2Fvideos%2F1835675133431118%2F&show_text=false&width=560&t=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" ></iframe>
                        </div>
                        <div class="col-lg-6 col-12">
                        <iframe class="youtube-iframe" src="https://www.youtube.com/embed/ESivWUqi16o"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!--Video Section End-->
    <section class="causes-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h2>Charity Volunteers</h2>
            </div>
            <div class="five-item-carousel owl-carousel owl-theme">

                @php
                $Guest_memberFolder = public_path('assets/uploads/website/Guest_member/');
                $Guest_member = DB::table("tbl_guest_member")->where('status',1)->get();
                @endphp
                @foreach ($Guest_member as $Guest_memberData)
                @php
                    $imagePath = $Guest_memberFolder . $Guest_memberData->photo;
                @endphp
                <!--Default Cause Box-->
                <div class="default-cause-box">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                @if (file_exists($imagePath))
                                <img height="191px" style="" src="{{ url('/') }}/public/assets/uploads/website/Guest_member/{{ $Guest_memberData->photo }}"
                                    alt="{{ $Guest_memberData->title }}">
                                    @else
                                    <img style="max-width: 195px;margin-left:25px;" src="{{ url('/') }}/public/assets/uploads/website/Guest_member/gust_member.png"
                                    alt="{{ $Guest_memberData->title }}">
                                    @endif
                            </figure>
                        </div>
                        <div class="donate-box">
                            <div class="upper-content">
                                <h3>{{ $Guest_memberData->title }}</h3>
                                <div class="text">{{ $Guest_memberData->description }}</div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="fullwidth-gallery">
        <div class="sec-title centered">
            <h2>Our Gallery</h2>
        </div>
        <div class="five-item-carousel owl-carousel owl-theme">
              <style>
                       .image-box .gallary-images {
  height: 200px;
  width: 300px;
  object-fit: cover;
}
                    </style>
            @php
            $galleryFolder = public_path('assets/uploads/website/gallery/');
            $gallery =  App\Models\Gallery::orderBy('created_at', 'DESC')->get();
            @endphp
            @foreach ($gallery as $galleryData)
            @php
            $imagePath = $galleryFolder . $galleryData['photo'];
        @endphp

        @if (file_exists($imagePath))
            <!--Default Portfolio Item-->
            <div class="default-portfolio-item">
                <div class="inner-box">

                    <figure class="image-box"><img class="gallary-images"
                            src="{{ url('/') }}/public/assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                            alt="{{ $galleryData['title'] }}"></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <a href="assets/uploads/website/gallery/{{ $galleryData['photo'] }}"
                                    class="lightbox-image image-link" data-fancybox-group="example-gallery"
                                    title="{{ $galleryData['title'] }}"><span class="icon fa fa-expand"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </section>
    <!--End FullWidth Section-->

@endsection("main-section")
