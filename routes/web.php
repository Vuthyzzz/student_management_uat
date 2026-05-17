<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AttendanceController;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Attendance;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('grades', GradeController::class);
Route::resource('attendance', AttendanceController::class)->parameters([
    'attendance' => 'attendance'
]);

Route::get('/dashboard', function () {
    $studentCount = Student::count();
    $teacherCount = Teacher::count();
    $subjectCount = Subject::count();
    $attendanceCount = Attendance::count();
    $gradeCount = Grade::count();
    $presentCount = Attendance::whereRaw("LOWER(status) = 'present'")->count();
    $attendanceRate = $attendanceCount > 0 ? round(($presentCount / $attendanceCount) * 100) : 0;
    $recentStudents = Student::latest()->take(5)->get();

    $chartData = Grade::selectRaw('subject, AVG(CAST(score AS DECIMAL(6,2))) as average')
        ->groupBy('subject')
        ->pluck('average', 'subject')
        ->toArray();

    return view('dashboard.index', compact(
        'studentCount',
        'teacherCount',
        'subjectCount',
        'attendanceRate',
        'recentStudents',
        'chartData'
    ));
});
