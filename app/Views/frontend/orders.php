<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Pesanan Saya' ?> - Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
        }

        .order-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .order-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(6, 182, 212, 0.2);
        }

        .status-pulse {
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .fade-in-down {
            animation: fadeInDown 0.3s ease-out forwards;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-dropdown {
            display: none;
        }

        .profile-dropdown.show {
            display: block;
            animation: fadeInDown 0.2s ease-out;
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50 min-h-screen flex flex-col">

    <nav class="glass-effect sticky top-0 z-50 shadow-xl border-b border-white/20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur-lg opacity-75 group-hover:opacity-100 transition-all duration-300"></div>
                        <div class="relative bg-white rounded-full p-2 shadow-xl">
                            <img src="/uploads/Logo Es Dongan.png" onerror="this.src='https://via.placeholder.com/40'" alt="Es Dongan Logo" class="w-10 h-10 object-contain">
                        </div>
                    </div>
                    <div>
                        <span class="text-2xl font-extrabold gradient-text block">Es Dongan</span>
                        <span class="text-xs text-gray-500 font-medium hidden sm:block">Minumannya Kawan Awak</span>
                    </div>
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-cyan-600 font-semibold transition-colors duration-200 relative group">
                        Beranda
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="/products" class="text-gray-700 hover:text-cyan-600 font-semibold transition-colors duration-200 relative group">
                        Produk
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="/orders" class="text-cyan-600 font-bold transition-colors duration-200 relative group">
                        Pesanan Saya
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-cyan-500 to-blue-500 transition-all duration-300"></span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <?php if (session()->get('logged_in')): ?>
                        <div class="relative">
                            <button id="profile-btn" class="flex items-center space-x-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white px-4 py-2.5 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 group">
                                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-cyan-600 font-bold text-sm shadow-inner">
                                    <?= strtoupper(substr(session()->get('name'), 0, 1)) ?>
                                </div>
                                <span class="font-semibold"><?= session()->get('name') ?></span>
                                <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div id="profile-dropdown" class="profile-dropdown absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">
                                <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-4 text-white">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-cyan-600 font-bold text-lg shadow-lg">
                                            <?= strtoupper(substr(session()->get('name'), 0, 1)) ?>
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm"><?= session()->get('name') ?></p>
                                            <p class="text-xs text-cyan-100"><?= session()->get('email') ?? 'Member' ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">
                                    <a href="/orders" class="flex items-center space-x-3 px-4 py-3 hover:bg-cyan-50 rounded-xl transition-colors group">
                                        <svg class="w-5 h-5 text-gray-600 group-hover:text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span class="text-gray-700 font-medium">Pesanan Saya</span>
                                    </a>
                                    <a href="/profile" class="flex items-center space-x-3 px-4 py-3 hover:bg-cyan-50 rounded-xl transition-colors group">
                                        <svg class="w-5 h-5 text-gray-600 group-hover:text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="text-gray-700 font-medium">Profil Saya</span>
                                    </a>
                                    <div class="border-t border-gray-100 my-2"></div>
                                    <a href="/logout" class="flex items-center space-x-3 px-4 py-3 hover:bg-red-50 rounded-xl transition-colors group">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span class="text-red-600 font-medium">Keluar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="/login" class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 py-2.5 rounded-xl hover:from-cyan-600 hover:to-blue-700 font-semibold shadow-lg hover:shadow-xl transition-all duration-200">
                            Login
                        </a>
                    <?php endif; ?>
                </div>

                <button id="mobile-menu-btn" class="md:hidden text-gray-600 hover:text-cyan-600 focus:outline-none p-2 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-gray-100 fade-in-down">
                <div class="flex flex-col space-y-3 mt-4 px-2">
                    <a href="/" class="block px-4 py-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-xl font-semibold transition">🏠 Beranda</a>
                    <a href="/products" class="block px-4 py-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-xl font-semibold transition">🥤 Produk</a>
                    <a href="/orders" class="block px-4 py-3 bg-cyan-50 text-cyan-700 rounded-xl font-bold transition">📦 Pesanan Saya</a>

                    <div class="border-t border-gray-200 my-2"></div>

                    <?php if (session()->get('logged_in')): ?>
                        <div class="px-4 py-3 bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                    <?= strtoupper(substr(session()->get('name'), 0, 1)) ?>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Login sebagai:</p>
                                    <p class="font-bold text-gray-800"><?= session()->get('name') ?></p>
                                </div>
                            </div>
                        </div>
                        <a href="/profile" class="block px-4 py-3 text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-xl font-semibold transition">👤 Profil Saya</a>
                        <a href="/logout" class="block px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl font-semibold transition">🚪 Logout</a>
                    <?php else: ?>
                        <a href="/login" class="block w-full text-center bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 py-3 rounded-xl font-bold shadow-md">Login Sekarang</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex-grow container mx-auto px-4 py-8 lg:py-12">
        <!-- Breadcrumb & Back Button -->
        <div class="max-w-7xl mx-auto mb-6">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <a href="/" class="group flex items-center space-x-2 text-gray-600 hover:text-cyan-600 transition-colors">
                    <div class="bg-white group-hover:bg-cyan-50 rounded-xl p-2.5 shadow-md group-hover:shadow-lg transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Kembali ke Beranda</span>
                </a>

                <div class="flex items-center space-x-2 text-sm">
                    <a href="/" class="text-gray-500 hover:text-cyan-600 transition-colors">Beranda</a>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-cyan-600 font-semibold">Pesanan Saya</span>
                </div>
            </div>
        </div>

        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-block mb-4">
                <div class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 py-2 rounded-full text-sm font-semibold shadow-lg shimmer">
                    Riwayat Transaksi
                </div>
            </div>
            <h1 class="text-4xl lg:text-5xl font-bold gradient-text mb-4">Pesanan Saya</h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Pantau status pesanan dan riwayat pembelian Anda dengan mudah</p>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="max-w-4xl mx-auto mb-8">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl p-5 flex items-center shadow-lg">
                    <div class="bg-green-500 rounded-full p-2 mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-green-700 font-semibold text-lg"><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if (empty($orders)): ?>
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-3xl shadow-2xl p-12 text-center border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-full -mr-32 -mt-32 opacity-20"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-tr from-blue-100 to-cyan-100 rounded-full -ml-24 -mb-24 opacity-20"></div>

                    <div class="relative z-10">
                        <div class="floating mb-6">
                            <div class="w-32 h-32 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-full flex items-center justify-center mx-auto shadow-inner">
                                <svg class="w-16 h-16 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-3">Belum Ada Pesanan</h3>
                        <p class="text-gray-600 mb-8 text-lg leading-relaxed">Yuk mulai belanja dan nikmati berbagai produk es segar kami!</p>
                        <a href="/products" class="inline-flex items-center bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-8 py-4 rounded-xl hover:from-cyan-600 hover:to-blue-700 font-bold shadow-xl hover:shadow-2xl transition-all duration-200 text-lg group">
                            <svg class="w-6 h-6 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Mulai Belanja Sekarang
                        </a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Order Stats -->
            <div class="max-w-7xl mx-auto mb-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium mb-1">Total Pesanan</p>
                                <p class="text-3xl font-bold text-gray-800"><?= count($orders) ?></p>
                            </div>
                            <div class="bg-gradient-to-br from-cyan-100 to-cyan-200 rounded-xl p-3">
                                <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium mb-1">Pending</p>
                                <p class="text-3xl font-bold text-yellow-600">
                                    <?= count(array_filter($orders, fn($o) => $o['status'] === 'pending')) ?>
                                </p>
                            </div>
                            <div class="bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-xl p-3">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium mb-1">Proses</p>
                                <p class="text-3xl font-bold text-blue-600">
                                    <?= count(array_filter($orders, fn($o) => $o['status'] === 'processing')) ?>
                                </p>
                            </div>
                            <div class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl p-3">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium mb-1">Selesai</p>
                                <p class="text-3xl font-bold text-green-600">
                                    <?= count(array_filter($orders, fn($o) => $o['status'] === 'completed')) ?>
                                </p>
                            </div>
                            <div class="bg-gradient-to-br from-green-100 to-green-200 rounded-xl p-3">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-7xl mx-auto">
                <?php foreach ($orders as $order): ?>
                    <div class="order-card bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-6 text-white relative overflow-hidden">
                            <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmYiLz48L3N2Zz4=')]"></div>

                            <div class="relative z-10">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <p class="text-cyan-100 text-xs font-bold tracking-wider mb-1">ORDER ID</p>
                                        <h3 class="text-2xl font-extrabold tracking-tight">#<?= $order['order_number'] ?></h3>
                                    </div>
                                    <div class="text-right">
                                        <span class="status-pulse inline-block px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide shadow-md backdrop-blur-sm
                                        <?php if ($order['status'] === 'pending'): ?>
                                            bg-yellow-400/90 text-yellow-900 border border-yellow-200
                                        <?php elseif ($order['status'] === 'processing'): ?>
                                            bg-blue-300/90 text-blue-900 border border-blue-200
                                        <?php elseif ($order['status'] === 'completed'): ?>
                                            bg-green-400/90 text-green-900 border border-green-200
                                        <?php else: ?>
                                            bg-red-400/90 text-red-900 border border-red-200
                                        <?php endif; ?>">
                                            <?php
                                            $statusText = [
                                                'pending' => '⏳ Pending',
                                                'processing' => '📦 Proses',
                                                'completed' => '✅ Selesai',
                                                'cancelled' => '❌ Batal'
                                            ];
                                            echo $statusText[$order['status']] ?? ucfirst($order['status']);
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center text-cyan-50 text-sm font-medium">
                                    <svg class="w-4 h-4 mr-1.5 opacity-80" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    <?= date('d M Y, H:i', strtotime($order['created_at'])) ?> WIB
                                </div>
                            </div>
                        </div>

                        <div class="p-6 space-y-5">
                            <div class="bg-gradient-to-br from-cyan-50 via-white to-blue-50 rounded-xl p-5 border border-cyan-100 shadow-inner">
                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Total Pembayaran
                                </p>
                                <p class="text-3xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-700 bg-clip-text text-transparent">
                                    Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
                                </p>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-start group">
                                    <div class="bg-purple-50 group-hover:bg-purple-100 rounded-xl p-2.5 mr-4 transition-colors">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Alamat Pengiriman</p>
                                        <p class="text-sm text-gray-700 font-medium leading-relaxed"><?= $order['shipping_address'] ?></p>
                                    </div>
                                </div>

                                <div class="flex items-start group">
                                    <div class="bg-emerald-50 group-hover:bg-emerald-100 rounded-xl p-2.5 mr-4 transition-colors">
                                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Kontak</p>
                                        <p class="text-sm text-gray-700 font-medium"><?= $order['phone'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-gradient-to-r from-gray-50 to-cyan-50 border-t border-gray-100">
                            <a href="/orders/detail/<?= $order['id'] ?>" class="block w-full group relative overflow-hidden bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-center px-6 py-3.5 rounded-xl font-bold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                                <span class="relative z-10 flex items-center justify-center">
                                    Lihat Detail Pesanan
                                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity"></div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <footer class="glass-dark text-white py-12 relative overflow-hidden mt-auto">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-900 opacity-90"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="/uploads/Logo Es Dongan.png" onerror="this.src='https://via.placeholder.com/40'" alt="Es Dongan" class="w-12 h-12 rounded-full bg-white p-2">
                        <div>
                            <h3 class="text-2xl font-bold">Es Dongan</h3>
                            <p class="text-sm text-gray-300">Segar & Berkualitas</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4 leading-relaxed">
                        Menyediakan berbagai pilihan es segar berkualitas premium untuk keluarga Indonesia.
                        Dipercaya sejak 2020 dengan ribuan pelanggan puas.
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-4 border-b border-cyan-500/50 inline-block pb-1">Menu Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-300 hover:text-cyan-400 transition-colors">Beranda</a></li>
                        <li><a href="/products" class="text-gray-300 hover:text-cyan-400 transition-colors">Produk</a></li>
                        <li><a href="#about" class="text-gray-300 hover:text-cyan-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-cyan-400 transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-4 border-b border-cyan-500/50 inline-block pb-1">Dukungan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-cyan-400 transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-cyan-400 transition-colors">Cara Pemesanan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-cyan-400 transition-colors">Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center text-center md:text-left">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    &copy; 2025 Es Dongan. All Rights Reserved.
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

    <script>
        // Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                if (!menu.classList.contains('hidden')) {
                    menu.classList.add('fade-in-down');
                } else {
                    menu.classList.remove('fade-in-down');
                }
            });
        }

        // Profile Dropdown Toggle
        const profileBtn = document.getElementById('profile-btn');
        const profileDropdown = document.getElementById('profile-dropdown');

        if (profileBtn && profileDropdown) {
            profileBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profileDropdown.classList.toggle('show');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                    profileDropdown.classList.remove('show');
                }
            });
        }
    </script>
</body>

</html>