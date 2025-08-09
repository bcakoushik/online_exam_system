@extends('teachers.layouts.app')

@section('title', 'Exam Details')

@section('content')
<div class="container mt-4 p-4 shadow-sm border-top border-primary border-3">
    <h2 class="mb-4 text-center text-primary">Exam Details</h2>

    <div class="mb-3">
        <strong>Title:</strong>
        <p>{{ $exam->title }}</p>
    </div>

    <div class="mb-3">
        <strong>Description:</strong>
        <p>{{ $exam->description ?? 'N/A' }}</p>
    </div>

    <div class="mb-3">
        <strong>Start Time:</strong>
        <p>{{ $exam->start_time }}</p>
    </div>

    <div class="mb-3">
        <strong>End Time:</strong>
        <p>{{ $exam->end_time }}</p>
    </div>

<<<<<<< HEAD
    <a href="{{ route('teacher.exams.index') }}" class="btn btn-secondary">
=======
    <a href="{{ route('teacher.exams.index') }}" class="btn btn-primary btn sm">
>>>>>>> 856b166e47b5951102ba87fd1c9ca5dcc94e45b9
        <i class="fa-solid fa-arrow-left"></i> Back to My Exams
    </a>
</div>
@endsection
