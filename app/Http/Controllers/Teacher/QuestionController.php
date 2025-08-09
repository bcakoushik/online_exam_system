<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Exam;

class QuestionController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $questions = Question::with( 'exam' )->latest()->get();
        return view( 'teachers.questions.index', compact( 'questions' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        $exams = Exam::latest()->get();
        return view( 'teachers.questions.create', compact( 'exams' ) );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $request->validate( [
            'exam_id'        => 'required|exists:exams,id',
            'question_text'  => 'required|string',
            'type'           => 'required|in:mcq,descriptive',
            'marks'          => 'required|integer|min:1',
            'options'        => 'nullable|array',
            'options.*'      => 'nullable|string',
            'correct_answer' => 'nullable|string',
        ] );

        $question = new Question();
        $question->exam_id = $request->exam_id;
        $question->question_text = $request->question_text;
        $question->type = $request->type;
        $question->marks = $request->marks;

        if ( $request->type === 'mcq' ) {
            $question->options = json_encode( $request->options );
            $question->correct_answer = $request->correct_answer;
        }

        $question->save();

        return redirect()->route( 'teacher.questions.index' )->with( 'success', 'Question created successfully!' );
    }

    /**
    * Display the specified resource.
    */

 public function show($id)
{
    $question = Question::findOrFail($id);
    return view('teachers.questions.show', compact('question'));
}



    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $question = Question::findOrFail( $id );
        $exams = Exam::all();
        return view( 'teachers.questions.edit', compact( 'question', 'exams' ) );
    }

    /**
    * Update the specified resource in storage.
    */

   public function update(Request $request, string $id)
{
    $request->validate([
        'exam_id'        => 'required|exists:exams,id',
        'question_text'  => 'required|string',
        'type'           => 'required|in:mcq,descriptive',
        'marks'          => 'required|integer|min:1',
        'options'        => 'nullable|array',
        'options.*'      => 'nullable|string',
        'correct_answer' => 'nullable|string',
    ]);

    $question = Question::findOrFail($id);
    $question->exam_id = $request->exam_id;
    $question->question_text = $request->question_text;
    $question->type = $request->type;
    $question->marks = $request->marks;

    if ($request->type === 'mcq') {
        $question->options = json_encode($request->options);
        $question->correct_answer = $request->correct_answer;
    } else {
        $question->options = null;
        $question->correct_answer = $request->correct_answer; // you can decide to keep or nullify this
    }

    $question->save();

    return redirect()->route('teacher.questions.index')->with('success', 'Question updated successfully!');
}


    /**
    * Remove the specified resource from storage.
    */

   public function destroy(string $id)
{
    $question = Question::findOrFail($id);
    $question->delete();

    return redirect()->route('teacher.questions.index')->with('success', 'Question deleted successfully!');
}

}
