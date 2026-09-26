@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
    @if($tasks->isEmpty())
        <div class="p-8 text-center text-slate-500">
            No tasks found. Click "+ Add New Task" to create your first task!
        </div>
    @else
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-600 uppercase">
                    <th class="p-4">Status</th>
                    <th class="p-4">Task Name</th>
                    <th class="p-4">Description</th>
                    <th class="p-4">Due Date</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @foreach($tasks as $task)
                    <tr class="hover:bg-slate-50">
                        <td class="p-4">
                            <form action="{{ route('tasks.toggleStatus', $task) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="inline-block px-3 py-1 text-xs font-semibold rounded-full transition {{ $task->status === 'Completed' ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-amber-100 text-amber-800 hover:bg-amber-200' }}">
                                    {{ $task->status }}
                                </button>
                            </form>
                        </td>
                        <td class="p-4 font-medium {{ $task->status === 'Completed' ? 'line-through text-slate-400' : 'text-slate-900' }}">
                            {{ $task->task_name }}
                        </td>
                        <td class="p-4 text-sm text-slate-600 max-w-xs truncate">
                            {{ $task->description ?? 'No details provided' }}
                        </td>
                        <td class="p-4 text-sm text-slate-600">
                            {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No Deadline' }}
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium text-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection