@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">

    <div class="bg-blue-500 text-white p-5 rounded-xl shadow">
        <h2 class="text-lg">Students</h2>
        <p class="text-3xl font-bold">{{ $studentCount }}</p>
    </div>

    <div class="bg-green-500 text-white p-5 rounded-xl shadow">
        <h2 class="text-lg">Teachers</h2>
        <p class="text-3xl font-bold">{{ $teacherCount }}</p>
    </div>

    <div class="bg-yellow-500 text-white p-5 rounded-xl shadow">
        <h2 class="text-lg">Subjects</h2>
        <p class="text-3xl font-bold">{{ $subjectCount }}</p>
    </div>

    <div class="bg-red-500 text-white p-5 rounded-xl shadow">
        <h2 class="text-lg">Attendance</h2>
        <p class="text-3xl font-bold">{{ $attendanceRate }}%</p>
    </div>

</div>

<!-- Chart Section -->
<div class="mt-8 bg-white p-6 rounded-xl shadow">
    <h2 class="text-lg font-semibold mb-4">Student Performance</h2>

    @if(count($chartData) > 0)
        <div class="w-full overflow-x-auto">
            <canvas id="chart" class="w-full max-w-full h-72"></canvas>
        </div>
    @else
        <p class="text-gray-500">No grade data available yet.</p>
    @endif
</div>

<!-- Table Section -->
<div class="mt-8 bg-white p-6 rounded-xl shadow">

    <h2 class="text-lg font-semibold mb-4">Recent Students</h2>

    <div class="overflow-x-auto">
        <table class="w-full min-w-[480px] border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Phone</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentStudents as $student)
                    <tr class="text-center border-t">
                        <td class="p-2">{{ $student->id }}</td>
                        <td class="p-2">{{ $student->name }}</td>
                        <td class="p-2">{{ $student->email }}</td>
                        <td class="p-2">{{ $student->phone }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-2 text-center text-gray-500" colspan="4">No student records yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@if(count($chartData) > 0)
<script>
const ctx = document.getElementById('chart');
const labels = @json(array_keys($chartData));
const scores = @json(array_values($chartData));

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Average Score',
            data: scores,
            borderWidth: 1,
            backgroundColor: 'rgba(59, 130, 246, 0.7)',
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endif
@endsection
