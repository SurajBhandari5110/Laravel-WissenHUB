<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wissen Hub</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212;
            color: white;
        }
        .course-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://storage.googleapis.com/a1aa/image/Wexbeu88A9u1QUbfskg9ahZH7u77iRQVjSbmLEG67DOf1kjQB.jpg" alt="Logo" width="40" height="40" class="me-2">
            <span>Wissen <span class="text-success">Hub</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Courses</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Our Teachers</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="container-fluid position-relative text-center text-white d-flex align-items-center justify-content-center" style="height: 60vh; background: url('https://img.freepik.com/free-vector/woman-working-new-app_23-2148682102.jpg') center/cover no-repeat;">
    <div class="bg-dark bg-opacity-50 p-4">
        <h1 class="display-4">Let's Start <span class="fw-bold">learning</span></h1>
        <p class="lead">Something new today!</p>
    </div>
</section>

<main class="container mt-5">
    <!-- Category Sections -->
    @foreach ($categories as $category)
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 fw-bold">{{ $category['title'] }}</h2>
                <a href="#" class="btn btn-outline-light btn-sm">View All</a>
            </div>
            <div class="row">
                @foreach ($category['courses'] as $course)
                    <div class="col-md-3">
                        <div class="card bg-dark text-white course-card">
                            <img src="{{ asset($course['image'] ?? 'https://placehold.co/300x200') }}" class="card-img-top" alt="{{ $course['name'] }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $course['name'] }}</h5>
                                <a href="{{ route('courses-frontend.show', $course->course_id) }}" class="btn btn-success btn-sm">View Course</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach

    <!-- All Courses Section -->
    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4 fw-bold">All Courses</h2>
            <a href="#" class="btn btn-outline-light btn-sm">View All</a>
        </div>
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-3">
                    <div class="card bg-dark text-white course-card">
                        <img src="{{ asset($course->image ?? 'https://via.placeholder.com/300x200') }}" class="card-img-top" alt="{{ $course->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <a href="{{ route('courses-frontend.show', $course->course_id) }}" class="btn btn-success btn-sm">View Course</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
<section class="py-5 text-white text-center">
    <div class="container">
        <h2 class="display-5 fw-bold mb-3">Boost Your Learning</h2>
        <p class="lead">Prepare yourself with interview questions and test your knowledge with quizzes.</p>

        <div class="row g-4 mt-4">
            <!-- Interview Questions Card -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <img src="https://img.freepik.com/free-vector/job-interview-concept-illustration_114360-24598.jpg" class="card-img-top" alt="Interview Questions">
                    <div class="card-body text-center">
                        <h3 class="h5 fw-bold">Interview Questions</h3>
                        <p class="text-muted">Practice real-world interview questions curated by experts.</p>
                        <a href="#" class="btn btn-success">Start Practicing</a>
                    </div>
                </div>
            </div>

            <!-- Quiz Card -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <img src="https://img.freepik.com/free-vector/modern-question-mark-help-support-page_1017-27395.jpg" class="card-img-top" alt="Quizzes">
                    <div class="card-body text-center">
                        <h3 class="h5 fw-bold">Quizzes</h3>
                        <p class="text-muted">Test your skills and reinforce learning with topic-specific quizzes.</p>
                        <a href="#" class="btn btn-primary">Take a Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WissenHub PRO Section -->
<div class="container my-5">
    <h1 class="text-center fw-bold text-light mb-4">Overcome Your Fear of Coding with WissenHub PRO</h1>

    <div class="row g-4">
        <!-- Features List -->
        <div class="col-lg-4">
            <div class="p-4 bg-dark text-light rounded shadow-lg">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <h5 class="fw-bold"><i class="fas fa-laptop-code me-2 text-success"></i> Hands-on Learning</h5>
                        <p class="text-muted">Practice what you learn with our interactive courses, problems, and quizzes.</p>
                    </li>
                    <li class="fw-bold"><i class="fas fa-tasks me-2 text-primary"></i> Practice Projects</li>
                    <li class="fw-bold"><i class="fas fa-lightbulb me-2 text-warning"></i> Coding Challenges</li>
                    <li class="fw-bold"><i class="fas fa-robot me-2 text-danger"></i> AI Mentor</li>
                    <li class="fw-bold"><i class="fas fa-certificate me-2 text-info"></i> Professional Certificates</li>
                </ul>
            </div>
        </div>

        <!-- Offer & Image -->
        <div class="col-lg-8">
            <div class="p-4 bg-dark text-light rounded shadow-lg">
                <h5 class="fw-bold text-success">Offer: 50% Off till March 2025</h5>
                <h3 class="fw-bold">Get Hired from Top MNCs</h3>
                <img src="https://img.freepik.com/free-vector/gamer-playing-with-computer_52683-15038.jpg" class="img-fluid rounded shadow-sm mt-3" alt="Student studying">
            </div>
        </div>
    </div>

    <!-- CTA Button -->
    <div class="text-center mt-4">
        <a href="#" class="btn btn-primary btn-lg">Try WissenHub PRO →</a>
    </div>
</div>

<!-- Why WissenHub? -->
<section class="container my-5">
    <h2 class="text-center fw-bold text-light mb-4">Why WissenHub?</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-center shadow-lg border-0">
                <div class="card-body">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold">For Programmers, By Programmers</h5>
                    <p class="text-muted">We're active programmers creating resources we wish we had when learning to code.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-lg border-0">
                <div class="card-body">
                    <i class="fas fa-star fa-3x text-warning mb-3"></i>
                    <h5 class="fw-bold">Coding Isn't Easy</h5>
                    <p class="text-muted">We believe in honest, practical learning that prepares you for real-world challenges.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-lg border-0">
                <div class="card-body">
                    <i class="fas fa-code fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold">Learn by Doing</h5>
                    <p class="text-muted">Every concept includes complete code examples you can run, modify, and apply.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
