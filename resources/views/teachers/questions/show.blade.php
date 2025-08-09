@extends('teachers.layouts.app')

@section('title', 'Question Details')

@section('content')
<div class="container mt-4 p-4 shadow-sm border-top border-primary border-3">
    <h2 class="mb-4 text-center text-primary">Question Details</h2>

    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th style="width: 25%">Exam Title</th>
                <td>{{ $question->exam->title ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Question</th>
                <td>{{ $question->question_text }}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>{{ ucfirst($question->type) }}</td>
            </tr>
            <tr>
                <th>Marks</th>
                <td>{{ $question->marks }}</td>
            </tr>
        </tbody>
    </table>

    @if($question->type === 'mcq' && $question->options)
        <div class="mt-4">
            <h5 class="text-primary">Options</h5>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Option</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(json_decode($question->options, true) as $index => $option)
                        @php
                            $isCorrect = trim($option) === trim($question->correct_answer);
                        @endphp
                        <tr class="{{ $isCorrect ? 'table-success' : 'table-danger' }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $option }}</td>
                            <td>
                                @if($isCorrect)
                                    <span class="text-success fw-bold">Correct</span>
                                @else
                                    <span class="text-danger">Wrong</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="mt-3">
            <strong>Answer:</strong>
            <p class="text-info">{{ $question->correct_answer ?? 'Not Provided' }}</p>
        </div>
    @endif

    <a href="{{ route('teacher.questions.index') }}" class="btn btn-primary btn-sm mt-4">
        <i class="fa-solid fa-arrow-left"></i> Back to Questions
    </a>
</div>
@endsection
