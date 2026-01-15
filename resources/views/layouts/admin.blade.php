<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - CoreTI')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>

<body>

    @include('partials.admin_header')

    <div class="container">
        @if(session('message'))
        <div class="message">
            <span>{{ session('message') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('assets/js/admin.js') }}"></script>
</body>

</html>