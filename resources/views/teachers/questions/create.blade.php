@extends('teachers.layouts.app')

@section('title', 'Create Question')

@section('content')
    <h2 class="text-center my-auto">Create Question</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4 w-50 p-5 shadow-sm border-top border-primary border-3 form-container">
        <form action="{{ route('teacher.questions.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="exam_id" class="form-label custom-form-label">Select Exam</label>
                <select class="form-select" id="exam_id" name="exam_id" required>
                    <option value="" disabled selected>Choose an Exam</option>
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="question_text" class="form-label custom-form-label">Question</label>
                <textarea class="form-control " id="question_text" name="question_text" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label custom-form-label">Question Type</label>
                <select class="form-select" id="type" name="type" required onchange="toggleMCQOptions(this.value)">
                    <option value="" disabled selected>Select Type</option>
                    <option value="mcq">Multiple Choice (MCQ)</option>
                    <option value="descriptive">Descriptive</option>
                </select>
            </div>

            {{-- MCQ Options --}}
            <div id="mcq-options" style="display: none;">
                <div class="mb-2">
                    <label class="custom-form-label">Options</label>
                    @for ($i = 0; $i < 4; $i++)
                        <input type="text" name="options[]" class="form-control mb-2" placeholder="Option {{ $i + 1 }}">
                    @endfor
                </div>

                <div class="mb-3">
                    <label for="correct_answer" class="form-label custom-form-label">Correct Answer</label>
                    <input type="text" class="form-control" name="correct_answer" id="correct_answer">
                </div>
            </div>

            <div class="mb-3">
                <label for="marks" class="form-label custom-form-label">Marks</label>
                <input type="number" class="form-control" id="marks" name="marks" required min="1">
            </div>

            <div class="mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary custom-submit-button mx-auto">Create Question</button>
            </div>
        </form>
    </div>

    <script>
        function toggleMCQOptions(value) {
            const mcqDiv = document.getElementById('mcq-options');
            mcqDiv.style.display = value === 'mcq' ? 'block' : 'none';
        }
    </script>
@endsection