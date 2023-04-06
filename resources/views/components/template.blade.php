<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    @yield('template_styles')
    @yield('styles')

    <title>{{ $title }}</title>
</head>

<body>

    {{ $slot }}

    @vite('resources/js/app.js')

    @yield('template_scripts')
    @yield('scripts')

</body>

</html>
