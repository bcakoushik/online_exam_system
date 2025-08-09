@extends('teachers.layouts.app')

@section('title', 'Edit Question')

@section('content')
    <h2 class="text-center">Edit Question</h2>
    <div class="container mt-4 p-4 w-50 shadow-sm border-top border-warning border-3 form-container">
        <form method="POST" action="{{ route('teacher.questions.update', $question->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="exam_id" class="form-label custom-form-label">Select Exam</label>
                <select class="form-select" name="exam_id" required>
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}" {{ $question->exam_id == $exam->id ? 'selected' : '' }}>
                            {{ $exam->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="question_text" class="form-label custom-form-label">Question</label>
                <textarea name="question_text" class="form-control" rows="3"
                    required>{{ old('question_text', $question->question_text) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label custom-form-label">Question Type</label>
                <select name="type" class="form-select" onchange="toggleMCQOptions(this.value)" required>
                    <option value="mcq" {{ $question->type == 'mcq' ? 'selected' : '' }}>MCQ</option>
                    <option value="descriptive" {{ $question->type == 'descriptive' ? 'selected' : '' }}>Descriptive</option>
                </select>
            </div>

            {{-- MCQ Options --}}
            <div id="mcq-options" style="{{ $question->type == 'mcq' ? '' : 'display:none;' }}">
                <label class="form-label custom-form-label">Options</label>
                @php
                    $options = is_array($question->options) ? $question->options : json_decode($question->options, true);
                @endphp
                @for ($i = 0; $i < 4; $i++)
                    <input type="text" name="options[]" class="form-control mb-2" placeholder="Option {{ $i + 1 }}"
                        value="{{ old('options.' . $i, $options[$i] ?? '') }}">
                @endfor
                <div class="mb-3">
                    <label for="correct_answer" class="form-label custom-form-label">Correct Answer</label>
                    <input type="text" name="correct_answer" class="form-control"
                        value="{{ old('correct_answer', $question->correct_answer) }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="marks" class="form-label custom-form-label">Marks</label>
                <input type="number" name="marks" class="form-control" value="{{ old('marks', $question->marks) }}" required
                    min="1">
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-warning custom-submit-button">Update Question</button>
            </div>
        </form>
    </div>

    <script>
        function toggleMCQOptions(value) {
            document.getElementById('mcq-options').style.display = value === 'mcq' ? 'block' : 'none';
        }
    </script>
@endsection