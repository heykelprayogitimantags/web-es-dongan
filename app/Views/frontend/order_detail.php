<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Detail Pesanan' ?> - Es Dongan</title>
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

        /* Animasi halus untuk kartu */
        .order-card { transition: all 0.3s ease; }
        .order-card:hover { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1); }
        
        /* Animasi Status */
        .status-pulse { animation: pulse 2s ease-in-out infinite; }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* Animasi Fade Down untuk Menu Mobile */
        .fade-in-down { animation: fadeInDown 0.3s ease-out forwards; }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50 min-h-screen flex flex-col font-sans text-slate-800">

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
                    <a href="/" class="text-gray-700 hover:text-cyan-600 font-semibold transition-colors duration-200">Beranda</a>
                    <a href="/products" class="text-gray-700 hover:text-cyan-600 font-semibold transition-colors duration-200">Produk</a>
                    <a href="/orders" class="text-cyan-600 font-bold transition-colors duration-200">Pesanan Saya</a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <?php if (session()->get('logged_in')): ?>
                        <div class="flex items-center space-x-3">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-700">Hi, <?= session()->get('name') ?>!</p>
                            </div>
                            <a href="/logout" class="bg-gradient-to-r from-red-500 to-pink-600 text-white px-5 py-2.5 rounded-xl hover:from-red-600 hover:to-pink-700 font-semibold shadow-lg transition-all duration-200">Logout</a>
                        </div>
                    <?php else: ?>
                        <a href="/login" class="bg-cyan-600 text-white px-6 py-2 rounded-xl font-bold">Login</a>
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
                    <a href="/logout" class="block px-4 py-3 text-red-500 hover:bg-red-50 rounded-xl font-semibold transition">🚪 Logout</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="flex-grow container mx-auto px-4 py-8 lg:py-12">
        <div class="max-w-5xl mx-auto">
            
            <div class="mb-8">
                <a href="/orders" class="inline-flex items-center text-gray-500 hover:text-cyan-600 font-semibold mb-4 transition-colors group">
                    <div class="w-8 h-8 rounded-full bg-white shadow-sm flex items-center justify-center mr-2 group-hover:bg-cyan-50 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </div>
                    Kembali ke Pesanan Saya
                </a>
                <h1 class="text-3xl lg:text-4xl font-bold gradient-text">Detail Pesanan</h1>
            </div>

            <div class="order-card bg-white rounded-2xl shadow-xl overflow-hidden mb-8 border border-gray-100">
                <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-6 sm:p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
                    
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between relative z-10 gap-4">
                        <div>
                            <p class="text-cyan-100 text-xs font-bold tracking-wider uppercase mb-1">Nomor Invoice</p>
                            <h2 class="text-2xl lg:text-4xl font-extrabold tracking-tight">#<?= $order['order_number'] ?></h2>
                            <div class="flex items-center mt-2 text-cyan-50 text-sm font-medium">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <?= date('d F Y, H:i', strtotime($order['created_at'])) ?> WIB
                            </div>
                        </div>
                        
                        <div>
                            <span class="status-pulse inline-flex items-center px-6 py-2 rounded-full text-sm sm:text-base font-bold shadow-lg backdrop-blur-md border
                                <?php if($order['status'] === 'pending'): ?>
                                    bg-yellow-400/90 text-yellow-900 border-yellow-200
                                <?php elseif($order['status'] === 'processing'): ?>
                                    bg-blue-300/90 text-blue-900 border-blue-200
                                <?php elseif($order['status'] === 'completed'): ?>
                                    bg-green-400/90 text-green-900 border-green-200
                                <?php else: ?>
                                    bg-red-400/90 text-red-900 border-red-200
                                <?php endif; ?>">
                                
                                <span class="mr-2 text-lg">
                                    <?= match($order['status']) {
                                        'pending' => '⏳',
                                        'processing' => '📦',
                                        'completed' => '✅',
                                        'cancelled' => '❌',
                                        default => '📄'
                                    } ?>
                                </span>
                                <?= match($order['status']) {
                                    'pending' => 'Menunggu Konfirmasi',
                                    'processing' => 'Sedang Diproses',
                                    'completed' => 'Pesanan Selesai',
                                    'cancelled' => 'Dibatalkan',
                                    default => ucfirst($order['status'])
                                } ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-gradient-to-br from-gray-50 to-blue-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-start gap-4">
                            <div class="bg-purple-100 rounded-lg p-3 text-purple-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Alamat Pengiriman</h3>
                                <p class="text-gray-800 font-medium leading-relaxed"><?= nl2br($order['shipping_address']) ?></p>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-start gap-4">
                            <div class="bg-emerald-100 rounded-lg p-3 text-emerald-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Kontak Penerima</h3>
                                <p class="text-gray-800 font-bold text-lg"><?= $order['phone'] ?></p>
                                <?php if(!empty($order['notes'])): ?>
                                    <div class="mt-2 text-sm text-gray-500 bg-gray-50 p-2 rounded border border-gray-100 italic">
                                        "<?= $order['notes'] ?>"
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    <div class="order-card bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            <h2 class="font-bold text-gray-800">Item Pesanan</h2>
                        </div>
                        
                        <div class="divide-y divide-gray-100">
                            <?php foreach($order_items as $item): ?>
                            <div class="p-4 sm:p-6 hover:bg-cyan-50/30 transition-colors flex flex-col sm:flex-row items-center sm:items-start gap-4 text-center sm:text-left">
                                <div class="w-20 h-20 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-10 h-10 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-gray-900"><?= $item['product_name'] ?></h3>
                                    <div class="mt-1 text-sm text-gray-500">
                                        Harga Satuan: Rp <?= number_format($item['price'], 0, ',', '.') ?>
                                    </div>
                                </div>
                                
                                <div class="text-right flex flex-col items-center sm:items-end">
                                    <span class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full mb-1">x<?= $item['quantity'] ?></span>
                                    <span class="font-bold text-lg text-cyan-700">Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="order-card bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-24">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            <h2 class="font-bold text-gray-800">Rincian Pembayaran</h2>
                        </div>
                        
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span class="font-semibold">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Ongkos Kirim</span>
                                <span class="font-bold text-green-600">GRATIS</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Metode Bayar</span>
                                <span class="font-semibold text-gray-800">COD</span>
                            </div>
                            
                            <div class="border-t-2 border-dashed border-gray-200 pt-4 mt-2">
                                <div class="flex justify-between items-end">
                                    <span class="font-bold text-gray-800">Total Bayar</span>
                                    <span class="text-2xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                                        Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
                                    </span>
                                </div>
                            </div>

                            <?php if($order['status'] === 'pending'): ?>
                            <button class="w-full mt-4 bg-gradient-to-r from-yellow-400 to-yellow-500 text-yellow-900 font-bold py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-transform">
                                Hubungi Admin (WhatsApp)
                            </button>
                            <?php endif; ?>
                            
                            <a href="/products" class="block text-center w-full mt-2 bg-gray-100 text-gray-600 font-semibold py-3 rounded-xl hover:bg-gray-200 transition">
                                Belanja Lagi
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
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
                    <p class="text-gray-300 mb-4 leading-relaxed">Menyediakan berbagai pilihan es segar berkualitas premium untuk keluarga Indonesia.</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4 border-b border-cyan-500/50 inline-block pb-1">Menu Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-300 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="/products" class="text-gray-300 hover:text-white transition-colors">Produk</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4 border-b border-cyan-500/50 inline-block pb-1">Hubungi Kami</h4>
                    <p class="text-gray-300 text-sm">Butuh bantuan? Tim kami siap melayani Anda.</p>
                </div>
            </div>
            <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center text-center md:text-left">
                <p class="text-gray-400 text-sm">&copy; 2025 Es Dongan. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        if(btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                if(!menu.classList.contains('hidden')) {
                    menu.classList.add('fade-in-down');
                } else {
                    menu.classList.remove('fade-in-down');
                }
            });
        }
    </script>
</body>
</html>