<x-login-layout>
    <div class="h-screen bg-gradient-to-br from-blue-600 to-cyan-300 flex justify-center items-center w-full">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif      
        <form method="POST" action="{{ route('operator.login') }}">
            @csrf
            <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-xl max-w-sm">
                
                <div class="space-y-4">
                    <h1 class="text-2xl font-bold text-center mb-4 text-gray-600">Selamat Datang Kembali!</h1>
                    <hr>
                <div class="flex items-center border-2 py-2 px-3 rounded-md mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-md">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                </div>
                <!-- Remember Me checkbox -->
                <div class="flex justify-center items-center mt-4">
                    <p class="inline-flex items-center text-gray-700 font-medium text-xs text-center">
                        <input type="checkbox" id="rememberMeCheckbox" name="rememberMe" class="mr-2">
                        <span class="text-xs font-semibold">Ingat saya?</span>
                    </p>
                </div>
                <button type="submit" value="login" id="login" class="mt-6 w-full shadow-xl bg-gradient-to-tr from-blue-600 to-red-400 hover:to-red-700 text-indigo-100 py-2 rounded-md text-lg tracking-wide transition duration-1000">Login</button>
                <hr>
                <div class="flex justify-center items-center mt-4">
                    <p class="inline-flex items-center text-gray-700 font-medium text-xs text-center">
                        <span class="ml-2">Tidak memiliki akun?<a href="{{ route('operator.registerForm') }}" class="text-xs ml-2 text-blue-500 font-semibold">Daftar sekarang &rarr;</a>
                        </span>
                    </p>
                </div>
            </div>
            <div class="pt-6 text-base font-semibold leading-7">
                <p class="font-sans text-red-500 text-md hover:text-red-800">
                <a href="{{ route('landing') }}" class="absolute">&larr; Beranda</a>
                </p>
            </div>
        </form>
    </div>
</x-login-layout>