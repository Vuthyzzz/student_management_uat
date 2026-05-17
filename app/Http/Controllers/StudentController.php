<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        Student::create($this->validateStudent($request));

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($this->validateStudent($request, $student));

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }

    protected function validateStudent(Request $request, Student $student = null): array
    {
        $uniqueEmailRule = $student
            ? Rule::unique('students', 'email')->ignore($student->id)
            : Rule::unique('students', 'email');

        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', $uniqueEmailRule],
            'phone' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            
            'photo' => ['nullable', 'url'],
        ]);
    }
}
