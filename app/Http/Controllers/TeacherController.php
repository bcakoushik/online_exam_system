<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
   public function dashboard()
{
    $teachers = Teacher::where('role', 'teacher')->get(); // ✅ only fetch users with role 'teacher'
    return view('teachers.dashboard', compact('teachers'));
}
}
