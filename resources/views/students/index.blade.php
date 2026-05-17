@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold">Students</h2>
        <a href="{{ route('students.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Student</a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 border-b">ID</th>
                    <th class="p-4 border-b">Name</th>
                    <th class="p-4 border-b">Email</th>
                    <th class="p-4 border-b">Phone</th>
                    <th class="p-4 border-b">Gender</th>
                    <th class="p-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4">{{ $student->id }}</td>
                        <td class="p-4">{{ $student->name }}</td>
                        <td class="p-4">{{ $student->email }}</td>
                        <td class="p-4">{{ $student->phone }}</td>
                        <td class="p-4">{{ ucfirst($student->gender) }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('students.edit', $student) }}" class="px-3 py-1 bg-yellow-400 text-black rounded-lg">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">No students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
