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
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('landing') }}">Beranda</a></li>
                    
                    @guest('operator')
                        <li><a href="{{ route('operator.registerForm') }}">Register</a></li>
                    @endguest

                    @auth('operator')
                        <li><span>Halo, {{ Auth::guard('operator')->user()->username }}</span></li>
                        <li><a href="{{ route('profil') }}">Profil</a></li>
                        <li><a href="{{ route('operator.logout') }}">Logout</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    <container class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
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