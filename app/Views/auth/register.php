<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
            padding: 1rem;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        html {
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
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .bg-pattern {
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #0891b2 100%);
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
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
            border-radius: 12px;
            backdrop-filter: blur(5px);
            animation: float-random 10s ease-in-out infinite;
            box-shadow: 0 8px 32px rgba(255, 255, 255, 0.1);
        }
        
        @keyframes float-random {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(15px, -15px) rotate(5deg); }
            50% { transform: translate(-10px, -25px) rotate(-5deg); }
            75% { transform: translate(-15px, -10px) rotate(3deg); }
        }
        
        .input-group {
            position: relative;
            margin-bottom: 1.25rem;
        }
        
        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 12px 14px 12px 44px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }
        
        .input-group input:focus,
        .input-group textarea:focus {
            outline: none;
            border-color: #0ea5e9;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1);
        }
        
        .input-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
            font-size: 13px;
            letter-spacing: -0.01em;
        }
        
        .input-icon {
            position: absolute;
            left: 14px;
            top: 38px;
            color: #9ca3af;
            pointer-events: none;
        }
        
        .input-group textarea {
            resize: vertical;
            min-height: 70px;
            padding-top: 12px;
        }
        
        .input-group.textarea-group .input-icon {
            top: 44px;
        }
        
        .btn-primary {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(14, 165, 233, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .password-toggle {
            position: absolute;
            right: 14px;
            top: 38px;
            cursor: pointer;
            color: #9ca3af;
            transition: color 0.2s;
            background: none;
            border: none;
            padding: 4px;
        }
        
        .password-toggle:hover {
            color: #4b5563;
        }
        
        .strength-meter {
            height: 3px;
            background: #e5e7eb;
            border-radius: 2px;
            margin-top: 6px;
            overflow: hidden;
        }
        
        .strength-meter-fill {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        
        .strength-weak { 
            background: #ef4444; 
            width: 33%; 
        }
        
        .strength-medium { 
            background: #f59e0b; 
            width: 66%; 
        }
        
        .strength-strong { 
            background: #10b981; 
            width: 100%; 
        }
        
        .alert {
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            animation: slideDown 0.3s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-error {
            background: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
        }
        
        .card-shadow {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }
        
        .link-primary {
            color: #0ea5e9;
            font-weight: 600;
            transition: color 0.2s;
            text-decoration: none;
        }
        
        .link-primary:hover {
            color: #0284c7;
        }

        /* FORM GRID - Mobile First */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0;
        }

        /* Container wrapper */
        .container-wrapper {
            width: 100%;
            max-width: 48rem; /* max-w-3xl = 48rem */
            margin: 0 auto;
        }

        /* ========= MOBILE FIRST (DEFAULT) ========= */
        /* Semua device mulai dari yang terkecil */
        
        body {
            padding: 0.5rem;
        }
        
        .glass-effect {
            padding: 1.25rem;
            border-radius: 1.5rem;
        }
        
        .logo-section {
            margin-bottom: 1.5rem;
        }
        
        .logo-section h1 {
            font-size: 1.5rem;
            line-height: 2rem;
        }
        
        .logo-section p {
            font-size: 0.875rem;
        }
        
        .logo-wrapper {
            padding: 0.625rem;
            margin-bottom: 0.75rem;
        }
        
        .logo-inner {
            padding: 0.5rem;
        }
        
        .logo-inner img {
            width: 2rem;
            height: 2rem;
        }
        
        .input-group {
            margin-bottom: 1rem;
        }
        
        .input-group input,
        .input-group textarea {
            padding: 13px 12px 13px 42px;
            font-size: 16px; /* Prevent iOS zoom */
        }
        
        .input-icon {
            left: 13px;
            top: 39px;
            width: 1.125rem;
            height: 1.125rem;
        }
        
        .password-toggle {
            right: 13px;
            top: 39px;
        }
        
        .password-toggle svg {
            width: 1.125rem;
            height: 1.125rem;
        }
        
        .input-group.textarea-group .input-icon {
            top: 45px;
        }
        
        .btn-primary {
            padding: 0.875rem 0;
            font-size: 0.9375rem;
        }
        
        .ice-cube {
            width: 35px !important;
            height: 35px !important;
        }
        
        .footer-section {
            margin-top: 1.25rem;
            padding-top: 1.25rem;
        }
        
        .back-home {
            margin-top: 1.25rem;
        }

        /* ========= TABLET: 768px ke atas ========= */
        @media (min-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .glass-effect {
                padding: 2rem;
                border-radius: 2rem;
            }
            
            .logo-section {
                margin-bottom: 1.75rem;
            }
            
            .logo-section h1 {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }
            
            .logo-wrapper {
                padding: 0.75rem;
                margin-bottom: 0.875rem;
            }
            
            .logo-inner {
                padding: 0.625rem;
            }
            
            .logo-inner img {
                width: 2.5rem;
                height: 2.5rem;
            }
            
            /* Grid 2 kolom untuk tablet ke atas */
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0 1.25rem;
            }
            
            .input-group {
                margin-bottom: 1.25rem;
            }
            
            .input-group input,
            .input-group textarea {
                padding: 12px 14px 12px 44px;
                font-size: 14px;
            }
            
            .input-icon {
                left: 14px;
                top: 38px;
                width: 1.25rem;
                height: 1.25rem;
            }
            
            .password-toggle {
                right: 14px;
                top: 38px;
            }
            
            .password-toggle svg {
                width: 1.25rem;
                height: 1.25rem;
            }
            
            .input-group.textarea-group .input-icon {
                top: 44px;
            }
            
            .btn-primary {
                padding: 0.875rem 0;
                font-size: 1rem;
            }
            
            .ice-cube {
                width: 55px !important;
                height: 55px !important;
            }
            
            .footer-section {
                margin-top: 1.5rem;
                padding-top: 1.5rem;
            }
            
            .back-home {
                margin-top: 1.5rem;
            }
        }

        /* ========= DESKTOP: 1024px ke atas ========= */
        @media (min-width: 1024px) {
            body {
                padding: 1.5rem;
            }
            
            .glass-effect {
                padding: 2.5rem;
                border-radius: 2.25rem;
            }
            
            .logo-section {
                margin-bottom: 2rem;
            }
            
            .logo-section h1 {
                font-size: 2.25rem;
                line-height: 2.5rem;
            }
            
            .logo-wrapper {
                padding: 0.875rem;
                margin-bottom: 1rem;
            }
            
            .logo-inner img {
                width: 3rem;
                height: 3rem;
            }
            
            .form-grid {
                gap: 0 1.5rem;
            }
            
            .btn-primary {
                padding: 1rem 0;
            }
            
            .ice-cube {
                width: 70px !important;
                height: 70px !important;
            }
            
            .footer-section {
                margin-top: 1.75rem;
                padding-top: 1.75rem;
            }
            
            .back-home {
                margin-top: 1.75rem;
            }
        }

        /* ========= LARGE DESKTOP: 1280px ke atas ========= */
        @media (min-width: 1280px) {
            .glass-effect {
                padding: 3rem;
                border-radius: 2.5rem;
            }
            
            .ice-cube {
                width: 80px !important;
                height: 80px !important;
            }
        }

        /* ========= LANDSCAPE MODE ========= */
        @media (max-height: 600px) and (orientation: landscape) {
            .animate-float {
                animation: none;
            }
            
            body {
                padding: 0.5rem;
            }
            
            .glass-effect {
                padding: 1rem;
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
            
            .input-group {
                margin-bottom: 0.75rem;
            }
            
            .input-group textarea {
                min-height: 60px;
            }
            
            .btn-primary {
                padding: 0.75rem 0;
            }
            
            .ice-cube {
                display: none;
            }
            
            .footer-section {
                margin-top: 1rem;
                padding-top: 1rem;
            }
            
            .back-home {
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body class="bg-pattern relative">
    
    <!-- Animated Background Elements -->
    <div class="ice-cube" style="width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s;"></div>
    <div class="ice-cube" style="width: 60px; height: 60px; top: 60%; left: 85%; animation-delay: 2s;"></div>
    <div class="ice-cube" style="width: 70px; height: 70px; top: 25%; right: 8%; animation-delay: 4s;"></div>
    <div class="ice-cube" style="width: 50px; height: 50px; bottom: 15%; left: 20%; animation-delay: 3s;"></div>
    <div class="ice-cube" style="width: 45px; height: 45px; top: 75%; left: 50%; animation-delay: 5s;"></div>

    <div class="container-wrapper relative z-10" style="padding-top: 2rem; padding-bottom: 2rem;">
        <!-- Logo/Brand Section -->
        <div class="text-center logo-section animate-float">
            <div class="inline-block logo-wrapper rounded-full bg-gradient-to-br from-[#0ea5e9] to-[#06b6d4] shadow-2xl">
                <div class="relative bg-white rounded-full logo-inner shadow-xl">
                    <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan Logo" class="object-contain">
                </div>
            </div>
            <h1 class="font-bold text-white mb-2 tracking-tight">Daftar Akun</h1>
            <p class="text-white/90">Bergabunglah dengan Es Dongan</p>
        </div>

        <!-- Register Card -->
        <div class="glass-effect card-shadow">
            
            <!-- Flash Messages -->
            <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert alert-error">
                <p class="font-semibold mb-2 flex items-center text-sm">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    Terjadi kesalahan
                </p>
                <ul class="text-xs space-y-1 ml-7">
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <li>• <?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="/register" method="post" id="registerForm">
                <div class="form-grid">
                    <!-- Nama Lengkap -->
                    <div class="input-group">
                        <label for="name">Nama Lengkap</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            required 
                            value="<?= old('name') ?>"
                            placeholder="Masukkan nama lengkap"
                            autocomplete="name">
                    </div>

                    <!-- Email -->
                    <div class="input-group">
                        <label for="email">Alamat Email</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            value="<?= old('email') ?>"
                            placeholder="nama@email.com"
                            autocomplete="email">
                    </div>

                    <!-- No. Telepon -->
                    <div class="input-group">
                        <label for="phone">Nomor Telepon</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone" 
                            value="<?= old('phone') ?>"
                            placeholder="08123456789"
                            autocomplete="tel">
                    </div>

                    <!-- Alamat -->
                    <div class="input-group textarea-group">
                        <label for="address">Alamat Lengkap</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <textarea 
                            id="address" 
                            name="address" 
                            rows="2"
                            placeholder="Jalan, Kelurahan, Kecamatan, Kota"
                            autocomplete="street-address"><?= old('address') ?></textarea>
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <label for="password">Password</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password">
                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                        <div class="strength-meter">
                            <div class="strength-meter-fill" id="strengthMeter"></div>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="input-group">
                        <label for="password_confirm">Konfirmasi Password</label>
                        <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <input 
                            type="password" 
                            id="password_confirm" 
                            name="password_confirm" 
                            required 
                            placeholder="Ulangi password"
                            autocomplete="new-password">
                        <button type="button" class="password-toggle" onclick="togglePassword('password_confirm')">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Register Button -->
                <button 
                    type="submit" 
                    class="w-full btn-primary text-white rounded-xl font-semibold shadow-lg mt-4">
                    Daftar Sekarang
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center footer-section border-t border-gray-200">
                <p class="text-gray-600 text-sm">
                    Sudah punya akun? 
                    <a href="/login" class="link-primary">Masuk di sini</a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center back-home">
            <a href="/" class="inline-flex items-center text-white/90 hover:text-white transition-colors text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        // Password Toggle
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const button = field.nextElementSibling;
            
            if (field.type === 'password') {
                field.type = 'text';
                button.innerHTML = `
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>
                `;
            } else {
                field.type = 'password';
                button.innerHTML = `
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                `;
            }
        }

        // Password Strength Meter
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.getElementById('strengthMeter');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            strengthMeter.className = 'strength-meter-fill';
            
            if (strength === 0) {
                strengthMeter.style.width = '0%';
            } else if (strength <= 2) {
                strengthMeter.classList.add('strength-weak');
            } else if (strength === 3) {
                strengthMeter.classList.add('strength-medium');
            } else {
                strengthMeter.classList.add('strength-strong');
            }
        });

        // Form Validation
        const form = document.getElementById('registerForm');
        const passwordConfirm = document.getElementById('password_confirm');

        form.addEventListener('submit', function(e) {
            if (passwordInput.value !== passwordConfirm.value) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
                passwordConfirm.focus();
            }
        });

        // Real-time password match validation
        passwordConfirm.addEventListener('input', function() {
            if (this.value && passwordInput.value !== this.value) {
                this.style.borderColor = '#ef4444';
            } else {
                this.style.borderColor = '#e5e7eb';
            }
        });
    </script>

</body>
</html>