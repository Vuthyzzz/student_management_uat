@extends('layouts.app')

@section('title', 'Teacher Details')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow p-8">
    <h2 class="text-2xl font-semibold mb-6">Teacher Details</h2>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <strong>Name</strong>
            <p class="mt-1">{{ $teacher->name }}</p>
        </div>
        <div>
            <strong>Email</strong>
            <p class="mt-1">{{ $teacher->email }}</p>
        </div>
        <div>
            <strong>Phone</strong>
            <p class="mt-1">{{ $teacher->phone }}</p>
        </div>
        <div>
            <strong>Subject</strong>
            <p class="mt-1">{{ $teacher->subject }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('teachers.index') }}" class="px-5 py-3 bg-gray-200 rounded-lg hover:bg-gray-300">Back to Teachers</a>
    </div>
</div>
@endsection
