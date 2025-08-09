@extends('teachers.layouts.app')

@section('title', 'Create Exam')

@section('content')
<<<<<<< HEAD
<h2 class="text-center my-auto">Create Exam</h2>
<div class="container mt-4 w-50  p-5 shadow-sm border-top border-primary border-3">

    <form action="{{ route('teacher.exams.store') }}" method="POST">
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
=======
    <h2 class="text-center my-auto">Create Exam</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4 w-50  p-5 shadow-sm border-top border-primary border-3 form-container">

        <form action="{{ route('teacher.exams.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label custom-form-label">Exam Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label custom-form-label">Exam Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="start_time" class="form-label custom-form-label">Start Time</label>
                <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
            </div>

            <div class="mb-3">
                <label for="end_time" class="form-label custom-form-label">End Time</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary custom-submit-button">Create Exam</button>
            </div>
        </form>
    </div>
@endsection
>>>>>>> 856b166e47b5951102ba87fd1c9ca5dcc94e45b9
