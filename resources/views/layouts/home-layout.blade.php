<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 min-h-screen flex flex-col justify-between text-white">
    <!-- Header -->
    <header class="bg-transparent py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="{{ route('landing') }}" class="text-2xl font-bold ">TarDes</a>
            <nav class="space-x-4">
                <a href="{{ route('landing') }}" class="hover:underline">Beranda</a>
                <a href="{{ route('operator.registerForm') }}" class="hover:underline">Register</a>
                <a href="#about" class="hover:underline">About</a>
                <a href="#contact" class="hover:underline">Profil</a>
            </nav>
        </div>
    </header>
    <container>
        {{ $slot }}
    </container>
    <!-- Footer -->
    <footer class="bg-transparent py-6">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} TarDes. All rights reserved.</p>
        </div>
    </footer>
    @yield('scripts')
</body>
</html>
