<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-screen">
    @include('admin.nav.nav')
    <div class="flex-1">
        <div class="ps-64">
            <div class="h-16 py-3 px-8 mx-auto bg-white drop-shadow-lg flex space-x-3 justify-end">
                <p class="my-auto font-medium text-gray-500">{{ $adminNamesString }}</p>
            </div>
        </div>
        <div class="ps-72 pe-8 py-10">
            @yield('content')
        </div>
    </div>
</body>

</html>
