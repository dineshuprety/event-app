<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @inertiaHead
</head>

<body>
    @routes
    @inertia
</body>
@vite('resources/js/app.js')
<script src="https://cdn.lordicon.com/qjzruarw.js"></script>
</html>