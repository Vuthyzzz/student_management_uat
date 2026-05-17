@extends('layouts.app')

@section('title', 'Subjects')

@section('content')
<div class="flex flex-col gap-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold">Subjects</h2>
        <a href="{{ route('subjects.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Subject</a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 border-b">ID</th>
                    <th class="p-4 border-b">Name</th>
                    <th class="p-4 border-b">Code</th>
                    <th class="p-4 border-b">Description</th>
                    <th class="p-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subjects as $subject)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4">{{ $subject->id }}</td>
                        <td class="p-4">{{ $subject->name }}</td>
                        <td class="p-4">{{ $subject->code }}</td>
                        <td class="p-4">{{ $subject->description }}</td>
                        <td class="p-4 space-x-2">
                            <a href="{{ route('subjects.show', $subject) }}" class="px-3 py-1 bg-gray-200 rounded-lg">View</a>
                            <a href="{{ route('subjects.edit', $subject) }}" class="px-3 py-1 bg-yellow-400 text-black rounded-lg">Edit</a>
                            <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">No subjects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
