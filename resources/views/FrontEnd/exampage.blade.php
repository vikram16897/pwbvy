@extends("FrontEnd.layout.main")
@section("main-section")
<div class="container">
    <h2 class="text-center">Exam</h2>
    <h3>Name: {{$userData->name}}</h3>
    <h4>Email: {{$userData->email}}</h4>
    <h4>Class: {{$userData->class_name}}</h4>
    <div id="timer" class="text-center text-danger font-weight-bold">30:00</div>
    <form id="examForm" action="{{ route('exam.submit') }}" method="POST">
        @csrf
        <input type="hidden" value="{{$userData->user_id}}" name="user_id">
        @foreach($questions as $index => $question)
    <div class="mb-4">
        <p><strong>{{ $index + 1 }}. {{ $question->question }}</strong></p>
    
        
        @php
            $options = [$question->option_1, $question->option_2, $question->option_3, $question->option_4];
        @endphp

        @foreach($options as $option)
        
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" required>
                <label class="form-check-label">{{ $option }}</label>
            </div>
        @endforeach
    </div>
@endforeach

        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script>
    let timeLeft = 30 * 60; // 30 minutes in seconds
    const timerDisplay = document.getElementById('timer');
    const examForm = document.getElementById('examForm');

    function updateTimer() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            examForm.submit();
        }
        timeLeft--;
    }

    const timerInterval = setInterval(updateTimer, 1000);
</script>
@endsection("main-section")
