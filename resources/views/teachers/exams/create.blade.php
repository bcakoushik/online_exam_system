@extends('teachers.layouts.app')

@section('title', 'Create Exam')

@section('content')
<h2 class="text-center my-auto">Create Exam</h2>
<div class="container mt-4 w-50  p-5 shadow-sm border-top border-primary border-3">

    <form action="{{ route('exams.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Exam Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Exam Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Exam</button>
    </form>
</div>
@endsection
