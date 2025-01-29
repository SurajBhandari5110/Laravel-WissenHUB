<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Category to Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Assign Category to Course</h2>
    <a href="{{ route('course_categories.index') }}" class="btn btn-secondary mb-3">Back</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 shadow">
    <form action="{{ route('course_categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="course_id" class="form-label">Select Course</label>
        <select class="form-control" name="course_id" required>
            <option value="">-- Select Course --</option>
            @foreach($courses as $course)
                <option value="{{ $course->course_id }}">{{ $course->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Select Category</label>
        <select class="form-control" name="category_id" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Assign Category</button>
</form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
