<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Toko Es Dongan</title>
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

        .icon-container {
            display: flex;
            justify-content: center;
            /* Memusatkan secara horizontal */
            align-items: center;
            /* Memusatkan secara vertikal (opsional, tergantung kebutuhan) */
            width: 100%;
            /* Pastikan container mengambil lebar penuh */
            /* Anda juga bisa menambahkan padding atau margin jika perlu */
        }

        /* Success Animation */
        @keyframes scaleIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes checkmark {
            0% {
                stroke-dashoffset: 100;
            }

            100% {
                stroke-dashoffset: 0;
            }
        }

        .animate-scale-in {
            animation: scaleIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }

        .checkmark-circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            animation: checkmark 0.6s 0.3s ease-out forwards;
        }

        .checkmark-check {
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: checkmark 0.3s 0.6s ease-out forwards;
        }

        /* Confetti Animation */
        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #06b6d4;
            animation: confetti-fall 3s linear infinite;
        }

        /* Timeline */
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 19px;
            top: 40px;
            width: 2px;
            height: calc(100% - 40px);
            background: linear-gradient(to bottom, #06b6d4, #e5e7eb);
        }

        .timeline-item:last-child::before {
            display: none;
        }

        /* Pulse Animation */
        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }

            100% {
                transform: scale(1.2);
                opacity: 0;
            }
        }

        .pulse-ring {
            animation: pulse-ring 1.5s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-cyan-50 via-blue-50 to-purple-50 min-h-screen">

    <!-- Confetti Effect -->
    <div id="confetti-container" class="pointer-events-none"></div>

    <!-- Navigation -->
    <nav class="glass-effect sticky top-0 z-50 shadow-lg border-b border-white/20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-between items-center py-3 md:py-4">
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

                <div class="flex items-center space-x-2 md:space-x-4">
                    <a href="/" class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-4 py-2 md:px-6 md:py-2.5 rounded-xl hover:from-cyan-600 hover:to-blue-700 font-semibold shadow-lg hover:shadow-xl transition-all text-sm md:text-base">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8 md:py-16 max-w-4xl">
        <!-- Success Icon -->
        <div class="flex flex-col items-center justify-center text-center mb-10 animate-scale-in">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="120" height="120" class="mx-auto">
                <defs>
                    <linearGradient id="greenGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#4ade80;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#16a34a;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="50" cy="50" r="45" fill="url(#greenGrad)" />

                <g transform="translate(28, 28) scale(1.8)">
                    <svg class="text-white" fill="none" stroke="white" viewBox="0 0 24 24" width="24" height="24">
                        <circle cx="12" cy="12" r="10" stroke-width="2" fill="none" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                    </svg>
                </g>
            </svg>

            <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mt-6 mb-3">Pesanan Berhasil!</h1>
            <p class="text-base md:text-lg text-gray-600">Terima kasih telah berbelanja di Es Dongan</p>
        </div>

        <!-- Order Details Card -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-6 animate-slide-up border border-gray-100">
            <!-- Order Info Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 pb-6 border-b">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-cyan-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-800">Detail Pesanan</h2>
                    </div>
                    <p class="text-sm text-gray-600">Nomor Pesanan: <span class="font-semibold text-cyan-600">#ORD-<?= date('Ymd') ?>-<?= rand(1000, 9999) ?></span></p>
                </div>
                <div class="text-left md:text-right">
                    <p class="text-sm text-gray-600">Tanggal Pesanan</p>
                    <p class="font-semibold text-gray-800"><?= date('d F Y, H:i') ?> WIB</p>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 pb-6 border-b">
                <div>
                    <h3 class="font-semibold text-gray-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Informasi Pembeli
                    </h3>
                    <div class="space-y-2 text-sm">
                        <p class="text-gray-600">Nama: <span class="font-medium text-gray-800"><?= session()->get('name') ?></span></p>
                        <p class="text-gray-600">Email: <span class="font-medium text-gray-800"><?= session()->get('email') ?></span></p>
                        <p class="text-gray-600">Telepon: <span class="font-medium text-gray-800"><?= $order['phone'] ?? '081234567890' ?></span></p>
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Alamat Pengiriman
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed"><?= $order['shipping_address'] ?? 'Jl. Contoh No. 123, Medan, Sumatera Utara' ?></p>
                </div>
            </div>

            <div class="space-y-3">
                <?php foreach ($items as $item): ?>
                    <?php
                    // Hitung subtotal
                    $itemTotal = $item['price'] * $item['quantity'];
                    ?>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex-1">
                            <p class="font-medium text-gray-800"><?= esc($item['product_name']) ?></p>
                            <p class="text-sm text-gray-600">
                                <?= $item['quantity'] ?> x Rp <?= number_format($item['price'], 0, ',', '.') ?>
                            </p>
                        </div>
                        <p class="font-semibold text-cyan-600">
                            Rp <?= number_format($itemTotal, 0, ',', '.') ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl p-4 md:p-6 mt-6">
                <div class="space-y-3">
                    <div class="flex justify-between text-sm md:text-base">
                        <span class="text-gray-700">Subtotal</span>
                        <span class="font-semibold text-gray-800">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></span>
                    </div>

                    <div class="border-t-2 border-dashed border-gray-300 pt-3 flex justify-between items-center">
                        <span class="text-base md:text-lg font-bold text-gray-800">Total Pembayaran</span>
                        <span class="text-xl md:text-2xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                            Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
                        </span>
                    </div>

                    <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                        <span class="text-sm text-gray-600">Metode Pembayaran</span>
                        <span class="bg-white px-3 py-1.5 rounded-lg font-semibold text-sm text-gray-800 shadow-sm uppercase">
                            <?= esc($order['payment_method']) ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Order Timeline -->


            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-6 animate-slide-up" style="animation-delay: 0.3s;">
                <!-- WhatsApp Card -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 border border-green-200">
                    <div class="flex items-start">
                        <div class="bg-green-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-800 mb-2">Butuh Bantuan?</h4>
                            <p class="text-sm text-gray-700 mb-3">Hubungi kami via WhatsApp untuk update pesanan</p>
                            <a href="https://wa.me/6287822274814?text=Halo,%20saya%20ingin%20menanyakan%20pesanan%20saya" target="_blank"
                                class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold text-sm transition-all shadow-md hover:shadow-lg">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                </svg>
                                Chat Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Email Notification Card -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200">
                    <div class="flex items-start">
                        <div class="bg-blue-500 rounded-full p-3 mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-800 mb-2">Konfirmasi Email</h4>
                            <p class="text-sm text-gray-700 mb-2">Detail pesanan telah dikirim ke:</p>
                            <p class="font-semibold text-blue-600 text-sm"><?= session()->get('email') ?></p>
                            <p class="text-xs text-gray-600 mt-2">*Periksa folder spam jika tidak menemukan email</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 animate-slide-up" style="animation-delay: 0.4s;">
                <a href="/" class="flex-1 bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-4 rounded-xl font-semibold hover:from-cyan-600 hover:to-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Kembali ke Beranda
                </a>
                <a href="/products" class="flex-1 bg-white border-2 border-cyan-500 text-cyan-600 py-4 rounded-xl font-semibold hover:bg-cyan-50 transition-all shadow-lg hover:shadow-xl flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Belanja Lagi
                </a>
                <button onclick="window.print()" class="sm:w-auto px-6 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-semibold transition-all shadow-lg hover:shadow-xl flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span class="hidden sm:inline">Cetak</span>
                </button>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 bg-white rounded-xl p-6 shadow-lg border border-gray-100 animate-slide-up" style="animation-delay: 0.5s;">
                <h4 class="font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Informasi Penting
                </h4>
                <ul class="space-y-3 text-sm text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span><strong>Waktu Pengiriman:</strong> Pesanan akan diproses dalam 1-2 jam kerja dan dikirim pada hari yang sama</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span><strong>Pembayaran COD:</strong> Siapkan uang pas saat kurir tiba. Pembayaran dilakukan langsung ke kurir</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span><strong>Pastikan No. HP Aktif:</strong> Kurir akan menghubungi Anda sebelum pengiriman untuk memastikan keberadaan</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span><strong>Garansi Kesegaran:</strong> Kami menjamin produk es dalam kondisi segar dan berkualitas saat diterima</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Print Styles -->
        <style>
            @media print {

                nav,
                .confetti,
                button,
                a[href*="wa.me"],
                footer {
                    display: none !important;
                }

                body {
                    background: white !important;
                }

                .bg-gradient-to-br,
                .bg-gradient-to-r {
                    background: white !important;
                    -webkit-print-color-adjust: exact;
                }
            }
        </style>

        <!-- Confetti Script -->
        <script>
            // Create confetti effect
            function createConfetti() {
                const container = document.getElementById('confetti-container');
                const colors = ['#06b6d4', '#3b82f6', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6'];

                for (let i = 0; i < 50; i++) {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + '%';
                    confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.animationDelay = Math.random() * 3 + 's';
                    confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                    container.appendChild(confetti);

                    // Remove after animation
                    setTimeout(() => confetti.remove(), 6000);
                }
            }

            // Trigger confetti on load
            window.addEventListener('load', () => {
                createConfetti();
                // Add another burst after 2 seconds
                setTimeout(createConfetti, 2000);
            });

            // Smooth scroll behavior
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

</body>

</html>