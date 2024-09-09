@extends('layouts.app')

@section('content')


    <h1>Task List</h1>

    <!-- Filter and Sort Form -->
    <form method="GET" action="{{ route('tasks.index') }}">
        <select name="status">
            <option value="">All Statuses</option>
            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <select name="sort">
            <option value="">Sort by</option>
            <option value="due_date" {{ request('sort') == 'due_date' ? 'selected' : '' }}>Due Date</option>
        </select>

        <button type="submit">Filter & Sort</button>
    </form>

    <!-- Task List -->
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
