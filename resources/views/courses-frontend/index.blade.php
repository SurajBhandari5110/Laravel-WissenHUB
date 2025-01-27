<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
        Wissen Hub
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
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
            <img alt="Wissen Hub Logo" class="mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/Wexbeu88A9u1QUbfskg9ahZH7u77iRQVjSbmLEG67DOf1kjQB.jpg" width="40"/>
            <span class="text-xl font-bold">
                Wissen
                <span class="text-green-500">
                    hub
                </span>
            </span>
        </div>
        <nav class="space-x-4">
            <a class="text-white hover:text-green-500" href="#">
                Home
            </a>
            <a class="text-white hover:text-green-500" href="#">
                Courses
            </a>
            <a class="text-white hover:text-green-500" href="#">
                Our Teachers
            </a>
            <a class="text-white hover:text-green-500" href="#">
                About
            </a>
            <a class="text-white hover:text-green-500" href="#">
                Contact
            </a>
        </nav>
    </div>
</header>
<main class="pt-20">
    <section class="relative h-screen bg-cover bg-center" style="background-image: url('https://img.freepik.com/free-vector/woman-working-new-app_23-2148682102.jpg?t=st=1737879675~exp=1737883275~hmac=e17ba6338cfe9e14b516920d13a2eb1b74ad63273d3392f2d96a20b771ca7e8e&w=1060');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center">
            <h1 class="text-5xl md:text-6xl font-light">
                Let's Start
                <span class="font-bold">
                    learning
                </span>
            </h1>
            <p class="text-2xl md:text-3xl mt-4">
                Something new today!
            </p>
        </div>
    </section>
    
    <section class="py-12">
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($courses as $course)
        <div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-lg">
            <!-- Image Section -->
            <div class="relative h-48">
                @if($course->image)
                <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="w-full h-full object-cover">
                @else
                <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image" class="w-full h-full object-cover">
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

</main>
</body>
</html>