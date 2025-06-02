<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
</head>
<body>
    <nav>
        <x-nav-link href="/">Home</a></x-nav-link>
        <x-nav-link href="/about">About</a></x-nav-link>
        <x-nav-link href="/contact">Contact</a></x-nav-link>
    </nav>
    {{ $slot }}
</body>
</html>
