@extends('layouts.app')

@section('title', 'Edit Attendance')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow p-8">
    <h2 class="text-2xl font-semibold mb-6">Edit Attendance Record</h2>

    <form action="{{ route('attendance.update', $attendance) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-gray-700">Student Name</label>
                <input type="text" name="student_name" value="{{ old('student_name', $attendance->student_name) }}" class="w-full rounded border-gray-300 p-3" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" value="{{ old('date', $attendance->date) }}" class="w-full rounded border-gray-300 p-3" required>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" value="{{ old('status', $attendance->status) }}" class="w-full rounded border-gray-300 p-3" required>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update Attendance</button>
            <a href="{{ route('attendance.index') }}" class="px-5 py-3 border border-gray-300 rounded-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection
