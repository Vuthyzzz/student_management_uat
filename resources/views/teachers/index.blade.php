@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold">Teachers</h2>
        <a href="{{ route('teachers.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Teacher</a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 border-b">ID</th>
                    <th class="p-4 border-b">Name</th>
                    <th class="p-4 border-b">Email</th>
                    <th class="p-4 border-b">Phone</th>
                    <th class="p-4 border-b">Subject</th>
                    <th class="p-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4">{{ $teacher->id }}</td>
                        <td class="p-4">{{ $teacher->name }}</td>
                        <td class="p-4">{{ $teacher->email }}</td>
                        <td class="p-4">{{ $teacher->phone }}</td>
                        <td class="p-4">{{ $teacher->subject }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('teachers.show', $teacher) }}" class="px-3 py-1 bg-gray-200 rounded-lg">View</a>
                            <a href="{{ route('teachers.edit', $teacher) }}" class="px-3 py-1 bg-yellow-400 text-black rounded-lg">Edit</a>
                            <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">No teachers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
