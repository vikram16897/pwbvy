@extends("FrontEnd.layout.main")
@section("main-section")



 <section class="page-info">
            <div class="auto-container clearfix">
                <div class="pull-left">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Examination</li>
                    </ul>
                </div>

            </div>
        </section>
<!--About Section-->
<section class="about-section grey-bg">
    <div class="auto-container">
        <div class="about-inner">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="border-1px p-25">
                        <h4 class="text-theme-colored text-uppercase m-0">EDUCATION</h4>
                        <div class="line-bottom mb-30"></div>
                   
                        <!-- Buttons Section -->
                         @if(auth()->user()!=null)
                        <div class="button-group text-center">
                            <!-- <a href="login.html" class="btn btn-primary btn-lg">Login</a>
                            <a href="start-exam.html" class="btn btn-secondary btn-lg">Start Exam</a> -->
                           
                            @if(auth()->User()->role=='student')
                            <!-- <a href="/exampstart/{auth()->User()->id}" class="btn btn-success btn-lg" role="button" aria-pressed="true">Start Exam</a> -->
                            <a href="{{ route('FrontEnd_examastart', ['id' => auth()->user()->id]) }}" class="btn btn-success btn-lg" role="button" aria-pressed="true">Start Exam</a>

                            @else
                            <a href="{{Route('login')}}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Login</a>
                            @endif
                            
                        </div>
                        @else
                        <div class="button-group text-center">
                            <!-- <a href="login.html" class="btn btn-primary btn-lg">Login</a>
                            <a href="start-exam.html" class="btn btn-secondary btn-lg">Start Exam</a> -->
                            <a href="{{Route('login')}}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Login</a>
                           
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- end main-content -->
@endsection("main-section")
