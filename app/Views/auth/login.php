<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Es</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .gradient-border {
            position: relative;
            background: white;
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 1rem;
            padding: 2px;
            background: linear-gradient(135deg, #00BBFF, #00d4ff);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .gradient-border:focus-within::before {
            opacity: 1;
        }

        .bg-pattern {
            background: linear-gradient(135deg, #00BBFF 0%, #008fc7 100%);
        }

        .ice-cube {
            position: absolute;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.1));
            border-radius: 8px;
            animation: float-random 8s ease-in-out infinite;
        }

        @keyframes float-random {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            25% {
                transform: translate(10px, -10px) rotate(5deg);
            }

            50% {
                transform: translate(-5px, -20px) rotate(-5deg);
            }

            75% {
                transform: translate(-10px, -10px) rotate(3deg);
            }
        }

        .btn-shine {
            position: relative;
            overflow: hidden;
        }

        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-shine:hover::before {
            left: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .ice-cube {
                width: 30px !important;
                height: 30px !important;
            }
        }

        /* Tablet adjustments */
        @media (min-width: 641px) and (max-width: 1024px) {
            .ice-cube {
                width: 45px !important;
                height: 45px !important;
            }
        }

        /* Landscape mobile */
        @media (max-height: 600px) and (orientation: landscape) {
            .animate-float {
                animation: none;
            }
            body {
                padding: 1rem 0.75rem;
            }
        }

        /* Very small screens */
        @media (max-width: 360px) {
            body {
                padding: 0.5rem;
            }
        }

        /* Large screens */
        @media (min-width: 1280px) {
            .ice-cube {
                width: 70px !important;
                height: 70px !important;
            }
        }
    </style>
</head>

<body class="bg-pattern min-h-screen flex items-center justify-center p-2 xs:p-3 sm:p-4 md:p-5 lg:p-6 relative overflow-hidden">

    <!-- Animated Background Elements -->
    <div class="ice-cube" style="width: 60px; height: 60px; top: 10%; left: 15%; animation-delay: 0s;"></div>
    <div class="ice-cube" style="width: 40px; height: 40px; top: 70%; left: 80%; animation-delay: 2s;"></div>
    <div class="ice-cube" style="width: 50px; height: 50px; top: 30%; right: 10%; animation-delay: 4s;"></div>
    <div class="ice-cube" style="width: 35px; height: 35px; bottom: 20%; left: 25%; animation-delay: 3s;"></div>

    <div class="w-full max-w-[95%] xs:max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl xl:max-w-md relative z-10">
        
        <div class="text-center mb-4 xs:mb-5 sm:mb-6 md:mb-8 animate-float">
            <div class="inline-block p-2 xs:p-2.5 sm:p-3 md:p-4 rounded-full bg-gradient-to-br from-[#00BBFF] to-[#008fc7] shadow-2xl mb-2 xs:mb-2.5 sm:mb-3 md:mb-4">
                <div class="relative bg-white rounded-full p-1 xs:p-1.5 sm:p-2 shadow-xl">
                    <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan Logo" class="w-7 h-7 xs:w-8 xs:h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 lg:w-12 lg:h-12 object-contain">
                </div>
            </div>
            <h1 class="text-xl xs:text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-1 xs:mb-1.5 sm:mb-2 px-3 xs:px-4">Login Ke Es Dongan</h1>
            <p class="text-xs xs:text-sm sm:text-base md:text-lg text-gray-200 px-3 xs:px-4">Masuk ke akun Anda !</p>
        </div>

        <!-- Login Card -->
        <div class="glass-effect rounded-lg xs:rounded-xl sm:rounded-2xl shadow-2xl p-4 xs:p-5 sm:p-6 md:p-8 lg:p-10">

            <!-- Flash Messages -->
            <div id="errorMessage" class="hidden bg-red-50 border-l-4 border-red-500 text-red-700 px-2.5 xs:px-3 sm:px-4 py-2 xs:py-2.5 sm:py-3 rounded mb-3 xs:mb-4 sm:mb-5 md:mb-6 animate-pulse">
                <p class="font-medium text-xs xs:text-sm sm:text-base">Error!</p>
                <p class="text-xs sm:text-sm">Email atau password salah</p>
            </div>

            <div id="successMessage" class="hidden bg-green-50 border-l-4 border-green-500 text-green-700 px-2.5 xs:px-3 sm:px-4 py-2 xs:py-2.5 sm:py-3 rounded mb-3 xs:mb-4 sm:mb-5 md:mb-6">
                <p class="font-medium text-xs xs:text-sm sm:text-base">Berhasil!</p>
                <p class="text-xs sm:text-sm">Registrasi berhasil, silakan login</p>
            </div>

            <form action="/login" method="post" class="space-y-3 xs:space-y-4 sm:space-y-5 md:space-y-6">
                <!-- Email Input -->
                <div class="gradient-border rounded-lg">
                    <label class="block text-gray-700 font-semibold mb-1.5 xs:mb-2 px-1 text-xs xs:text-sm sm:text-base">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-2.5 xs:pl-3 sm:pl-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input type="email" name="email" required
                            class="w-full pl-9 xs:pl-10 sm:pl-12 pr-2.5 xs:pr-3 sm:pr-4 py-2 xs:py-2.5 sm:py-3 text-xs xs:text-sm sm:text-base border-2 border-gray-200 rounded-lg focus:outline-none focus:border-[#00BBFF] transition-all duration-300"
                            placeholder="email@example.com">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="gradient-border rounded-lg">
                    <label class="block text-gray-700 font-semibold mb-1.5 xs:mb-2 px-1 text-xs xs:text-sm sm:text-base">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-2.5 xs:pl-3 sm:pl-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" name="password" required
                            class="w-full pl-9 xs:pl-10 sm:pl-12 pr-9 xs:pr-10 sm:pr-12 py-2 xs:py-2.5 sm:py-3 text-xs xs:text-sm sm:text-base border-2 border-gray-200 rounded-lg focus:outline-none focus:border-[#00BBFF] transition-all duration-300"
                            placeholder="••••••••">
                        <button type="button" class="absolute inset-y-0 right-0 pr-2.5 xs:pr-3 sm:pr-4 flex items-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-xs sm:text-sm">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" class="w-3 h-3 xs:w-3.5 xs:h-3.5 sm:w-4 sm:h-4 rounded border-gray-300 text-[#00BBFF] focus:ring-[#00BBFF] focus:ring-offset-0">
                        <span class="ml-1 xs:ml-1.5 sm:ml-2 text-gray-600">Ingat saya</span>
                    </label>
                    <a href="/forgot-password" class="text-[#00BBFF] hover:text-[#008fc7] font-semibold transition-colors">
                        Lupa Password?
                    </a>
                </div>

                <!-- Login Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#00BBFF] to-[#008fc7] text-white py-2.5 xs:py-3 sm:py-3.5 md:py-4 rounded-lg font-bold text-sm xs:text-base sm:text-lg shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-300 btn-shine">
                    Masuk Sekarang
                </button>
            </form>

            <!-- Register Link -->
            <div class="text-center mt-5 xs:mt-6 sm:mt-7 md:mt-8 pt-4 xs:pt-5 sm:pt-6 border-t border-gray-200">
                <p class="text-xs xs:text-sm sm:text-base text-gray-600">
                    Belum punya akun?
                    <a href="/register" class="text-[#00BBFF] font-bold hover:text-[#008fc7] transition-colors ml-1">
                        Daftar Sekarang →
                    </a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-3 xs:mt-4 sm:mt-5 md:mt-6">
            <a href="/" class="inline-flex items-center text-white hover:text-[#00BBFF] transition-colors font-semibold text-xs xs:text-sm sm:text-base">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 xs:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

</body>

</html>