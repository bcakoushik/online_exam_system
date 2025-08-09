@extends('teachers.layouts.app')

@section('title', 'Edit Exam')

@section('content')
<h2 class="text-center">Edit Exam</h2>
<<<<<<< HEAD
<div class="container mt-4 p-4 w-50 shadow-sm border-top border-warning border-3">
=======
<div class="container mt-4 p-4 w-50 shadow-sm border-top border-warning border-3 form-container">
>>>>>>> 856b166e47b5951102ba87fd1c9ca5dcc94e45b9
    <form method="POST" action="{{ route('teacher.exams.update', $exam->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
<<<<<<< HEAD
            <label for="title" class="form-label">Exam Title</label>
=======
            <label for="title" class="form-label custom-form-label">Exam Title</label>
>>>>>>> 856b166e47b5951102ba87fd1c9ca5dcc94e45b9
            <input type="text" name="title" class="form-control" value="{{ old('title', $exam->title) }}" required>
        </div>

        <div class="mb-3">
<<<<<<< HEAD
            <label for="description" class="form-label">Description (Optional)</label>
=======
            <label for="description" class="form-label custom-form-label">Description (Optional)</label>
>>>>>>> 856b166e47b5951102ba87fd1c9ca5dcc94e45b9
            <textarea name="description" class="form-control">{{ old('description', $exam->description) }}</textarea>
        </div>

        <div class="mb-3">
<<<<<<< HEAD
            <label for="start_time" class="form-label">Start Time</label>
=======
            <label for="start_time" class="form-label custom-form-label">Start Time</label>
>>>>>>> 856b166e47b5951102ba87fd1c9ca5dcc94e45b9
            <input type="datetime-local" name="start_time" class="form-control"
                   value="{{ old('start_time', \Carbon\Carbon::parse($exam->start_time)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
<<<<<<< HEAD
            <label for="end_time" class="form-label">End Time</label>
=======
            <label for="end_time" class="form-label custom-form-label">End Time</label>
>>>>>>> 856b166e47b5951102ba87fd1c9ca5dcc94e45b9
            <input type="datetime-local" name="end_time" class="form-control"
                   value="{{ old('end_time', \Carbon\Carbon::parse($exam->end_time)->format('Y-m-d\TH:i')) }}" required>
        </div>

<<<<<<< HEAD
        <button type="submit" class="btn btn-warning">Update Exam</button>
=======
        
         <div class="mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-warning custom-submit-button">Update Exam</button>
            </div>
>>>>>>> 856b166e47b5951102ba87fd1c9ca5dcc94e45b9
    </form>
</div>
@endsection
