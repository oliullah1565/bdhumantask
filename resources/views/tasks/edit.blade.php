@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}" required>
            @error('title')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description', $task->description) }}"></textarea>
        </div>

        <div>
            <label>Due Date:</label>
            <input type="date" name="due_date" value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
        </div>

        <div>
            <label>Status:</label>
            <select name="status" required>
                <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Update Task</button>
    </form>
@endsection
