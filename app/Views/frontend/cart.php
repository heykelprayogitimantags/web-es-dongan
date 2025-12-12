<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Toko Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .ice-gradient {
            background: linear-gradient(135deg, #e0f7ff 0%, #b3e5fc 50%, #e1f5fe 100%);
        }

        .cart-item {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .cart-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .btn-primary {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
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

        .quantity-input {
            -moz-appearance: textfield;
        }

        .quantity-input::-webkit-outer-spin-button,
        .quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .badge-count {
            animation: pulse-scale 2s ease-in-out infinite;
        }

        @keyframes pulse-scale {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.15);
            }
        }

        .empty-cart-icon {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
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

        .product-image-container {
            position: relative;
            overflow: hidden;
        }

        .product-image-container::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 30%,
                rgba(255, 255, 255, 0.3) 50%,
                transparent 70%
            );
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% {
                left: -50%;
            }
            100% {
                left: 150%;
            }
        }

        .floating-action {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 via-cyan-50 to-purple-50 min-h-screen">

    <!-- Navbar -->
    <nav class="glass-effect sticky top-0 z-50 shadow-xl">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-between items-center py-4 lg:py-5">
                <a href="/" class="flex items-center space-x-2 lg:space-x-3 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur-md opacity-75 group-hover:opacity-100 transition"></div>
                        <div class="relative bg-white rounded-full p-1.5 lg:p-2 shadow-xl">
                            <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan Logo" class="w-8 h-8 lg:w-10 lg:h-10 object-contain">
                        </div>
                    </div>
                    <div>
                        <span class="text-lg lg:text-2xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">Toko Es Dongan</span>
                        <p class="text-[10px] lg:text-xs text-gray-500 hidden sm:block">Minumannya Kawan Awak</p>
                    </div>
                </a>
                <a href="/" class="flex items-center gap-1.5 lg:gap-2 text-cyan-600 hover:text-cyan-700 font-semibold px-3 lg:px-4 py-2 rounded-lg hover:bg-cyan-50 transition-all text-sm lg:text-base">
                    <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="hidden sm:inline">Kembali Belanja</span>
                    <span class="sm:hidden">Kembali</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 lg:px-8 py-6 lg:py-12">
        <!-- Header -->
        <div class="mb-6 lg:mb-8">
            <h1 class="text-3xl lg:text-5xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent mb-2">
                Keranjang Belanja
            </h1>
            <p class="text-sm lg:text-base text-gray-600">Kelola pesanan Anda dengan mudah</p>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-lg animate-slide-in" role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="font-medium text-sm lg:text-base"><?= session()->getFlashdata('success') ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (empty($cart)): ?>
            <div class="glass-effect rounded-2xl lg:rounded-3xl shadow-2xl p-8 lg:p-16 text-center">
                <div class="empty-cart-icon mb-6">
                    <svg class="w-24 h-24 lg:w-32 lg:h-32 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-700 mb-3">Keranjang Masih Kosong</h3>
                <p class="text-gray-500 mb-8 text-base lg:text-lg max-w-md mx-auto">Yuk mulai belanja dan nikmati kesegaran es pilihan terbaik!</p>
                <a href="/" class="btn-primary inline-block bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 lg:px-8 py-3 lg:py-4 rounded-xl font-semibold hover:from-cyan-600 hover:to-blue-700 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-sm lg:text-base">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Mulai Belanja Sekarang
                    </span>
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-4">
                    <?php foreach ($cart as $item): ?>
                        <div class="cart-item glass-effect rounded-xl lg:rounded-2xl shadow-lg overflow-hidden">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 lg:gap-6 p-4 lg:p-6">
                                <!-- Product Image -->
                                <div class="relative group self-center sm:self-auto">
                                    <div class="product-image-container w-20 h-20 lg:w-28 lg:h-28 ice-gradient rounded-xl lg:rounded-2xl flex items-center justify-center overflow-hidden shadow-md">
                                        <?php if ($item['image']): ?>
                                            <img src="/uploads/products/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        <?php else: ?>
                                            <svg class="w-12 h-12 lg:w-16 lg:h-16 text-cyan-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z" />
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Product Info & Controls -->
                                <div class="flex-1 w-full space-y-3 lg:space-y-0">
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                                        <!-- Product Details -->
                                        <div class="flex-1">
                                            <h3 class="text-lg lg:text-xl font-bold text-gray-800 mb-1 lg:mb-2"><?= $item['name'] ?></h3>
                                            <div class="flex items-center gap-2 flex-wrap">
                                                <span class="text-xs lg:text-sm text-gray-500 line-through">Rp <?= number_format($item['price'] * 1.2, 0, ',', '.') ?></span>
                                                <span class="text-xl lg:text-2xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                                                    Rp <?= number_format($item['price'], 0, ',', '.') ?>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Remove Button (Desktop) -->
                                        <a href="/cart/remove/<?= $item['id'] ?>"
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                            class="hidden sm:block text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition-all self-start">
                                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Quantity & Subtotal Row -->
                                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-3 border-t border-gray-100">
                                        <!-- Quantity Controls -->
                                        <form action="/cart/update" method="post" class="flex items-center gap-2 lg:gap-3">
                                            <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                            <div class="flex items-center bg-gray-100 rounded-lg lg:rounded-xl overflow-hidden flex-1 sm:flex-initial">
                                                <button type="button" onclick="this.nextElementSibling.stepDown()" class="px-3 lg:px-4 py-2 text-gray-600 hover:bg-gray-200 transition active:scale-95">
                                                    <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                    </svg>
                                                </button>
                                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1"
                                                    class="quantity-input w-12 lg:w-16 px-2 lg:px-3 py-2 text-center text-sm lg:text-base font-semibold bg-transparent border-0 focus:outline-none">
                                                <button type="button" onclick="this.previousElementSibling.stepUp()" class="px-3 lg:px-4 py-2 text-gray-600 hover:bg-gray-200 transition active:scale-95">
                                                    <svg class="w-3 h-3 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <button type="submit" class="bg-cyan-600 text-white px-4 lg:px-5 py-2 rounded-lg lg:rounded-xl hover:bg-cyan-700 font-medium shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 active:scale-95 text-sm lg:text-base">
                                                Update
                                            </button>
                                        </form>

                                        <!-- Subtotal -->
                                        <div class="flex justify-between items-center sm:ml-auto">
                                            <span class="text-xs lg:text-sm text-gray-500 sm:hidden">Subtotal:</span>
                                            <div class="text-right">
                                                <p class="text-xs lg:text-sm text-gray-500 mb-0.5 hidden sm:block">Subtotal</p>
                                                <p class="text-lg lg:text-2xl font-bold text-gray-800">
                                                    Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Remove Button (Mobile) -->
                                        <a href="/cart/remove/<?= $item['id'] ?>"
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                            class="sm:hidden flex items-center justify-center gap-2 text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition-all font-medium text-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Summary Sidebar -->
                <div class="lg:col-span-1">
                    <div class="glass-effect rounded-xl lg:rounded-2xl shadow-2xl p-5 lg:p-8 sticky top-24">
                        <div class="flex items-center gap-2 lg:gap-3 mb-5 lg:mb-6 pb-5 lg:pb-6 border-b border-gray-200">
                            <div class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-lg lg:rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-xl lg:text-2xl font-bold text-gray-800">Ringkasan Belanja</h3>
                        </div>

                        <div class="space-y-3 lg:space-y-4 mb-6 lg:mb-8">
                            <div class="flex justify-between items-center py-2 lg:py-3 border-b border-gray-100">
                                <span class="text-sm lg:text-base text-gray-600 font-medium">Subtotal</span>
                                <span class="text-sm lg:text-base font-bold text-gray-800">Rp <?= number_format($total, 0, ',', '.') ?></span>
                            </div>
                            <div class="flex justify-between items-center py-2 lg:py-3 border-b border-gray-100">
                                <span class="text-sm lg:text-base text-gray-600 font-medium">Ongkos Kirim</span>
                                <span class="text-sm lg:text-base font-bold text-green-600">GRATIS</span>
                            </div>
                            <div class="flex justify-between items-center py-2 lg:py-3 border-b border-gray-100">
                                <span class="text-sm lg:text-base text-gray-600 font-medium">Diskon</span>
                                <span class="text-sm lg:text-base font-bold text-red-600">- Rp 0</span>
                            </div>

                            <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl lg:rounded-2xl p-4 lg:p-5 mt-4 lg:mt-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-xs lg:text-sm text-gray-600 mb-1">Total Pembayaran</p>
                                        <p class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                                            Rp <?= number_format($total, 0, ',', '.') ?>
                                        </p>
                                    </div>
                                    <div class="badge-count w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg text-sm lg:text-base">
                                        <?= count($cart) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="/checkout" class="btn-primary block w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-center py-3 lg:py-4 rounded-xl font-bold text-base lg:text-lg hover:from-cyan-600 hover:to-blue-700 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all active:scale-95">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                Lanjut ke Pembayaran
                            </span>
                        </a>

                        <div class="mt-5 lg:mt-6 space-y-2 lg:space-y-3">
                            <div class="flex items-center gap-2 lg:gap-3 text-xs lg:text-sm text-gray-600">
                                <svg class="w-4 h-4 lg:w-5 lg:h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>Transaksi 100% Aman</span>
                            </div>
                            <div class="flex items-center gap-2 lg:gap-3 text-xs lg:text-sm text-gray-600">
                                <svg class="w-4 h-4 lg:w-5 lg:h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Pengiriman Cepat & Dingin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="relative overflow-hidden mt-12 lg:mt-20">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-900"></div>

        <div class="container mx-auto px-4 lg:px-8 py-8 lg:py-12 relative z-10 text-white">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 mb-8">
                <!-- Company Info -->
                <div class="sm:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan" class="w-10 h-10 lg:w-12 lg:h-12 rounded-full bg-white p-2">
                        <div>
                            <h3 class="text-xl lg:text-2xl font-bold">Es Dongan</h3>
                            <p class="text-xs lg:text-sm text-gray-300">Segar & Berkualitas</p>
                        </div>
                    </div>
                    <p class="text-sm lg:text-base text-gray-300 mb-4 leading-relaxed">
                        Menyediakan berbagai pilihan es segar berkualitas premium untuk keluarga Indonesia.
                        Dipercaya sejak 2020 dengan ribuan pelanggan puas.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-9 h-9 lg:w-10 lg:h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="w-9 h-9 lg:w-10 lg:h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="w-9 h-9 lg:w-10 lg:h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-base lg:text-lg font-bold mb-3 lg:mb-4">Menu Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-sm lg:text-base text-gray-300 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#products" class="text-sm lg:text-base text-gray-300 hover:text-white transition-colors">Produk</a></li>
                        <li><a href="#about" class="text-sm lg:text-base text-gray-300 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#contact" class="text-sm lg:text-base text-gray-300 hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-base lg:text-lg font-bold mb-3 lg:mb-4">Dukungan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm lg:text-base text-gray-300 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-sm lg:text-base text-gray-300 hover:text-white transition-colors">Cara Pemesanan</a></li>
                        <li><a href="#" class="text-sm lg:text-base text-gray-300 hover:text-white transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-sm lg:text-base text-gray-300 hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/20 pt-6 lg:pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-300 text-xs lg:text-sm text-center md:text-left">
                    &copy; 2025 Es Dongan. All Rights Reserved. Made with ❤️ By Heykel Prayogi Timanta G.s
                </p>
                <div class="flex items-center gap-3 lg:gap-4 flex-wrap justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png" alt="Visa" class="h-6 lg:h-8 opacity-70 hover:opacity-100 transition-opacity">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/200px-MasterCard_Logo.svg.png" alt="Mastercard" class="h-6 lg:h-8 opacity-70 hover:opacity-100 transition-opacity">
                    <div class="bg-white rounded-lg p-2 lg:p-2.5 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <img src="/uploads/Mandiri.png" alt="Mandiri" class="h-5 lg:h-6 opacity-70 hover:opacity-100 transition-opacity">
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>