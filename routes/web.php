<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Teacher\ExamController;
use App\Models\Teacher;

Route::get('', [HomeController::class, 'home'])->name('home')->name('home');
// Register and Login Route
Route::get('/register', [AuthController::class, 'showRegister'])->name('userRegister');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/verify-otp', [AuthController::class, 'showOtpForm']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('userLogin');
Route::post('/login', [AuthController::class, 'login']);

//logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Route Group
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Welcome Admin';
    });
});



// // Teachers Route Group
// Route::middleware(['auth', 'role:teacher'])->group(function () {
//     Route::get('/teacher', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
//     Route::get('/exams', [App\Http\Controllers\Teacher\ExamController::class, 'index'])->name('exams.index');
//     Route::get('/exams/create', [App\Http\Controllers\Teacher\ExamController::class, 'create'])->name('exams.create');
//     Route::post('/exams/store', [App\Http\Controllers\Teacher\ExamController::class, 'store'])->name('exams.store');
//     //  View Exam
//     Route::get('/exams/{exam}', [App\Http\Controllers\Teacher\ExamController::class, 'show'])->name('exams.show');
//     Route::get('/exams/{exam}/edit', [App\Http\Controllers\Teacher\ExamController::class, 'edit'])->name('exams.edit');
//     Route::put('/exams/{exam}', [App\Http\Controllers\Teacher\ExamController::class, 'update'])->name('exams.update');
//     Route::delete('/exams/{exam}', [App\Http\Controllers\Teacher\ExamController::class, 'destroy'])->name('exams.destroy');

// });


// Teacher Route Group
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {

    // Teacher Dashboard
    Route::get('/', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');

    // Exams CRUD
    Route::get('/exams', [App\Http\Controllers\Teacher\ExamController::class, 'index'])->name('teacher.exams.index');
    Route::get('/exams/create', [App\Http\Controllers\Teacher\ExamController::class, 'create'])->name('teacher.exams.create');
    Route::post('/exams/store', [App\Http\Controllers\Teacher\ExamController::class, 'store'])->name('teacher.exams.store');
    Route::get('/exams/{exam}', [App\Http\Controllers\Teacher\ExamController::class, 'show'])->name('teacher.exams.show');
    Route::get('/exams/{exam}/edit', [App\Http\Controllers\Teacher\ExamController::class, 'edit'])->name('teacher.exams.edit');
    Route::put('/exams/{exam}', [App\Http\Controllers\Teacher\ExamController::class, 'update'])->name('teacher.exams.update');
    Route::delete('/exams/{exam}', [App\Http\Controllers\Teacher\ExamController::class, 'destroy'])->name('teacher.exams.destroy');

    // Questions Resource Routes with Named Routes
    Route::resource('questions', App\Http\Controllers\Teacher\QuestionController::class)
        ->names([
            'index'   => 'teacher.questions.index',
            'create'  => 'teacher.questions.create',
            'store'   => 'teacher.questions.store',
            'show'    => 'teacher.questions.show',
            'edit'    => 'teacher.questions.edit',
            'update'  => 'teacher.questions.update',
            'destroy' => 'teacher.questions.destroy',
        ]);

        Route::get('name', function(){
            $teachers = Teacher::where('role', 'teacher')->get(); // Fetch only teachers

    // If you just want to return the names as plain text
    return "WELCOME". " " .  $teachers->pluck('name')->implode(', ');
        });
});



// Students Route Group
Route::middleware(['auth', 'role:student'])->group(function () {
    // Route::get('/student', function () {
    //     return 'Welcome Student';
    // });
    Route::get('/student', [StudentController::class, 'dashboard'])->name('StudentDashboard');
});
