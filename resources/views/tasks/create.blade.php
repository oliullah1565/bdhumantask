@extends('layouts.app')

@section('content')
    <h1>Add Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Due Date:</label>
            <input type="date" name="due_date" value="{{ old('due_date') }}">
        </div>

        <button type="submit">Add Task</button>
    </form>
@endsection
