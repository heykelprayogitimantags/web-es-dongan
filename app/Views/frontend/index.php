<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .scale-in {
            animation: scaleIn 0.5s ease-out;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .glass-dark {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .gradient-text {
            background: linear-gradient(135deg, #38b6ff 0%, #38b6ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 400px;
            height: 400px;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #38b6ff, #38b6ff);
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .scroll-smooth {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #38b6ff, #38b6ff);
            border-radius: 10px;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #38b6ff 0%, #38b6ff 50%, #38b6ff 100%);
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .product-badge {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 280px;
            height: 100vh;
            background: white;
            box-shadow: -4px 0 20px rgba(0, 0, 0, 0.1);
            z-index: 100;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .mobile-menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99;
            display: none;
        }

        .mobile-menu-overlay.active {
            display: block;
        }

        /* Responsive Adjustments - TAMBAHKAN INI */
        @media (max-width: 768px) {
            .card-hover:hover {
                transform: translateY(-8px) scale(1.01);
            }

            .feature-card:hover {
                transform: translateY(-3px);
            }
        }

        @media (max-width: 640px) {
            .hero-gradient {
                min-height: 60vh !important;
            }

            .float-animation {
                animation: none;
                /* Disable float on mobile for performance */
            }
        }
    </style>
</head>

<body class="scroll-smooth bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50">

    <!-- Navbar -->
    <nav class="glass-effect sticky top-0 z-50 shadow-lg border-b border-white/20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-between items-center py-3 md:py-4">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2 md:space-x-3 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur-lg opacity-75 group-hover:opacity-100 transition-all duration-300"></div>
                        <div class="relative bg-white rounded-full p-1.5 md:p-2 shadow-xl">
                            <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan Logo" class="w-8 h-8 md:w-10 md:h-10 object-contain">
                        </div>
                    </div>
                    <div>
                        <span class="text-xl md:text-2xl font-extrabold gradient-text block">Es Dongan</span>
                        <span class="text-[10px] md:text-xs text-gray-500 font-medium hidden sm:block">Minumannya Kawan Awak</span>
                    </div>
                </a>

                <!-- Navigation Menu - Desktop Only -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="nav-link text-gray-700 hover:text-cyan-600 font-semibold">Beranda</a>
                    <a href="#products" class="nav-link text-gray-700 hover:text-cyan-600 font-semibold">Produk</a>
                    <a href="#about" class="nav-link text-gray-700 hover:text-cyan-600 font-semibold">Tentang</a>
                    <a href="#contact" class="nav-link text-gray-700 hover:text-cyan-600 font-semibold">Kontak</a>
                </div>

                <!-- Right Menu -->
                <div class="flex items-center space-x-2 md:space-x-4">
                    <!-- Cart -->
                    <a href="/cart" class="relative group">
                        <div class="p-2 rounded-xl hover:bg-cyan-50 transition-all">
                            <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-700 group-hover:text-cyan-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <?php if (session()->get('cart')): ?>
                                <span class="absolute -top-1 -right-1 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs rounded-full w-4 h-4 md:w-5 md:h-5 flex items-center justify-center font-bold shadow-lg animate-pulse">
                                    <?= count(session()->get('cart')) ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </a>

                    <!-- User Menu - Desktop -->
                    <?php if (session()->get('logged_in')): ?>
                        <div class="flex items-center space-x-4">
                            <a href="/profile" class="text-gray-700 hover:text-cyan-600 flex items-center gap-2">
                                <div class="w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                    <?= strtoupper(substr(session()->get('name'), 0, 2)) ?>
                                </div>
                                <span class="hidden md:inline"><?= session()->get('name') ?></span>
                            </a>
                            <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Logout</a>
                        </div>
                    <?php else: ?>
                        <a href="/login" class="bg-cyan-600 text-white px-4 py-2 rounded-lg hover:bg-cyan-700">Login</a>
                    <?php endif; ?>

                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-cyan-50 transition-colors">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div id="mobileMenuOverlay" class="mobile-menu-overlay"></div>
    <div id="mobileMenu" class="mobile-menu">
        <div class="p-6">
            <div class="flex justify-between items-center mb-8">
                <span class="text-xl font-bold gradient-text">Menu</span>
                <button id="closeMobileMenu" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <nav class="flex flex-col space-y-4">
                <a href="/" class="text-gray-700 hover:text-cyan-600 font-semibold py-2 border-b border-gray-100 transition-colors">Beranda</a>
                <a href="#products" class="mobile-menu-link text-gray-700 hover:text-cyan-600 font-semibold py-2 border-b border-gray-100 transition-colors">Produk</a>
                <a href="#about" class="mobile-menu-link text-gray-700 hover:text-cyan-600 font-semibold py-2 border-b border-gray-100 transition-colors">Tentang</a>
                <a href="#contact" class="mobile-menu-link text-gray-700 hover:text-cyan-600 font-semibold py-2 border-b border-gray-100 transition-colors">Kontak</a>

                <?php if (session()->get('logged_in')): ?>
                    <div class="pt-4 border-t border-gray-200">
                        <p class="text-sm font-semibold text-gray-700 mb-2">Hi, <?= session()->get('name') ?>!</p>
                        <a href="/logout" class="block w-full btn-primary bg-gradient-to-r from-red-500 to-pink-600 text-white px-6 py-3 rounded-xl text-center font-semibold shadow-lg">
                            <span class="relative z-10">Logout</span>
                        </a>
                    </div>
                <?php else: ?>
                    <a href="/login" class="mt-4 block w-full btn-primary bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 py-3 rounded-xl text-center font-semibold shadow-lg">
                        <span class="relative z-10">Login</span>
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </div>

    <section class="relative overflow-hidden hero-gradient py-8 md:py-12 lg:py-20 min-h-[60vh] md:min-h-[70vh] lg:min-h-[80vh] flex items-center">

        <!-- Decorative Background -->
        <div class="absolute top-20 right-10 w-56 h-56 lg:w-72 lg:h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-72 h-72 lg:w-96 lg:h-96 bg-white/10 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                <!-- TEXT -->
                <div class="text-white space-y-6 order-2 lg:order-1 text-center lg:text-left">

                    <span class="glass-effect bg-white/20 backdrop-blur-md text-white border border-white/20 px-5 py-2 rounded-full text-sm font-bold tracking-wide shadow-sm inline-block">
                        🎉 Promo Spesial Hari Ini!
                    </span>

                    <h1 class="text-4xl lg:text-6xl font-black leading-tight drop-shadow-md">
                        Segarkan Harimu dengan
                        <span class="block mt-2 text-yellow-300 filter drop-shadow-lg">Es Dongan!</span>
                    </h1>

                    <p class="text-base lg:text-lg text-blue-50 font-medium leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Siang terik bikin suntuk? Ajak Donganmu, segarkan harimu dengan Es Dongan!
                        Pilihan rasa lokal modern, harga ramah di kantong. Pesan sekarang! ❄️
                    </p>

                    <div class="flex justify-center lg:justify-start flex-wrap gap-4 pt-4">
                        <a href="#products"
                            class="group bg-white text-cyan-600 px-7 py-3 rounded-2xl font-bold text-base lg:text-lg hover:bg-yellow-300 hover:text-cyan-800 shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 inline-flex items-center gap-3">
                            <span>Lihat Produk</span>
                            <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>

                        <a href="#about" class="bg-white/20 text-white px-6 py-2.5 rounded-xl font-bold text-sm lg:text-base hover:bg-white/30 border border-white/50 transition-all">
                            <span>Tentang Kami</span>
                        </a>
                    </div>
                </div>

                <!-- IMAGE -->
                <div class="relative order-1 lg:order-2 flex justify-center lg:justify-end">
                    <div class="relative float-animation">

                        <div class="rounded-[2rem] overflow-hidden border-[6px] lg:border-[8px] border-white/20 shadow-2xl bg-white/5 backdrop-blur-sm w-[260px] sm:w-[320px] md:w-[380px] lg:w-[420px]">
                            <img src="/uploads/hero.png"
                                alt="Es Dongan"
                                class="w-full h-auto object-cover hover:scale-105 transition-transform duration-700">
                        </div>

                        <div class="absolute -top-5 -right-5 w-20 h-20 bg-yellow-300 rounded-full blur-xl opacity-60 animate-pulse"></div>
                        <div class="absolute -bottom-5 -left-5 w-24 h-24 bg-pink-400 rounded-full blur-xl opacity-60"></div>

                    </div>
                </div>

            </div>
        </div>

    </section>


    <!-- Wave Bottom -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="rgb(248 250 252)" />
        </svg>
    </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card glass-effect rounded-3xl p-8 shadow-xl text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Kualitas Premium</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Dibuat dengan bahan pilihan terbaik dan proses produksi yang higienis...
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card glass-effect rounded-3xl p-8 shadow-xl text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Pengiriman Cepat</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Pesanan Anda akan dikirim dengan cepat dan tetap dalam kondisi Terbaik...
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card glass-effect rounded-3xl p-8 shadow-xl text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">100% Terpercaya</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Memiliki Banyak Macam Menu Dan Halal, Serta Dapat Dipercaya...
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-16 fade-in-up">
                <span class="inline-block bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 py-2 rounded-full text-sm font-bold mb-4 shadow-lg">
                    PRODUK KAMI
                </span>
                <h2 class="text-5xl lg:text-6xl font-black text-gray-800 mb-4">
                    Menu Populer <span class="gradient-text">Es Dongan</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Pilihan es segar terbaik untuk setiap momen spesial Anda
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                <?php foreach ($products as $index => $product): ?>
                    <div class="card-hover glass-effect rounded-3xl overflow-hidden shadow-xl scale-in" style="animation-delay: <?= $index * 0.1 ?>s">
                        <div class="relative h-64 bg-gradient-to-br from-cyan-100 via-blue-100 to-purple-100 overflow-hidden group">
                            <?php if ($product['image']): ?>
                                <img src="/uploads/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <?php else: ?>
                                <div class="h-full flex items-center justify-center">
                                    <svg class="w-32 h-32 text-cyan-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z" />
                                    </svg>
                                </div>
                            <?php endif; ?>

                            <div class="absolute top-4 left-4">
                                <span class="product-badge bg-white/90 text-cyan-700 px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                    <?= $product['category_name'] ?>
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1"><?= $product['name'] ?></h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed"><?= $product['description'] ?></p>

                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <p class="text-xs text-gray-500 line-through">Rp <?= number_format($product['price'] * 1.3, 0, ',', '.') ?></p>
                                    <p class="text-2xl font-black gradient-text">Rp <?= number_format($product['price'], 0, ',', '.') ?></p>
                                </div>
                                <div class="flex items-center gap-1 bg-yellow-100 px-2 py-1 rounded-lg">
                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="text-xs font-bold text-gray-700">4.8</span>
                                </div>
                            </div>

                            <form action="/cart/add" method="post" class="w-full">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn-primary w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-3 rounded-xl hover:from-cyan-600 hover:to-blue-700 font-bold shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2">
                                    <span class="relative z-10">Tambah ke Keranjang</span>
                                    <svg class="w-5 h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="flex justify-center items-center w-full pb-8">
                <a href="/products" class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-200 bg-gradient-to-r from-cyan-500 to-blue-600 font-pj rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-600 hover:scale-105 shadow-xl hover:shadow-2xl">
                    <span class="mr-3 text-lg">Lihat Semuaaaa Produk</span>
                    <div class="bg-white/20 rounded-full p-1 group-hover:translate-x-1 transition-transform">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </div>
                    <div class="absolute -inset-3 rounded-full bg-cyan-400 opacity-20 blur-lg transition duration-200 group-hover:opacity-40"></div>
                </a>
            </div>

        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gradient-to-br from-cyan-500 via-blue-600 to-purple-600 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h2 class="text-5xl lg:text-6xl font-black mb-6">
                    Kenapa Memilih <span class="text-yellow-300">Es Dongan?</span>
                </h2>
                <p class="text-xl lg:text-2xl leading-relaxed mb-12 text-blue-100">
                    Kami berkomitmen menghadirkan es berkualitas premium dengan cita rasa yang istimewa.
                    Dipercaya ribuan pelanggan di seluruh Indonesia sejak 2020.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                    <div class="glass-effect rounded-2xl p-8 text-left">
                        <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-cyan-900 mb-3">Bahan Berkualitas</h3>
                        <p class="text-gray-700">Hanya menggunakan bahan pilihan terbaik untuk menghasilkan es dengan rasa yang luar biasa.</p>
                    </div>

                    <div class="glass-effect rounded-2xl p-8 text-left">
                        <div class="w-12 h-12 bg-green-400 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-cyan-900 mb-3">Proses Higienis</h3>
                        <p class="text-gray-700">Diproduksi dengan standar kebersihan tinggi dan proses yang terjamin aman.</p>
                    </div>

                    <div class="glass-effect rounded-2xl p-8 text-left">
                        <div class="w-12 h-12 bg-blue-400 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-cyan-900 mb-3">Layanan Cepat</h3>
                        <p class="text-gray-700">Pengiriman cepat dan responsif untuk memastikan kepuasan pelanggan maksimal.</p>
                    </div>

                    <div class="glass-effect rounded-2xl p-8 text-left">
                        <div class="w-12 h-12 bg-purple-400 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-cyan-900 mb-3">Harga Terjangkau</h3>
                        <p class="text-gray-700">Kualitas premium dengan harga yang ramah di kantong untuk semua kalangan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-5xl font-black text-gray-800 mb-4">
                        Hubungi <span class="gradient-text">Kami</span>
                    </h2>
                    <p class="text-xl text-gray-600">
                        Punya pertanyaan? Kami siap membantu Anda!
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- TELEPON / WHATSAPP -->
                    <a href="https://wa.me/6281324633258" target="_blank"
                        class="glass-effect rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition-all cursor-pointer">
                        <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Telepon / WhatsApp</h3>
                        <p class="text-gray-600">+62 813-2463-3258</p>
                    </a>

                    <!-- EMAIL -->
                    <a href="heykelprayogi123@gmail.com"
                        class="glass-effect rounded-2xl p-6 text-center shadow-lg hover:shadow-xl transition-all cursor-pointer">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Email</h3>
                        <p class="text-gray-600">info@esdongan.com</p>
                    </a>

                    <!-- MAP -->
                    <div class="glass-effect rounded-2xl p-4 shadow-lg mx-auto w-full h-full">
                        <h4 class="font-bold text-gray-800 mb-3 text-center">Lokasi Kami</h4>

                        <div id="mini-map" class="w-full rounded-xl overflow-hidden" style="height:220px;"></div>

                        <p class="text-sm text-gray-600 mt-3 text-center">Medan, Sumatera Utara — Es Dongan</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- SCRIPT LEAFLET -->
    <script>
        // Koordinat Medan
        const lat = 3.5952;
        const lng = 98.6722;

        const map = L.map('mini-map', {
            center: [lat, lng],
            zoom: 13,
            scrollWheelZoom: false,
            dragging: true,
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        const marker = L.marker([lat, lng]).addTo(map);
        marker.bindPopup("<strong>Es Dongan</strong><br>Medan, Sumatera Utara").openPopup();

        setTimeout(() => {
            map.invalidateSize();
        }, 200);
    </script>


    <!-- Footer -->
    <footer class="glass-dark text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-900 opacity-90"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan" class="w-12 h-12 rounded-full bg-white p-2">
                        <div>
                            <h3 class="text-2xl font-bold">Es Dongan</h3>
                            <p class="text-sm text-gray-300">Segar & Berkualitas</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4 leading-relaxed">
                        Menyediakan berbagai pilihan es segar berkualitas premium untuk keluarga Indonesia.
                        Dipercaya sejak 2020 dengan ribuan pelanggan puas.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Menu Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-300 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#products" class="text-gray-300 hover:text-white transition-colors">Produk</a></li>
                        <li><a href="#about" class="text-gray-300 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Dukungan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Cara Pemesanan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-300 text-sm mb-4 md:mb-0">
                    &copy; 2025 Es Dongan. All Rights Reserved. Made with ❤️ By Heykel Prayogi Timanta G.s
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png" alt="Visa" class="h-8 opacity-70">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/200px-MasterCard_Logo.svg.png" alt="Mastercard" class="h-8 opacity-70">
                    <div class="bg-white rounded-lg p-2.5 md:p-3 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <img src="/uploads/Mandiri.png" alt="Mandiri" class="h-6 md:h-8 opacity-70 hover:opacity-100 transition-opacity">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollTop" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-full shadow-2xl hover:shadow-3xl transition-all opacity-0 invisible hover:scale-110 flex items-center justify-center z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <script>
        // Scroll to Top
        const scrollTopBtn = document.getElementById('scrollTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'invisible');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'invisible');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        const closeMobileMenu = document.getElementById('closeMobileMenu');

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileMenuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenuFunc() {
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        mobileMenuBtn.addEventListener('click', openMobileMenu);
        closeMobileMenu.addEventListener('click', closeMobileMenuFunc);
        mobileMenuOverlay.addEventListener('click', closeMobileMenuFunc);

        // Close menu when clicking menu links
        document.querySelectorAll('.mobile-menu-link').forEach(link => {
            link.addEventListener('click', closeMobileMenuFunc);
        });

        // Close menu on window resize if mobile menu is open
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024 && mobileMenu.classList.contains('active')) {
                closeMobileMenuFunc();
            }
        });
    </script>
</body>

</html>