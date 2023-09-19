<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Health Services</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-gray-300">
    <div class="w-screen">
        <header>
            @include('public.partials.header')
        </header>
        <div class="pt-20 mx-auto">
            <section>
                @yield('content')
            </section>
        </div>
    </div>

    <script>
        function dropdown() {
            let dropdown1 = document.getElementById("dropdown1")
            let dropdownMenu = document.getElementById("dropdown-menu")
            console.log(dropdownMenu.classList);
            if (dropdownMenu.classList.contains('hidden')) {
                console.log("on");
                dropdownMenu.classList.remove('hidden')
            } else {
                dropdownMenu.classList.add('hidden')
            }
        }
    </script>
</body>

</html>
