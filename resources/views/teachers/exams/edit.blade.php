@extends('teachers.layouts.app')

@section('title', 'Edit Exam')

@section('content')
<h2 class="text-center">Edit Exam</h2>
<div class="container mt-4 p-4 w-50 shadow-sm border-top border-warning border-3">
    <form method="POST" action="{{ route('exams.update', $exam->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Exam Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $exam->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea name="description" class="form-control">{{ old('description', $exam->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control"
                   value="{{ old('start_time', \Carbon\Carbon::parse($exam->start_time)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control"
                   value="{{ old('end_time', \Carbon\Carbon::parse($exam->end_time)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update Exam</button>
    </form>
</div>
@endsection
