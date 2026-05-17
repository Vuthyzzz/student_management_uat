<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();

        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        Grade::create($this->validateGrade($request));

        return redirect()->route('grades.index');
    }

    public function show(Grade $grade)
    {
        return view('grades.show', compact('grade'));
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $grade->update($this->validateGrade($request));

        return redirect()->route('grades.index');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index');
    }

    protected function validateGrade(Request $request): array
    {
        return $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'score' => ['required', 'string', 'max:50'],
        ]);
    }
}
