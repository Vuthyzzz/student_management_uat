@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow p-8">
    <h2 class="text-2xl font-semibold mb-6">Add New Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded border-gray-300 p-3" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded border-gray-300 p-3" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full rounded border-gray-300 p-3" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <input type="text" name="gender" value="{{ old('gender') }}" class="w-full rounded border-gray-300 p-3" required>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Address</label>
            <textarea name="address" rows="4" class="w-full rounded border-gray-300 p-3" required>{{ old('address') }}</textarea>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Photo URL</label>
            <input type="url" name="photo" value="{{ old('photo') }}" class="w-full rounded border-gray-300 p-3">
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Student</button>
            <a href="{{ route('students.index') }}" class="px-5 py-3 border border-gray-300 rounded-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection
