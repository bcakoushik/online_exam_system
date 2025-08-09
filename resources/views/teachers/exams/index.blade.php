@extends('teachers.layouts.app')

@section('title', 'My Exams')

@section('content')
    <h2 class="text-center">My Exams</h2>
    <div class="container mt-4 p-5 shadow-sm border-top border-primary border-3">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>Title</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($exams as $exam)
                    <tr>
                        <td>{{ $exam->title }}</td>
                        <td>{{ $exam->start_time }}</td>
                        <td>{{ $exam->end_time }}</td>
                        <td>
                            <a href="{{ route('teacher.exams.show', $exam->id) }}" class="btn btn-sm btn-info me-1" title="View">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('teacher.exams.edit', $exam->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('teacher.exams.destroy', $exam->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this exam?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No exams found.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
@endsection
