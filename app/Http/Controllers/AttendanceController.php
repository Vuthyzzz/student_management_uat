<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();

        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendance.create');
    }

    public function store(Request $request)
    {
        Attendance::create($this->validateAttendance($request));

        return redirect()->route('attendance.index');
    }

    public function show(Attendance $attendance)
    {
        return view('attendance.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        return view('attendance.edit', compact('attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update($this->validateAttendance($request));

        return redirect()->route('attendance.index');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance.index');
    }

    protected function validateAttendance(Request $request): array
    {
        return $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'status' => ['required', 'string', 'max:50'],
        ]);
    }
}
