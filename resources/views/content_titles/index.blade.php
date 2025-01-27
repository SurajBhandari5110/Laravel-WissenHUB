<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Titles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for pagination */
        .pagination {
            justify-content: center;
        }
        .page-item .page-link {
            color: #0d6efd; /* Bootstrap primary color */
        }
        .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Content Titles</h1>

        <!-- Add New Content Title Button -->
        <div class="mb-4">
            <a href="{{ route('content_titles.create') }}" class="btn btn-success">+ Add New Content Title</a>
        </div>

        <!-- Table of Content Titles -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Course</th>
                        <th>Content Title</th>
                        <th>Position</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contentTitles as $contentTitle)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contentTitle->course->name }}</td>
                            <td>{{ $contentTitle->title }}</td>
                            <td>{{ $contentTitle->position }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $contentTitles->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>

</body>
</html>
