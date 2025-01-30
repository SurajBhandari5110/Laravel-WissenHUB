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
            color: #212529;
            transition: background-color 0.5s, color 0.5s;
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
            color: #ffffff;
        }
        .navbar-nav .nav-link:hover {
            color: #0dcaf0;
        }
        .list-group-item:hover {
            background-color: #d1e7dd;
            cursor: pointer;
        }
        .card {
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important;
        }
        .list-group {
            overflow: hidden;
        }
        .list-group-item {
            border: none;
            padding: 12px 16px;
        }
        .list-group-item:not(:last-child) {
            border-bottom: solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
        }
        .main-content-placeholder {
            text-align: center;
            color: #6c757d;
        }
        /* Scrollable Navbar */
.scroll-container {
    position: relative;
    display: flex;
    align-items: center;
}
.scroll-content {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    padding: 10px 0;
    white-space: nowrap;
}
.scroll-content::-webkit-scrollbar {
    display: none;
}
.related-course-btn {
    flex: 0 0 auto;
    
    padding: 8px 16px;
    background-color: #343a40;
    color: white;
    border-radius: 20px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s ease-in-out;
}
.related-course-btn:hover {
    background-color: #0056b3;
}
.scroll-btn {
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
    padding: 10px;
    border-radius: 50%;
    position: absolute;
    z-index: 10;
}
.left {
    left: -5px;
}
.right {
    right: -5px;
}
        .dark-mode {
            background-color:#161c23;
            color: #f8f9fa;
        }
        .dark-mode .navbar {
            background-color: #000000;
        }
        .dark-mode .list-group-item {
            background-color:rgb(34, 33, 33);
            color: #f8f9fa;
        }
        .dark-mode .list-group-item:hover {
            background-color:rgb(0, 0, 0);
        }
        .dark-mode .card {
            background-color:rgb(0, 0, 0);
            color: #f8f9fa;
        }
        #dark-mode-toggle {
            background-color: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            font-size: 1.5rem;
            color: #ffffff;
        }
        #dark-mode-toggle span {
            display: inline-block;
            transition: transform 0.5s ease;
        }
        .dark-mode #dark-mode-toggle span {
            transform: rotate(180deg);
        }
        .dark-mode #main-content{
            background-color:rgb(0, 0, 0);
            color: #f8f9fa;
        }
        .dark-mode .navbar-brand span {
            color:green;
        }
        .dark-mode .scroll-container {
    background-color: #1a1a1a;
}
.dark-mode .related-course-btn {
    background-color: #218838;
}
.dark-mode .related-course-btn:hover {
    background-color:rgb(0, 141, 61);
}
.dark-mode .scroll-btn {
    background: rgba(255, 255, 255, 0.3);
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                
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
                <button id="dark-mode-toggle">
                    <span>🌞</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- Scrollable Horizontal Navbar for Related Courses -->
<!-- Scrollable Horizontal Navbar for Related Courses -->
<div class="container my-4">
    <div class="scroll-container">
        
        <div class="scroll-content">
            @foreach ($relatedCourses as $relatedCourse)
                <a href="{{ route('courses-frontend.show', $relatedCourse->course_id) }}" class="related-course-btn">
                    {{ $relatedCourse->name }}
                </a>
            @endforeach
        </div>
       
    </div>
</div>


    <!-- Page Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="list-group">
                    @foreach ($course->contentTitles as $contentTitle)
                        <!-- Main Title -->
                        <a href="" class="list-group-item list-group-item-action fw-bold">
                            {{ $contentTitle->title }}
                        </a>
                        <!-- Subheadings -->
                        <ul class="list-group">
                            @foreach ($contentTitle->subheadings as $subheading)
                                <li class="list-group-item" onclick="showContent('{{ $subheading->content }}')">
                                    <small >{{ $subheading->title }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" id="main-content">
                        <h3 class="mb-3">Welcome to the {{ $course->name }} Course!</h3>
                        <p >
                            Dive into our expertly crafted lessons and master the skills you need. 
                            Select a topic from the menu to start your learning journey today!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleButton = document.getElementById('dark-mode-toggle');
        const body = document.body;

        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const icon = toggleButton.querySelector('span');
            icon.textContent = body.classList.contains('dark-mode') ? '🌜' : '🌞';
        });

        function showContent(content) {
            const mainContentDiv = document.getElementById('main-content');
            mainContentDiv.innerHTML = content;
        }
    </script>
</body>
</html>
