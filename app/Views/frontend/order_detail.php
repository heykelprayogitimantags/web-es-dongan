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

        .order-card { 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        
        .order-card:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 20px 40px rgba(6, 182, 212, 0.15); 
        }
        
        .status-pulse { 
            animation: pulse 2s ease-in-out infinite; 
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .fade-in-down { 
            animation: fadeInDown 0.3s ease-out forwards; 
        }
        
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .profile-dropdown {
            display: none;
        }

        .profile-dropdown.show {
            display: block;
            animation: fadeInDown 0.2s ease-out;
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .item-card {
            transition: all 0.3s ease;
        }

        .item-card:hover {
            transform: translateX(4px);
            background-color: rgba(6, 182, 212, 0.05);
        }

        .progress-step {
            position: relative;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 50%;
            width: 2px;
            height: calc(100% - 40px);
            background: linear-gradient(to bottom, #06b6d4, #3b82f6);
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
        <div class="max-w-6xl mx-auto">
            
            <!-- Breadcrumb & Back Button -->
            <div class="mb-8">
                <div class="flex items-center justify-between flex-wrap gap-4 mb-4">
                    <a href="/orders" class="group flex items-center space-x-2 text-gray-600 hover:text-cyan-600 transition-colors">
                        <div class="bg-white group-hover:bg-cyan-50 rounded-xl p-2.5 shadow-md group-hover:shadow-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Kembali ke Pesanan Saya</span>
                    </a>

                    <div class="flex items-center space-x-2 text-sm">
                        <a href="/" class="text-gray-500 hover:text-cyan-600 transition-colors">Beranda</a>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <a href="/orders" class="text-gray-500 hover:text-cyan-600 transition-colors">Pesanan</a>
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-cyan-600 font-semibold">Detail</span>
                    </div>
                </div>
                
                <div class="inline-block mb-4">
                    <div class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-6 py-2 rounded-full text-sm font-semibold shadow-lg shimmer">
                        📋 Invoice & Detail
                    </div>
                </div>
                <h1 class="text-3xl lg:text-4xl font-bold gradient-text">Detail Pesanan</h1>
            </div>

            <!-- Order Header Card -->
            <div class="order-card bg-white rounded-2xl shadow-xl overflow-hidden mb-8 border border-gray-100">
                <div class="bg-gradient-to-r from-cyan-500 to-blue-600 p-6 sm:p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
                    <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                    
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between relative z-10 gap-4">
                        <div>
                            <p class="text-cyan-100 text-xs font-bold tracking-wider uppercase mb-1">Nomor Invoice</p>
                            <h2 class="text-3xl lg:text-4xl font-extrabold tracking-tight mb-2">#<?= $order['order_number'] ?></h2>
                            <div class="flex items-center mt-2 text-cyan-50 text-sm font-medium">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <?= date('d F Y, H:i', strtotime($order['created_at'])) ?> WIB
                            </div>
                        </div>
                        
                        <div>
                            <span class="status-pulse inline-flex items-center px-6 py-3 rounded-full text-sm sm:text-base font-bold shadow-lg backdrop-blur-md border
                                <?php if($order['status'] === 'pending'): ?>
                                    bg-yellow-400/90 text-yellow-900 border-yellow-200
                                <?php elseif($order['status'] === 'processing'): ?>
                                    bg-blue-300/90 text-blue-900 border-blue-200
                                <?php elseif($order['status'] === 'completed'): ?>
                                    bg-green-400/90 text-green-900 border-green-200
                                <?php else: ?>
                                    bg-red-400/90 text-red-900 border-red-200
                                <?php endif; ?>">
                                
                                <span class="mr-2 text-xl">
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

                <!-- Shipping Info -->
                <div class="p-6 bg-gradient-to-br from-gray-50 to-blue-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-start gap-4 hover:shadow-md transition-shadow">
                            <div class="bg-purple-100 rounded-xl p-3 text-purple-600 shrink-0">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 flex items-center">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                    Alamat Pengiriman
                                </h3>
                                <p class="text-gray-800 font-medium leading-relaxed"><?= nl2br($order['shipping_address']) ?></p>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex items-start gap-4 hover:shadow-md transition-shadow">
                            <div class="bg-emerald-100 rounded-xl p-3 text-emerald-600 shrink-0">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 flex items-center">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></span>
                                    Kontak Penerima
                                </h3>
                                <p class="text-gray-800 font-bold text-lg mb-2"><?= $order['phone'] ?></p>
                                <?php if(!empty($order['notes'])): ?>
                                    <div class="mt-3 text-sm text-gray-600 bg-amber-50 p-3 rounded-lg border border-amber-100">
                                        <div class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-amber-600 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                            </svg>
                                            <div>
                                                <p class="font-semibold text-amber-800 text-xs mb-1">Catatan:</p>
                                                <p class="italic text-gray-700">"<?= $order['notes'] ?>"</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Order Items -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="order-card bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-cyan-50 flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 mr-3 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                <h2 class="font-bold text-gray-800 text-lg">Item Pesanan</h2>
                            </div>
                            <span class="bg-cyan-100 text-cyan-700 text-xs font-bold px-3 py-1 rounded-full">
                                <?= count($order_items) ?> Item
                            </span>
                        </div>
                        
                        <div class="divide-y divide-gray-100">
                            <?php foreach($order_items as $index => $item): ?>
                            <div class="item-card p-5 sm:p-6 flex flex-col sm:flex-row items-center sm:items-start gap-4">
                                <div class="relative">
                                    <div class="w-20 h-20 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-xl flex items-center justify-center shrink-0 shadow-md">
                                        <svg class="w-10 h-10 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute -top-2 -right-2 bg-cyan-600 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center shadow-lg">
                                        <?= $index + 1 ?>
                                    </div>
                                </div>
                                
                                <div class="flex-1 text-center sm:text-left">
                                    <h3 class="font-bold text-lg text-gray-900 mb-1"><?= $item['product_name'] ?></h3>
                                    <div class="flex items-center justify-center sm:justify-start gap-2 text-sm text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                        Harga Satuan: <span class="font-semibold text-gray-700">Rp <?= number_format($item['price'], 0, ',', '.') ?></span>
                                    </div>
                                </div>
                                
                                <div class="flex flex-col items-center sm:items-end gap-2">
                                    <span class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 text-sm font-bold px-4 py-1.5 rounded-full shadow-sm">
                                        x<?= $item['quantity'] ?>
                                    </span>
                                    <span class="font-extrabold text-xl text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600">
                                        Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
                                    </span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="lg:col-span-1">
                    <div class="order-card bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-24">
                        <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-blue-50 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <h2 class="font-bold text-gray-800 text-lg">Rincian Pembayaran</h2>
                        </div>
                        
                        <div class="p-6 space-y-5">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center text-gray-600">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                        </svg>
                                        Subtotal
                                    </span>
                                    <span class="font-semibold text-gray-800">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></span>
                                </div>
                                
                                <div class="flex justify-between items-center text-gray-600">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                                        </svg>
                                        Ongkos Kirim
                                    </span>
                                    <span class="font-bold text-green-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        GRATIS
                                    </span>
                                </div>
                                
                                <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                                    <div class="flex justify-between items-center text-gray-600 mb-2">
                                        <span class="flex items-center text-sm font-medium">
                                            <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                            </svg>
                                            Metode Pembayaran
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="inline-flex items-center bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1.5 rounded-full border border-amber-200">
                                            💵 COD (Cash on Delivery)
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border-t-2 border-dashed border-gray-200 pt-5">
                                <div class="flex justify-between items-end mb-2">
                                    <span class="font-bold text-gray-700 text-lg">Total Bayar</span>
                                    <div class="text-right">
                                        <p class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600">
                                            Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
                                        </p>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 text-right">Sudah termasuk semua biaya</p>
                            </div>

                            <?php if($order['status'] === 'pending'): ?>
                            <div class="pt-4 border-t border-gray-100 space-y-3">
                                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konfirmasi%20pesanan%20%23<?= $order['order_number'] ?>" target="_blank" class="flex items-center justify-center w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-3.5 rounded-xl shadow-lg hover:shadow-xl hover:from-green-600 hover:to-green-700 transition-all group">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                    Hubungi via WhatsApp
                                </a>
                            </div>
                            <?php endif; ?>
                            
                            <div class="space-y-2">
                                <a href="/products" class="block text-center w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold py-3 rounded-xl hover:from-cyan-600 hover:to-blue-700 shadow-md hover:shadow-lg transition-all">
                                    🛒 Belanja Lagi
                                </a>
                                <button onclick="window.print()" class="block text-center w-full bg-gray-100 text-gray-700 font-semibold py-3 rounded-xl hover:bg-gray-200 transition-colors">
                                    🖨️ Cetak Invoice
                                </button>
                            </div>
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
                    <div class="bg-white/10 rounded-lg px-3 py-1 text-xs text-gray-300">Payment Gateway</div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
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