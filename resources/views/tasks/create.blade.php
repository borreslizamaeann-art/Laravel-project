@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm border border-slate-200 max-w-xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-slate-900">Add New Task</h2>
        <a href="/tasks" class="text-sm text-slate-500 hover:text-slate-700">&larr; Back to Task List</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-6 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks" method="POST">
        @csrf

        <div class="mb-4">
            <label for="task_name" class="block text-sm font-medium text-slate-700 mb-1">
                Task Name <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="task_name" 
                name="task_name" 
                required 
                value="{{ old('task_name') }}" 
                placeholder="e.g., Complete Laravel Assignment"
                class="w-full border-slate-300 border p-2 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
            @error('task_name') 
                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-slate-700 mb-1">
                Description
            </label>
            <textarea 
                id="description" 
                name="description" 
                rows="3" 
                placeholder="Add additional details about the task..."
                class="w-full border-slate-300 border p-2 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500"
            >{{ old('description') }}</textarea>
            @error('description') 
                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div class="mb-6">
            <label for="due_date" class="block text-sm font-medium text-slate-700 mb-1">
                Due Date
            </label>
            <input 
                type="date" 
                id="due_date" 
                name="due_date" 
                value="{{ old('due_date') }}" 
                class="w-full border-slate-300 border p-2 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
            @error('due_date') 
                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
            @enderror
        </div>

        <div class="flex justify-end gap-3">
            <a href="/tasks" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300 text-sm font-medium transition">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm font-medium transition">
                Save Task
            </button>
        </div>
    </form>
</div>
@endsection