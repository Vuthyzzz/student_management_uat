@extends('layouts.app')

@section('title', 'Grade Details')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow p-8">
    <h2 class="text-2xl font-semibold mb-6">Grade Details</h2>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <strong>Student Name</strong>
            <p class="mt-1">{{ $grade->student_name }}</p>
        </div>
        <div>
            <strong>Subject</strong>
            <p class="mt-1">{{ $grade->subject }}</p>
        </div>
        <div class="sm:col-span-2">
            <strong>Score</strong>
            <p class="mt-1">{{ $grade->score }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('grades.index') }}" class="px-5 py-3 bg-gray-200 rounded-lg hover:bg-gray-300">Back to Grades</a>
    </div>
</div>
@endsection
