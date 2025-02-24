@extends("FrontEnd.layout.main")
@section("main-section")



                    <!--Page Title-->
        <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
            <div class="auto-container">
                <h1>DOWNLOAD</h1>
            </div>
        </section>

        <!--Page Info-->
        <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>DOWNLOAD</li>
                    </ul>
                </div>

            </div>
        </section>
        <!--End Page Info-->

        <!--About Section-->
        <section class="about-section grey-bg">
            <div class="auto-container">
                <div class="about-inner">
                    <div class="row clearfix">
          <div class="col-md-12">
            <div class="border-1px p-25">
              <!--<h4 class="text-theme-colored text-uppercase m-0">DOWNLOAD</h4>-->
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">#</th>
                      <th scope="col" class="text-center">Document Title</th>
                      <th scope="col" class="text-center">Document</th>
                      <th scope="col" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $Download =  App\Models\Download::orderBy('created_at', 'ASC')->get();
                    $num = 1;
                    @endphp
                    @foreach ($Download as $downloadData)

                    <tr class="text-center">
                      <td>{{ $num++ }}</td>
                      <td>{{ $downloadData['title'] }} </td>
                      <td>{{ $downloadData['file'] }}</td>
                      <td><a href="{{ url('/') }}/public/assets/uploads/website/download/{{ $downloadData['file'] }}" class="btn btn-primary" download>Download</a></td>
                    </tr>
                    @endforeach

                    </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->

  @endsection("main-section")
