<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Edit Task</h1>

    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="edit --">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>

    <a href="/" class="btn btn-secondary mt-3">← Back</a>
</body>
</html>
