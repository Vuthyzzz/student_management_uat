@extends('layouts.app')

@section('title', 'Grades')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold">Grades</h2>
        <a href="{{ route('grades.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Grade</a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 border-b">ID</th>
                    <th class="p-4 border-b">Student</th>
                    <th class="p-4 border-b">Subject</th>
                    <th class="p-4 border-b">Score</th>
                    <th class="p-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($grades as $grade)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4">{{ $grade->id }}</td>
                        <td class="p-4">{{ $grade->student_name }}</td>
                        <td class="p-4">{{ $grade->subject }}</td>
                        <td class="p-4">{{ $grade->score }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('grades.show', $grade) }}" class="px-3 py-1 bg-gray-200 rounded-lg">View</a>
                            <a href="{{ route('grades.edit', $grade) }}" class="px-3 py-1 bg-yellow-400 text-black rounded-lg">Edit</a>
                            <form action="{{ route('grades.destroy', $grade) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">No grades found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
