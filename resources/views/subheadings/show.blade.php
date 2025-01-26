<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subheading</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2>{{ $subheading->title }}</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h4>Content</h4>
                    <div class="border p-3">
                        {!! $subheading->content !!}
                    </div>
                </div>
                <div>
                    <p><strong>Content Title ID:</strong> {{ $subheading->content_id }}</p>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('subheadings.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('subheadings.edit', $subheading->subheading_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('subheadings.destroy', $subheading->subheading_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
