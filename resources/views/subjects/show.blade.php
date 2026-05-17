@extends('layouts.app')

@section('title', 'Subject Details')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow p-8">
    <h2 class="text-2xl font-semibold mb-6">Subject Details</h2>

    <div class="grid gap-4 sm:grid-cols-2">
        <div>
            <strong>Name</strong>
            <p class="mt-1">{{ $subject->name }}</p>
        </div>
        <div>
            <strong>Code</strong>
            <p class="mt-1">{{ $subject->code }}</p>
        </div>
        <div class="sm:col-span-2">
            <strong>Description</strong>
            <p class="mt-1">{{ $subject->description }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('subjects.index') }}" class="px-5 py-3 bg-gray-200 rounded-lg hover:bg-gray-300">Back to Subjects</a>
    </div>
</div>
@endsection
