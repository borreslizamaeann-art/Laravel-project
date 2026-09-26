<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 antialiased">
    <div class="max-w-4xl mx-auto py-10 px-4">
        <header class="flex justify-between items-center mb-8 bg-white p-6 rounded-lg shadow-sm border border-slate-200">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Personal Task Manager</h1>
                <p class="text-sm text-slate-500">Project Code: WST21-PM-2026-SF</p>
            </div>
            <a href="/tasks/create" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-md text-sm transition">
    + Add New Task
</a>
            </a>
        </header>

        @if(session('success'))
            <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded-md mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>