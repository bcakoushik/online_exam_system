@extends('teachers.layouts.app')

@section('title', 'My Questions')

@section('content')
    <h2 class="text-center">My Questions</h2>
    <div class="container mt-4 p-5 shadow-sm border-top border-primary border-3">
        <a href="{{ route('teacher.questions.create') }}" class="btn btn-success mb-3 float-end">
            <i class="fa-solid fa-plus"></i> Add Question
        </a>
        <table class="table table-bordered align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>Exam</th>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Marks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($questions as $question)
                    <tr>
                        <td>{{ $question->exam->title ?? 'N/A' }}</td>
                        <td>{{ Str::limit($question->question_text, 50) }}</td>
                        <td>{{ ucfirst($question->type) }}</td>
                        <td>{{ $question->marks }}</td>
                        <td>
                            <a href="{{ route('teacher.questions.show', $question->id) }}" class="btn btn-sm btn-info me-1" title="View">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('teacher.questions.edit', $question->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('teacher.questions.destroy', $question->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this question?');">
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
                        <td colspan="5" class="text-center text-muted">No questions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
