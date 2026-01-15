<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CoreTI')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen relative flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=1920&q=80" alt="Background" class="w-full h-full object-cover blur-lg scale-110">
        </div>
        <div class="absolute inset-0 bg-black/60 z-10"></div>

        <a href="{{ route('home') }}" class="absolute top-8 left-8 z-30 text-white text-3xl font-bold hover:opacity-80 transition-opacity">
            <i class="fas fa-microchip text-blue-500"></i> CoreTI
        </a>

        @if(session('message'))
            <div class="fixed top-8 right-8 z-50 bg-white rounded-lg shadow-lg p-4 max-w-md flex items-center gap-3 animate-slide-in">
                <span class="text-gray-700">{{ session('message') }}</span>
                <i class="fas fa-times cursor-pointer text-red-500 hover:text-red-700 transition-colors" onclick="this.parentElement.remove();"></i>
            </div>
        @endif
        <div class="relative z-20 w-full px-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>