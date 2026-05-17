<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="p-5 text-xl font-bold border-b border-gray-700">
            🎓 Admin Panel
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="/dashboard" class="block p-2 rounded hover:bg-gray-700">🏠 Dashboard</a>
            <a href="/students" class="block p-2 rounded hover:bg-gray-700">👨‍🎓 Students</a>
            <a href="/teachers" class="block p-2 rounded hover:bg-gray-700">👨‍🏫 Teachers</a>
            <a href="/subjects" class="block p-2 rounded hover:bg-gray-700">📘 Subjects</a>
            <a href="/attendance" class="block p-2 rounded hover:bg-gray-700">📅 Attendance</a>
            <a href="/grades" class="block p-2 rounded hover:bg-gray-700">📊 Grades</a>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <a href="/logout" class="text-red-400 hover:text-red-300">Logout</a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Top Navbar -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">@yield('title')</h1>

            <div class="flex items-center space-x-1">
                <span class="text-gray-100">Admin</span>

                <img src="{{ asset('image/ima.png') }}" class="rounded-full w-8 h-8 object-cover" alt="Admin avatar">
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6 overflow-y-auto">
            @yield('content')
        </main>

    </div>
</div>

@yield('scripts')
</body>
</html>

@yield('scripts')
</body>
</html>
