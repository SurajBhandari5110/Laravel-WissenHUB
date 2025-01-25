<!-- resources/views/courses/content_titles.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }} - Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">{{ $course->name }}</h1>
        <div class="row">
            <!-- Sidebar Menu -->
            <div class="col-md-4">
                <div class="list-group">
                    @foreach ($course->contentTitles as $contentTitle)
                        <a href="#" class="list-group-item list-group-item-action">
                            {{ $contentTitle->title }}
                        </a>
                        <ul class="list-group">
                            @foreach ($contentTitle->subheadings as $subheading)
                                <li class="list-group-item">
                                    <small>{{ $subheading->title }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to {{ $course->name }}</h5>
                        <p class="card-text">Select a content title from the left menu to explore its details.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
