<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - CoreTI')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-800">

    @include('partials.admin_header')

    <div class="max-w-7xl mx-auto px-4 py-8">
        @if(session('message'))
            <div class="fixed top-24 right-8 z-50 bg-white border-l-4 border-blue-600 rounded-lg shadow-xl p-4 max-w-md flex items-center gap-3 animate-slide-in">
                <span class="text-gray-700 font-medium">{{ session('message') }}</span>
                <i class="fas fa-times cursor-pointer text-gray-400 hover:text-red-500 transition-colors duration-200" onclick="this.parentElement.remove();"></i>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('assets/js/admin.js') }}"></script>
</body>

</html>