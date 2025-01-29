<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Content Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Create Content Title</h1>
        <a href="{{ route('content_titles.index') }}" class="btn btn-secondary mb-3">Back</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('content_titles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="course_id">Select Course</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">-- Select a Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->course_id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-3">
                <label for="title">Content Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group my-3">
                <label for="position">Position</label>
                <input type="number" name="position" id="position" class="form-control" required>
                @error('position')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
