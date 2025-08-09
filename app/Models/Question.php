<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;

class Question extends Model
{
    use HasFactory;
      protected $fillable = [
        'exam_id', 'question_text', 'type', 'options', 'correct_answer', 'marks',
    ];

     // This defines the relationship to the Exam
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
