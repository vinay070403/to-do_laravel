<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="container mt-5">

    <h1 class="mb-4">To-Do List</h1>

    {{-- Display success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Add new task form --}}
    <form method="POST" action="/tasks" class="d-flex mb-4">
        @csrf
        <input
            type="text"
            name="title"
            value="{{ old('title') }}"
            class="form-control me-2"
            placeholder="New task"
            required
        />
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    {{-- Task list --}}
    <ul class="list-group">
        @foreach ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $task->title }}

                <div>
                    <a href="/tasks/{{ $task->id }}/edit" class="btn btn-sm btn-warning me-2">Edit</a>

                    <form
                        action="/tasks/{{ $task->id }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirmDelete();"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    {{-- JavaScript for delete confirmation --}}
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this task?');
        }
    </script>
    
</body>

</html>
