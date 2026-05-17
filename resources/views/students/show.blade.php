@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow p-8">
    <h2 class="text-2xl font-semibold mb-6">Student Details</h2>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <strong>Name</strong>
            <p class="mt-1">{{ $student->name }}</p>
        </div>
        <div>
            <strong>Email</strong>
            <p class="mt-1">{{ $student->email }}</p>
        </div>
        <div>
            <strong>Phone</strong>
            <p class="mt-1">{{ $student->phone }}</p>
        </div>
        <div>
            <strong>Gender</strong>
            <p class="mt-1">{{ ucfirst($student->gender) }}</p>
        </div>
    </div>

    <div class="mt-4">
        <strong>Address</strong>
        <p class="mt-1">{{ $student->address }}</p>
    </div>

    @if($student->photo)
    <div class="mt-4">
        <strong>Photo</strong>
        <div class="mt-2">
            <img src="{{ $student->photo }}" alt="{{ $student->name }}" class="rounded-lg max-h-64">
        </div>
    </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('students.index') }}" class="px-5 py-3 bg-gray-200 rounded-lg hover:bg-gray-300">Back to Students</a>
    </div>
</div>
@endsection
