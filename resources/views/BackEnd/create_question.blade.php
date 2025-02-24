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
                                    <li class="breadcrumb-item active text-capitalize">Question</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Questions</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


<!-- Success message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('questions.store') }}" method="POST">
    @csrf

    <div class="mb-3">
    <label for="className" class="form-label">Class Name</label>
    <select class="form-select @error('className') is-invalid @enderror" id="className" name="className" style="width: 50%; height: 40px;">
        <option value="">Select a class</option>
        @foreach($classes as $class)
            <option value="{{ $class->id }}" {{ old('className', 4) == $class->id ? 'selected' : '' }}>
                {{ $class->class_name }}
            </option>
        @endforeach
    </select>
    @error('className')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

    <!-- Question input -->
    <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <textarea class="form-control @error('question') is-invalid @enderror" id="question" name="question" rows="3" placeholder="Enter your question">{{ old('question') }}</textarea>
        @error('question')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Options inputs -->
    @for ($i = 1; $i <= 4; $i++)
        <div class="mb-3">
            <label for="option{{ $i }}" class="form-label">Option {{ $i }}</label>
            <input type="text" class="form-control @error('option' . $i) is-invalid @enderror" id="option{{ $i }}" name="option{{ $i }}" placeholder="Enter option {{ $i }}" value="{{ old('option' . $i) }}">
            @error('option' . $i)
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endfor

    <!-- Answer input -->
    <div class="mb-3">
        <label for="answer" class="form-label">Answer</label>
        <input type="text" class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" placeholder="Enter the correct answer" value="{{ old('answer') }}">
        @error('answer')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

 

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary my-3">Submit</button>
</form>
</div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
</div>

<!-- Modal -->
<style>
    .overflow-y-auto{
        overflow-y: auto;
        max-height: 300px;
    }
</style>


    <!-- /.content-wrapper -->
@endsection("main-section")

