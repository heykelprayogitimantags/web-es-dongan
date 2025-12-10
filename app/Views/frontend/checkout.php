<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Toko Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .gradient-text {
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.5s ease-out;
        }

        /* Mobile menu animation */
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

        .mobile-menu {
            animation: slideDown 0.3s ease-out;
        }

        /* Input focus effect */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
        }

        /* Radio button custom style */
        .radio-custom:checked+label {
            border-color: #06b6d4;
            background-color: #ecfeff;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Navigation -->
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
                        <span class="text-xs text-gray-500 font-medium hidden sm:block">Minumannya Kawan Awak</span>
                    </div>
                </a>

                <!-- Desktop Navigation Menu -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="nav-link text-gray-700 hover:text-cyan-600 font-semibold transition-colors">Beranda</a>
                    <a href="products" class="nav-link text-gray-700 hover:text-cyan-600 font-semibold transition-colors">Produk</a>
                    <a href="about" class="nav-link text-gray-700 hover:text-cyan-600 font-semibold transition-colors">Tentang</a>
                    <a href="contact" class="nav-link text-gray-700 hover:text-cyan-600 font-semibold transition-colors">Kontak</a>
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

                    <!-- User Menu -->
                    <?php if (session()->get('logged_in')): ?>
                        <div class="flex items-center space-x-2 md:space-x-3">
                            <div class="hidden xl:block text-right">
                                <p class="text-sm font-semibold text-gray-700">Hi, <?= session()->get('name') ?>!</p>
                                <p class="text-xs text-gray-500">Selamat Datang</p>
                            </div>
                            <a href="/logout" class="bg-gradient-to-r from-red-500 to-pink-600 text-white px-3 py-2 md:px-5 md:py-2.5 rounded-xl hover:from-red-600 hover:to-pink-700 font-semibold shadow-lg hover:shadow-xl transition-all text-sm md:text-base">
                                Logout
                            </a>
                        </div>
                    <?php else: ?>
                        <a href="/login" class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-4 py-2 md:px-6 md:py-2.5 rounded-xl hover:from-cyan-600 hover:to-blue-700 font-semibold shadow-lg hover:shadow-xl transition-all text-sm md:text-base">
                            Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6 md:py-12 max-w-7xl">
        <div class="max-w-6xl mx-auto">
            <!-- Header with Back Button -->
            <div class="flex items-center justify-between mb-6 md:mb-8">
                <div>
                    <h1 class="text-2xl md:text-4xl font-bold text-gray-800 mb-1 md:mb-2">Checkout</h1>
                    <p class="text-sm md:text-base text-gray-600">Lengkapi informasi pengiriman Anda</p>
                </div>
                <a href="/cart" class="flex items-center text-cyan-600 hover:text-cyan-700 font-semibold transition-colors text-sm md:text-base">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="hidden sm:inline">Kembali ke Keranjang</span>
                    <span class="sm:hidden">Kembali</span>
                </a>
            </div>

            <!-- Error Messages -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-6 animate-slide-in shadow-sm">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <div class="flex-1">
                            <p class="font-semibold mb-1">Terdapat kesalahan:</p>
                            <ul class="space-y-1">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li class="text-sm">• <?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
                <!-- Form Checkout -->
                <div class="lg:col-span-2 order-2 lg:order-1">
                    <div class="bg-white rounded-2xl shadow-xl p-4 md:p-6 lg:p-8 animate-slide-in border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="bg-cyan-100 rounded-full p-3 mr-3">
                                <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl md:text-2xl font-bold text-gray-800">Informasi Pengiriman</h2>
                                <p class="text-sm text-gray-600">Pastikan data sudah benar</p>
                            </div>
                        </div>

                        <form action="/checkout/process" method="post">
                            <div class="space-y-5">
                                <!-- Nama Lengkap -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" value="<?= session()->get('name') ?>" disabled
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-600">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" value="<?= session()->get('email') ?>" disabled
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl bg-gray-50 text-gray-600">
                                    </div>
                                </div>

                                <!-- No. Telepon -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        No. Telepon <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="tel" name="phone" required value="<?= old('phone') ?>"
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent input-focus transition-all"
                                            placeholder="contoh: 081234567890">
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Format: 08xxxxxxxxxx</p>
                                </div>

                                <!-- Alamat Lengkap -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Alamat Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="shipping_address" rows="4" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent input-focus transition-all resize-none"
                                        placeholder="Jl. Contoh No. 123, RT/RW, Kelurahan, Kecamatan, Kota, Provinsi, Kode Pos"><?= old('shipping_address') ?></textarea>
                                    <p class="text-xs text-gray-500 mt-1">Sertakan nama jalan, nomor rumah, RT/RW, dan patokan jika perlu</p>
                                </div>

                                <!-- Catatan -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Catatan <span class="text-gray-400 text-xs">(Opsional)</span>
                                    </label>
                                    <textarea name="notes" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent input-focus transition-all resize-none"
                                        placeholder="Contoh: Kurir tolong hubungi sebelum datang, atau request tambahan es batu..."><?= old('notes') ?></textarea>
                                </div>

                                <!-- Metode Pembayaran -->
                                <div class="border-t pt-6">
                                    <div class="flex items-center mb-4">
                                        <div class="bg-green-100 rounded-full p-2 mr-3">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Metode Pembayaran</h3>
                                            <p class="text-sm text-gray-600">Pilih cara pembayaran</p>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <!-- COD Option -->
                                        <input type="radio" name="payment_method" value="cod" id="cod" checked class="hidden radio-custom">
                                        <label for="cod" class="flex items-start p-4 border-2 border-cyan-500 rounded-xl bg-cyan-50 cursor-pointer transition-all hover:shadow-md">
                                            <div class="flex-shrink-0 mt-1">
                                                <div class="w-5 h-5 rounded-full border-2 border-cyan-600 flex items-center justify-center bg-white">
                                                    <div class="w-3 h-3 rounded-full bg-cyan-600"></div>
                                                </div>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <div class="font-semibold text-gray-800 flex items-center">
                                                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                        Cash on Delivery (COD)
                                                    </div>
                                                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Direkomendasikan</span>
                                                </div>
                                                <div class="text-sm text-gray-600 mt-1">Bayar tunai saat barang sampai di tangan Anda</div>
                                                <div class="flex items-center mt-2 text-xs text-green-600">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                    Aman & Praktis
                                                </div>
                                            </div>
                                        </label>

                                        <!-- Transfer Option (Disabled) -->
                                        <div class="relative">
                                            <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl cursor-not-allowed opacity-60 bg-gray-50">
                                                <div class="flex-shrink-0 mt-1">
                                                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center bg-white">
                                                        <div class="w-3 h-3 rounded-full bg-gray-300"></div>
                                                    </div>
                                                </div>
                                                <div class="ml-3 flex-1">
                                                    <div class="flex items-center justify-between">
                                                        <div class="font-semibold text-gray-600 flex items-center">
                                                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                                            </svg>
                                                            Transfer Bank
                                                        </div>
                                                        <span class="bg-gray-200 text-gray-600 text-xs font-semibold px-2 py-1 rounded-full">Segera Hadir</span>
                                                    </div>
                                                    <div class="text-sm text-gray-500 mt-1">Transfer ke rekening bank kami</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col sm:flex-row gap-3 pt-6">
                                    <button type="submit"
                                        class="flex-1 bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-4 rounded-xl font-semibold hover:from-cyan-600 hover:to-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Buat Pesanan
                                    </button>
                                    <a href="/cart"
                                        class="sm:w-auto px-6 py-4 border-2 border-gray-300 rounded-xl font-semibold hover:bg-gray-50 transition-all text-center flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                        </svg>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1 order-1 lg:order-2">
                    <div class="bg-white rounded-2xl shadow-xl p-4 md:p-6 lg:sticky lg:top-24 animate-slide-in border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 rounded-full p-2 mr-3">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Ringkasan Pesanan</h3>
                        </div>

                        <!-- Cart Items -->
                        <div class="space-y-3 mb-4 max-h-64 overflow-y-auto custom-scrollbar">
                            <?php foreach ($cart as $item): ?>
                                <div class="flex justify-between items-start border-b pb-3 hover:bg-gray-50 p-2 rounded-lg transition-colors">
                                    <div class="flex-1 pr-2">
                                        <div class="font-medium text-gray-800 text-sm md:text-base"><?= $item['name'] ?></div>
                                        <div class="text-xs md:text-sm text-gray-500 mt-1">
                                            <span class="inline-flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                                <?= $item['quantity'] ?> x Rp <?= number_format($item['price'], 0, ',', '.') ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-semibold text-cyan-600 text-sm md:text-base">
                                        Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Price Summary -->
                        <div class="space-y-3 mb-6 pt-3 border-t">
                            <div class="flex justify-between text-sm md:text-base">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold text-gray-800">Rp <?= number_format($total, 0, ',', '.') ?></span>
                            </div>
                            <div class="flex justify-between items-center text-sm md:text-base">
                                <span class="text-gray-600">Ongkir</span>
                                <div class="flex items-center">
                                    <span class="line-through text-gray-400 text-sm mr-2">Rp 15.000</span>
                                    <span class="font-semibold text-green-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        GRATIS
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center pt-4 border-t-2 border-dashed">
                                <span class="text-base md:text-lg font-bold text-gray-800">Total Pembayaran</span>
                                <span class="text-xl md:text-2xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                                    Rp <?= number_format($total, 0, ',', '.') ?>
                                </span>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="bg-gradient-to-r from-cyan-50 to-blue-50 border-l-4 border-cyan-500 rounded-lg p-4 text-sm">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-cyan-600 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                <div>
                                    <div class="font-semibold text-cyan-900 mb-1">Tips Pengiriman:</div>
                                    <ul class="text-cyan-800 space-y-1 text-xs">
                                        <li>✓ Pastikan nomor telepon aktif & bisa dihubungi</li>
                                        <li>✓ Tulis alamat selengkap mungkin dengan patokan</li>
                                        <li>✓ Pesanan diproses dalam 1-2 jam kerja</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Trust Badges -->
                        <div class="mt-4 pt-4 border-t">
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <div class="p-2">
                                    <div class="bg-green-100 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-1">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-700">Aman</div>
                                </div>
                                <div class="p-2">
                                    <div class="bg-blue-100 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-1">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-700">Cepat</div>
                                </div>
                                <div class="p-2">
                                    <div class="bg-purple-100 rounded-full w-10 h-10 flex items-center justify-center mx-auto mb-1">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                        </svg>
                                    </div>
                                    <div class="text-xs font-semibold text-gray-700">Terpercaya</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <style>
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #06b6d4, #3b82f6);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #0891b2, #2563eb);
        }
    </style>
</body>

</html>