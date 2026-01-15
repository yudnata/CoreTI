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

<body class="font-sans antialiased flex flex-col min-h-screen">

    @include('partials.header')

    <div class="grow">
        @if(session('message'))
        <div class="sticky top-0 z-50 max-w-6xl mx-auto bg-gray-100 px-8 py-4 flex items-center justify-between gap-4 shadow-md">
            <span class="text-lg text-gray-800">{{ session('message') }}</span>
            <i class="fas fa-times cursor-pointer text-red-500 hover:text-red-700 text-2xl transition-colors hover:rotate-90 duration-300" onclick="this.parentElement.remove();"></i>
        </div>
        @endif

        @yield('content')
    </div>

    @include('partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>