@extends('layouts.app')

@section('title', 'Attendance Details')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow p-8">
    <h2 class="text-2xl font-semibold mb-6">Attendance Details</h2>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <strong>Student Name</strong>
            <p class="mt-1">{{ $attendance->student_name }}</p>
        </div>
        <div>
            <strong>Date</strong>
            <p class="mt-1">{{ $attendance->date }}</p>
        </div>
        <div class="sm:col-span-2">
            <strong>Status</strong>
            <p class="mt-1">{{ $attendance->status }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('attendance.index') }}" class="px-5 py-3 bg-gray-200 rounded-lg hover:bg-gray-300">Back to Attendance</a>
    </div>
</div>
@endsection
