<?php

namespace App\Http\Controllers\Teacher;
use App\Models\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    // Index Method
    public function index()
    {
        $exams = Exam::where('created_by', Auth::id())->latest()->get();
        return view('teachers.exams.index', compact('exams'));
    }

    // Create Method
    public function create()
    {
        return view('teachers.exams.create');
    }

    //Store Method
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date|after_or_equal:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        Exam::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('teacher.exams.index')->with('success', 'Exam created successfully!');
    }

    //Show Method
    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view('teachers.exams.show', compact('exam'));
    }

    //Edit Method
    public function edit(Exam $exam)
    {
        return view('teachers.exams.edit', compact('exam'));
    }

    //Upload Method
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $exam->update($request->all());

        return redirect()->route('teacher.exams.index')->with('success', 'Exam updated successfully.');
    }

    //delete method
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('teacher.exams.index')->with('success', 'Exam deleted successfully.');
    }


}
