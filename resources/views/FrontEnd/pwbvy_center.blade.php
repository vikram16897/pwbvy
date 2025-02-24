@extends('FrontEnd.layout.main')
@section('main-section')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('/') }}/assets/site_assets/images/background/4.jpg);">
        <div class="auto-container">
            <h1>PWBVY center</h1>
        </div>
    </section>

    <!--Page Info-->
    <section class="page-info">
        <div class="auto-container clearfix">
            <div class="pull-left">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>PWBVY center</li>
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
                    <!--Content Column-->
                    <div class="content-column col-md-12 col-sm-12 col-xs-12">
                        <div class="inner-box">
                            <div class="sec-title">
                                <h2>PWBVY center</h2>
                            </div>
                        </div>
                        <div>
                            <input class="searchbox"
                                style="border:1px solid #6d6d6d; height:30px;width:300px;margin-bottom:3px;padding:5px;color:#000;"
                                type="text" id="searchInput" placeholder="Search Center...">
                        </div>
                        <style>
                            .center-data {
                                overflow: auto;
                            }

                            .center-data table {
                                border-top: 1px solid #7e7e7e;
                            }
                        </style>
                        <div>
                            <div class="center-data">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Sevika</th>
                                            <th>Shayika</th>
                                            <th>Ward number</th>
                                            <th>Place</th>
                                            <th>Panchayat</th>
                                            <th>Prakhand</th>
                                            <th>Center code</th>
                                        </tr>
                                    </thead>
                                    <tbody id="branchdata">
                                        @php
                                            $num = 1;
                                        @endphp
                                        @foreach ($downloads as $downloadData)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $downloadData['sevika'] }} </td>
                                                <td>{{ $downloadData['shayika'] }}</td>
                                                <td>{{ $downloadData['w_num'] }}</td>
                                                <td>{{ $downloadData['place'] }}</td>
                                                <td>{{ $downloadData['panchayat'] }}</td>
                                                <td>{{ $downloadData['prakhand'] }}</td>
                                                <td>{{ $downloadData['c_code'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                      <!-- search data -->
                                      <tbody id="names">
                                        @php
                                            $num = 1;
                                        @endphp
                                        @foreach ($branchData as $branchdata)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $branchdata['sevika'] }} </td>
                                                <td>{{ $branchdata['shayika'] }}</td>
                                                <td>{{ $branchdata['w_num'] }}</td>
                                                <td>{{ $branchdata['place'] }}</td>
                                                <td>{{ $branchdata['panchayat'] }}</td>
                                                <td>{{ $branchdata['prakhand'] }}</td>
                                                <td>{{ $branchdata['c_code'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--End About Section-->
@endsection("main-section")
