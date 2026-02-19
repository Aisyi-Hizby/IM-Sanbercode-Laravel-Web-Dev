<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AISYI STORE') }} - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            font-family: 'Inter', sans-serif;
        }
        
        .soft-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .clean-card {
            background: #ffffff;
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.15);
        }
        
        .simple-input {
            transition: all 0.2s ease;
        }
        
        .simple-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body class="soft-bg py-8 px-4">

    <div class="w-full max-w-md mx-auto">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-2xl shadow-lg mb-4">
                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white mb-1">AISYI STORE</h1>
            <p class="text-white/80 text-sm">Buat akun baru</p>
        </div>

        <!-- Register Card -->
        <div class="clean-card rounded-2xl p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Nama Lengkap -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Depan</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required
                               class="simple-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('first_name') border-red-500 @enderror"
                               placeholder="John">
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Belakang</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required
                               class="simple-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('last_name') border-red-500 @enderror"
                               placeholder="Doe">
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="simple-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('email') border-red-500 @enderror"
                           placeholder="nama@gmail.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">Gunakan email dengan domain <span class="font-semibold text-indigo-600">@gmail.com</span></p>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                               class="simple-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('password') border-red-500 @enderror"
                               placeholder="Minimal 8 karakter">
                        <button type="button" onclick="togglePassword('password', 'eyeIcon1')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <svg id="eyeIcon1" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="simple-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none"
                               placeholder="Ketik ulang password">
                        <button type="button" onclick="togglePassword('password_confirmation', 'eyeIcon2')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <svg id="eyeIcon2" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Terms -->
                <div class="flex items-start">
                    <input type="checkbox" id="terms" required class="mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        Saya setuju dengan <a href="#" class="text-indigo-600 hover:underline font-medium">Syarat dan Ketentuan</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary w-full text-white py-3 px-4 rounded-lg font-semibold shadow-md">
                    Buat Akun
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-6 pt-4 border-t border-gray-100">
                <p class="text-gray-600 text-sm">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
                        Masuk di sini
                    </a>
                </p>
                <p class="text-xs text-gray-400 mt-2">
                    Hanya email dengan domain @gmail.com yang dapat mendaftar
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-white/70 text-xs mt-8">
            &copy; {{ date('Y') }} AISYI STORE. All rights reserved.
        </p>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }
    </script>
</body>
</html>