<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .course-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: scale(1.03);
            transition: all 0.3s ease;
        }

        .course-card img {
            max-height: 200px;
            object-fit: cover;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Available Courses</h1>
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4">
                <div class="card course-card mb-4">
                    <!-- Display the course image -->
                    @if($course->image)
                        <img src="{{ asset( $course->image) }}" alt="{{ $course->name }}" class="card-img-top">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <a href="{{ route('courses.show', $course->course_id) }}" class="btn btn-primary">View Course</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
