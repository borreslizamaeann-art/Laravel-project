@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm border border-slate-200 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-6 text-slate-900">Edit Task</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Task Name *</label>
            <input type="text" name="task_name" required value="{{ old('task_name', $task->task_name) }}" class="w-full border-slate-300 border p-2 rounded-md text-sm">
            @error('task_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full border-slate-300 border p-2 rounded-md text-sm">{{ old('description', $task->description) }}</textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <select name="status" class="w-full border-slate-300 border p-2 rounded-md text-sm">
                    <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Due Date</label>
                <input type="date" name="due_date" value="{{ old('due_date', optional($task->due_date)->format('Y-m-d')) }}" class="w-full border-slate-300 border p-2 rounded-md text-sm">
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300 text-sm">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm">Update Task</button>
        </div>
    </form>
</div>
@endsection