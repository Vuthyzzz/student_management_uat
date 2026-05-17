<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        Subject::create($this->validateSubject($request));

        return redirect()->route('subjects.index');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($this->validateSubject($request, $subject));

        return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index');
    }

    protected function validateSubject(Request $request, Subject $subject = null): array
    {
        $uniqueCodeRule = $subject
            ? Rule::unique('subjects', 'code')->ignore($subject->id)
            : Rule::unique('subjects', 'code');

        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:50', $uniqueCodeRule],
            'description' => ['nullable', 'string'],
        ]);
    }
}
