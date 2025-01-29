<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Course Categories</h2>
    <a href="{{ route('course_categories.create') }}" class="btn btn-success mb-3">Assign New Category</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                
                <th>Course Name</th>
                <th>Category Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courseCategories as $courseCategory)
                <tr>
                    
                    <td>{{ $courseCategory->course->name }}</td>
                    <td>{{ $courseCategory->category->title }}</td>
                    <td>
                        
                        <form action="{{ route('course_categories.destroy', $courseCategory->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
