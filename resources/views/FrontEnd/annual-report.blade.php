@extends('FrontEnd.layout.main')
@section('main-section')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
        <div class="auto-container">
            <h1></h1>
        </div>
    </section>

    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="pull-left">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Annual Report</li>
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

                <tr class="text-center">
                  <td>1</td>
                  <td>Pragativad bal vikas yojna activity Report </td>
                  <td>1715851875.pdf</td>
                  <td><a href="https://pwbvyindia.org/public/assets/uploads/website/download/1715851875.pdf" class="btn btn-primary" download>Download</a></td>
                </tr>

                <tr class="text-center">
                  <td>2</td>
                  <td>Pwbvy India Annual Report 2021 </td>
                  <td>1716452119.pdf</td>
                  <td><a href="https://pwbvyindia.org/public/assets/uploads/website/download/1716452119.pdf" class="btn btn-primary" download>Download</a></td>
                </tr>

                <tr class="text-center">
                  <td>3</td>
                  <td>Pwbvy India Annual Report 2021-2022 </td>
                  <td>1716452092.pdf</td>
                  <td><a href="https://pwbvyindia.org/public/assets/uploads/website/download/1716452092.pdf" class="btn btn-primary" download>Download</a></td>
                </tr>

                <tr class="text-center">
                  <td>4</td>
                  <td>Pwbvy India Annual Report 2022-2023 </td>
                  <td>1716452056.pdf</td>
                  <td><a href="https://pwbvyindia.org/public/assets/uploads/website/download/1716452056.pdf" class="btn btn-primary" download>Download</a></td>
                </tr>

                <tr class="text-center">
                  <td>5</td>
                  <td>Pwbvy India Annual Report 2024 </td>
                  <td>1716452171.pdf</td>
                  <td><a href="https://pwbvyindia.org/public/assets/uploads/website/download/1716452171.pdf" class="btn btn-primary" download>Download</a></td>
                </tr>

                </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>
</section>
<!-- end main-content -->
@endsection("main-section")
