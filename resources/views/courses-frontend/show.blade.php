<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }} - Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .navbar-brand span {
            color: #0dcaf0;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .navbar-nav .nav-link:hover {
            color: #0dcaf0 !important;
        }
        .list-group-item:hover {
            background-color: #d1e7dd;
            cursor: pointer;
        }
        .card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .list-group {
            border-radius: 8px;
            overflow: hidden;
        }
        .list-group-item {
            border: none;
            padding: 12px 16px;
        }
        .list-group-item:not(:last-child) {
            border-bottom: 1px solid #dee2e6;
        }
        .main-content-placeholder {
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/30" alt="Logo" class="me-2">
                Wissen <span>Hub</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Teachers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-5">
        
        <div class="row">
            <!-- Sidebar Menu -->
            <div class="col-md-4">
                <div class="list-group">
                    @foreach ($course->contentTitles as $contentTitle)
                        <!-- Main Title -->
                        <a href="#" class="list-group-item list-group-item-action bg-light text-dark fw-bold">
                            {{ $contentTitle->title }}
                        </a>
                        <!-- Subheadings -->
                        <ul class="list-group">
                            @foreach ($contentTitle->subheadings as $subheading)
                                <li class="list-group-item bg-white">
                                    <small class="text-muted">{{ $subheading->title }}</small>
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
                        @if(isset($subheading->content))
                            {!! $subheading->content !!}
                        @else
                            <p class="main-content-placeholder">
                                Select a subheading from the left menu to view its content.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
