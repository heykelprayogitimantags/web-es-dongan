<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            overflow-y: auto;
            overflow-x: hidden;
        }

        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
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
            border-radius: 0.75rem;
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
            position: relative;
        }

        .bg-pattern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .ice-cube {
            position: absolute;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.08));
            border-radius: 12px;
            backdrop-filter: blur(5px);
            animation: float-random 10s ease-in-out infinite;
            box-shadow: 0 8px 32px rgba(255, 255, 255, 0.15);
        }

        @keyframes float-random {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(15px, -15px) rotate(5deg);
            }
            50% {
                transform: translate(-10px, -25px) rotate(-5deg);
            }
            75% {
                transform: translate(-15px, -10px) rotate(3deg);
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
            transition: left 0.6s;
        }

        .btn-shine:hover::before {
            left: 100%;
        }

        .btn-shine:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(0, 187, 255, 0.4);
        }

        .btn-shine:active {
            transform: translateY(0);
        }

        .password-toggle {
            cursor: pointer;
            transition: color 0.2s;
        }

        .password-toggle:hover svg {
            color: #4b5563;
        }

        /* Container */
        .container-wrapper {
            width: 100%;
            max-width: 28rem; /* max-w-md */
            margin: 0 auto;
        }

        /* ========= MOBILE FIRST (DEFAULT) ========= */
        body {
            padding: 1rem;
        }

        .glass-effect {
            padding: 1.5rem;
            border-radius: 1.5rem;
        }

        .logo-section {
            margin-bottom: 1.5rem;
        }

        .logo-section h1 {
            font-size: 1.5rem;
            line-height: 2rem;
            margin-bottom: 0.5rem;
        }

        .logo-section p {
            font-size: 0.875rem;
        }

        .logo-wrapper {
            padding: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .logo-inner {
            padding: 0.5rem;
        }

        .logo-inner img {
            width: 2rem;
            height: 2rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 0.875rem 0.75rem 2.75rem;
            font-size: 16px; /* Prevent iOS zoom */
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #00BBFF;
            box-shadow: 0 0 0 4px rgba(0, 187, 255, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
        }

        .input-icon svg {
            width: 1.125rem;
            height: 1.125rem;
        }

        .password-toggle {
            position: absolute;
            right: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .password-toggle svg {
            width: 1.125rem;
            height: 1.125rem;
            color: #9ca3af;
        }

        .btn-primary {
            padding: 0.875rem 0;
            font-size: 0.9375rem;
            border-radius: 0.75rem;
            font-weight: 700;
        }

        .remember-forgot {
            font-size: 0.8125rem;
            margin-bottom: 1.25rem;
        }

        .remember-forgot input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
        }

        .footer-section {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
        }

        .footer-section p {
            font-size: 0.875rem;
        }

        .back-home {
            margin-top: 1.25rem;
        }

        .back-home a {
            font-size: 0.875rem;
        }

        .back-home svg {
            width: 1rem;
            height: 1rem;
        }

        .ice-cube {
            width: 35px !important;
            height: 35px !important;
        }

        .alert-box {
            padding: 0.875rem;
            border-radius: 0.75rem;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
        }

        /* ========= SMALL MOBILE: < 375px ========= */
        @media (max-width: 374px) {
            body {
                padding: 0.75rem;
            }

            .glass-effect {
                padding: 1.25rem;
            }

            .logo-section {
                margin-bottom: 1.25rem;
            }

            .logo-section h1 {
                font-size: 1.375rem;
            }

            .logo-wrapper {
                padding: 0.625rem;
            }

            .logo-inner img {
                width: 1.75rem;
                height: 1.75rem;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .form-input {
                padding: 0.625rem 0.75rem 0.625rem 2.5rem;
            }

            .input-icon {
                left: 0.75rem;
            }

            .input-icon svg {
                width: 1rem;
                height: 1rem;
            }

            .password-toggle {
                right: 0.75rem;
            }

            .password-toggle svg {
                width: 1rem;
                height: 1rem;
            }

            .btn-primary {
                padding: 0.75rem 0;
                font-size: 0.875rem;
            }

            .ice-cube {
                width: 30px !important;
                height: 30px !important;
            }
        }

        /* ========= TABLET: 768px ke atas ========= */
        @media (min-width: 768px) {
            body {
                padding: 1.5rem;
            }

            .glass-effect {
                padding: 2rem;
                border-radius: 2rem;
            }

            .logo-section {
                margin-bottom: 2rem;
            }

            .logo-section h1 {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .logo-section p {
                font-size: 1rem;
            }

            .logo-wrapper {
                padding: 0.875rem;
                margin-bottom: 1rem;
            }

            .logo-inner {
                padding: 0.625rem;
            }

            .logo-inner img {
                width: 2.5rem;
                height: 2.5rem;
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                font-size: 0.9375rem;
                margin-bottom: 0.625rem;
            }

            .form-input {
                padding: 0.875rem 1rem 0.875rem 3rem;
                font-size: 0.9375rem;
                border-radius: 0.875rem;
            }

            .input-icon {
                left: 1rem;
            }

            .input-icon svg {
                width: 1.25rem;
                height: 1.25rem;
            }

            .password-toggle {
                right: 1rem;
            }

            .password-toggle svg {
                width: 1.25rem;
                height: 1.25rem;
            }

            .btn-primary {
                padding: 1rem 0;
                font-size: 1rem;
                border-radius: 0.875rem;
            }

            .remember-forgot {
                font-size: 0.875rem;
                margin-bottom: 1.5rem;
            }

            .remember-forgot input[type="checkbox"] {
                width: 1.125rem;
                height: 1.125rem;
            }

            .footer-section {
                margin-top: 2rem;
                padding-top: 2rem;
            }

            .footer-section p {
                font-size: 0.9375rem;
            }

            .back-home {
                margin-top: 1.5rem;
            }

            .back-home a {
                font-size: 0.9375rem;
            }

            .back-home svg {
                width: 1.125rem;
                height: 1.125rem;
            }

            .ice-cube {
                width: 50px !important;
                height: 50px !important;
            }

            .alert-box {
                padding: 1rem;
                font-size: 0.9375rem;
            }
        }

        /* ========= DESKTOP: 1024px ke atas ========= */
        @media (min-width: 1024px) {
            body {
                padding: 2rem;
            }

            .glass-effect {
                padding: 2.5rem;
                border-radius: 2.25rem;
            }

            .logo-section h1 {
                font-size: 2.25rem;
            }

            .logo-inner img {
                width: 3rem;
                height: 3rem;
            }

            .ice-cube {
                width: 60px !important;
                height: 60px !important;
            }
        }

        /* ========= LARGE DESKTOP: 1280px ke atas ========= */
        @media (min-width: 1280px) {
            .glass-effect {
                padding: 3rem;
            }

            .ice-cube {
                width: 70px !important;
                height: 70px !important;
            }
        }

        /* ========= LANDSCAPE MODE ========= */
        @media (max-height: 600px) and (orientation: landscape) {
            .animate-float {
                animation: none;
            }

            body {
                padding: 0.75rem;
            }

            .glass-effect {
                padding: 1.25rem;
            }

            .logo-section {
                margin-bottom: 1rem;
            }

            .logo-section h1 {
                font-size: 1.25rem;
                margin-bottom: 0.25rem;
            }

            .logo-wrapper {
                padding: 0.5rem;
                margin-bottom: 0.5rem;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .btn-primary {
                padding: 0.75rem 0;
            }

            .footer-section {
                margin-top: 1rem;
                padding-top: 1rem;
            }

            .back-home {
                margin-top: 1rem;
            }

            .ice-cube {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-pattern relative">

    <!-- Animated Background Elements -->
    <div class="ice-cube" style="width: 60px; height: 60px; top: 10%; left: 15%; animation-delay: 0s;"></div>
    <div class="ice-cube" style="width: 40px; height: 40px; top: 70%; left: 80%; animation-delay: 2s;"></div>
    <div class="ice-cube" style="width: 50px; height: 50px; top: 30%; right: 10%; animation-delay: 4s;"></div>
    <div class="ice-cube" style="width: 35px; height: 35px; bottom: 20%; left: 25%; animation-delay: 3s;"></div>

    <div class="container-wrapper relative z-10" style="padding-top: 2rem; padding-bottom: 2rem;">
        
        <div class="text-center logo-section animate-float">
            <div class="inline-block logo-wrapper rounded-full bg-gradient-to-br from-[#00BBFF] to-[#008fc7] shadow-2xl">
                <div class="relative bg-white rounded-full logo-inner shadow-xl">
                    <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan Logo" class="object-contain">
                </div>
            </div>
            <h1 class="font-bold text-white tracking-tight">Login Ke Es Dongan</h1>
            <p class="text-gray-100">Masuk ke akun Anda !</p>
        </div>

        <!-- Login Card -->
        <div class="glass-effect shadow-2xl">

            <!-- Flash Messages -->
            <div id="errorMessage" class="hidden bg-red-50 border-l-4 border-red-500 text-red-700 alert-box animate-pulse">
                <p class="font-semibold mb-1">Error!</p>
                <p class="text-sm">Email atau password salah</p>
            </div>

            <div id="successMessage" class="hidden bg-green-50 border-l-4 border-green-500 text-green-700 alert-box">
                <p class="font-semibold mb-1">Berhasil!</p>
                <p class="text-sm">Registrasi berhasil, silakan login</p>
            </div>

            <form action="/login" method="post">
                <!-- Email Input -->
                <div class="form-group gradient-border rounded-xl">
                    <label class="form-label">Email</label>
                    <div class="relative">
                        <div class="input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input type="email" name="email" required class="form-input" placeholder="email@example.com">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group gradient-border rounded-xl">
                    <label class="form-label">Password</label>
                    <div class="relative">
                        <div class="input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input type="password" id="passwordField" name="password" required class="form-input" placeholder="••••••••" style="padding-right: 2.75rem;">
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <svg id="eyeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between remember-forgot">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" class="rounded border-gray-300 text-[#00BBFF] focus:ring-[#00BBFF] focus:ring-offset-0">
                        <span class="ml-2 text-gray-600">Ingat saya</span>
                    </label>
                    <a href="/forgot-password" class="text-[#00BBFF] hover:text-[#008fc7] font-semibold transition-colors">
                        Lupa Password?
                    </a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-[#00BBFF] to-[#008fc7] text-white btn-primary shadow-lg transition-all duration-300 btn-shine">
                    Masuk Sekarang
                </button>
            </form>

            <!-- Register Link -->
            <div class="text-center footer-section border-t border-gray-200">
                <p class="text-gray-600">
                    Belum punya akun?
                    <a href="/register" class="text-[#00BBFF] font-bold hover:text-[#008fc7] transition-colors ml-1">
                        Daftar Sekarang →
                    </a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center back-home">
            <a href="/" class="inline-flex items-center text-white hover:text-gray-100 transition-colors font-semibold">
                <svg class="mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        // Password Toggle
        function togglePassword() {
            const field = document.getElementById('passwordField');
            const icon = document.getElementById('eyeIcon');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                `;
            } else {
                field.type = 'password';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }
    </script>

</body>

</html>