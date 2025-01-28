<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wissen Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
<header class="bg-gray-800 bg-opacity-75 fixed w-full z-10">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <div class="flex items-center">
            <img src="https://storage.googleapis.com/a1aa/image/Wexbeu88A9u1QUbfskg9ahZH7u77iRQVjSbmLEG67DOf1kjQB.jpg" alt="Wissen Hub Logo" class="mr-2" width="40" height="40" />
            <span class="text-xl font-bold">
                Wissen <span class="text-green-500">hub</span>
            </span>
        </div>
        <!-- Hamburger Menu -->
        <button class="text-white md:hidden focus:outline-none" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </button>
        <nav class="hidden md:flex space-x-4" id="menu">
            <a href="#" class="text-white hover:text-green-500">Home</a>
            <a href="#" class="text-white hover:text-green-500">Courses</a>
            <a href="#" class="text-white hover:text-green-500">Our Teachers</a>
            <a href="#" class="text-white hover:text-green-500">About</a>
            <a href="#" class="text-white hover:text-green-500">Contact</a>
        </nav>
    </div>
</header>
<main class="pt-20">
    <!-- Hero Section -->
    <section class="relative h-[60vh] bg-cover bg-center" style="background-image: url('https://img.freepik.com/free-vector/woman-working-new-app_23-2148682102.jpg?t=st=1737879675~exp=1737883275~hmac=e17ba6338cfe9e14b516920d13a2eb1b74ad63273d3392f2d96a20b771ca7e8e&w=1060');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center px-4">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-light">
            Let's Start <span class="font-bold">learning</span>
        </h1>
        <p class="text-xl md:text-2xl lg:text-3xl mt-4">
            Something new today!
        </p>
    </div>
</section>

    
    <!-- Courses Section -->
    <section class="py-12 px-4">
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($courses as $course)
            <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-lg">
                <!-- Image Section -->
                <div class="relative h-48">
                    @if($course->image)
                    <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full h-full object-cover" />
                    @else
                    <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image" class="w-full h-full object-cover" />
                    @endif
                </div>

                <!-- Content Section -->
                <div class="p-6 flex flex-col items-center justify-center text-center">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">{{ $course->name }}</h3>
                    <a href="{{ route('courses-frontend.show', $course->course_id) }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                       View Course
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="py-12 bg-gray-100 text-gray-800">
    <div class="container mx-auto text-center mb-8">
        <h2 class="text-3xl font-bold mb-4">Boost Your Learning</h2>
        <p class="text-lg">Prepare yourself with interview questions and test your knowledge with quizzes.</p>
    </div>

    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 px-4">
        <!-- Interview Questions Card -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-lg">
            <div class="relative h-48">
                <img src="https://img.freepik.com/free-vector/interview-concept-illustration_114360-2580.jpg?w=1060&t=st=1737883279~exp=1737883879~hmac=1837582b46eaa9c8e3dc41b7c9cf9f452fb727034a12f2cc4d537b013c5476a3" 
                     alt="Interview Questions" 
                     class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3 class="text-xl font-semibold mb-4">Interview Questions</h3>
                <p class="text-gray-600 mb-4">Practice real-world interview questions curated by experts.</p>
                <a href="#" 
                   class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                   Start Practicing
                </a>
            </div>
        </div>

        <!-- Quiz Card -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-lg">
            <div class="relative h-48">
                <img src="https://img.freepik.com/free-vector/quiz-concept-illustration_114360-2399.jpg?w=1060&t=st=1737883341~exp=1737883941~hmac=3ab3b1ec64c0a09b6f80a4b0b0ef47285cc7ea09f480a463774e90f1925ff2bc" 
                     alt="Quizzes" 
                     class="w-full h-full object-cover">
            </div>
            <div class="p-6 flex flex-col items-center justify-center text-center">
                <h3 class="text-xl font-semibold mb-4">Quizzes</h3>
                <p class="text-gray-600 mb-4">Test your skills and reinforce learning with topic-specific quizzes.</p>
                <a href="#" 
                   class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                   Take a Quiz
                </a>
            </div>
        </div>
    </div>
</section>

</main>


<!-- Toggle Menu Script -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
