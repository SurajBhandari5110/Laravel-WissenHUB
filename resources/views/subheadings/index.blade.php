<!-- resources/views/subheadings/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subheadings Index</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Subheadings List</h1>
    <a href="{{ route('subheadings.create') }}" class="btn btn-primary mb-3">Add Subheading</a>

    @if($subheadings->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                 
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subheadings as $subheading)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subheading->title }}</td>
                        <td>
                            <p>create content</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No subheadings found.</p>
    @endif
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
