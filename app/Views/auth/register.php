<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Toko Es</title>
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
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .gradient-border {
            position: relative;
            background: white;
        }
        
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 0.5rem;
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
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(10px, -10px) rotate(5deg); }
            50% { transform: translate(-5px, -20px) rotate(-5deg); }
            75% { transform: translate(-10px, -10px) rotate(3deg); }
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

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9CA3AF;
        }

        .has-icon {
            padding-left: 3rem;
        }
    </style>
</head>
<body class="bg-pattern min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <!-- Animated Background Elements -->
    <div class="ice-cube" style="width: 60px; height: 60px; top: 10%; left: 15%; animation-delay: 0s;"></div>
    <div class="ice-cube" style="width: 40px; height: 40px; top: 70%; left: 80%; animation-delay: 2s;"></div>
    <div class="ice-cube" style="width: 50px; height: 50px; top: 30%; right: 10%; animation-delay: 4s;"></div>
    <div class="ice-cube" style="width: 35px; height: 35px; bottom: 20%; left: 25%; animation-delay: 3s;"></div>

    <div class="w-full max-w-lg relative z-10 my-8">
        <!-- Logo/Brand Section with Animation -->
        <div class="text-center mb-8 animate-float">
            <div class="inline-block p-4 rounded-full bg-gradient-to-br from-[#00BBFF] to-[#008fc7] shadow-2xl mb-4">
                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"/>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Toko Es</h1>
            <p class="text-gray-100">Buat akun baru Anda</p>
        </div>

        <!-- Register Card -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8 md:p-10">
            
            <!-- Flash Messages -->
            <?php if(session()->getFlashdata('errors')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6">
                <p class="font-medium mb-2">Terjadi kesalahan:</p>
                <ul class="text-sm space-y-1">
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <li>• <?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="/register" method="post" class="space-y-5">
                <!-- Nama Lengkap -->
                <div class="gradient-border rounded-lg">
                    <label class="block text-gray-700 font-semibold mb-2 px-1">Nama Lengkap</label>
                    <div class="relative">
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <input type="text" name="name" required value="<?= old('name') ?>"
                            class="w-full has-icon pr-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-[#00BBFF] transition-all duration-300"
                            placeholder="Bang Lase">
                    </div>
                </div>

                <!-- Email -->
                <div class="gradient-border rounded-lg">
                    <label class="block text-gray-700 font-semibold mb-2 px-1">Email</label>
                    <div class="relative">
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        <input type="email" name="email" required value="<?= old('email') ?>"
                            class="w-full has-icon pr-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-[#00BBFF] transition-all duration-300"
                            placeholder="email@example.com">
                    </div>
                </div>

                <!-- No. Telepon -->
                <div class="gradient-border rounded-lg">
                    <label class="block text-gray-700 font-semibold mb-2 px-1">No. Telepon</label>
                    <div class="relative">
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <input type="text" name="phone" value="<?= old('phone') ?>"
                            class="w-full has-icon pr-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-[#00BBFF] transition-all duration-300"
                            placeholder="081234567890">
                    </div>
                </div>

                <!-- Alamat -->
                <div class="gradient-border rounded-lg">
                    <label class="block text-gray-700 font-semibold mb-2 px-1">Alamat</label>
                    <div class="relative">
                        <svg class="absolute left-4 top-3 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <textarea name="address" rows="2"
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-[#00BBFF] transition-all duration-300"
                            placeholder="Alamat lengkap Anda"><?= old('address') ?></textarea>
                    </div>
                </div>

                <!-- Password -->
                <div class="gradient-border rounded-lg">
                    <label class="block text-gray-700 font-semibold mb-2 px-1">Password</label>
                    <div class="relative">
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <input type="password" name="password" required 
                            class="w-full has-icon pr-12 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-[#00BBFF] transition-all duration-300"
                            placeholder="••••••••">
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div class="gradient-border rounded-lg">
                    <label class="block text-gray-700 font-semibold mb-2 px-1">Konfirmasi Password</label>
                    <div class="relative">
                        <svg class="input-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <input type="password" name="password_confirm" required 
                            class="w-full has-icon pr-12 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-[#00BBFF] transition-all duration-300"
                            placeholder="••••••••">
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Register Button -->
                <button type="submit" 
                    class="w-full bg-gradient-to-r from-[#00BBFF] to-[#008fc7] text-white py-4 rounded-lg font-bold text-lg shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-300 btn-shine mt-6">
                    Daftar Sekarang
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-8 pt-6 border-t border-gray-200">
                <p class="text-gray-600">
                    Sudah punya akun? 
                    <a href="/login" class="text-[#00BBFF] font-bold hover:text-[#008fc7] transition-colors ml-1">
                        Login di sini →
                    </a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="/" class="inline-flex items-center text-white hover:text-white/80 transition-colors font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>