<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Inter', sans-serif;
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

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
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

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(6, 182, 212, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(6, 182, 212, 0.6);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        .animate-slide-in {
            animation: slideIn 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        .animate-scale-in {
            animation: scaleIn 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .sidebar {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            box-shadow: 10px 0 50px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-link {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: linear-gradient(180deg, #06b6d4, #3b82f6);
            transform: scaleY(0);
            transition: transform 0.3s ease;
            border-radius: 0 4px 4px 0;
        }

        .sidebar-link:hover::before,
        .sidebar-link.active::before {
            transform: scaleY(1);
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(6, 182, 212, 0.2) 0%, rgba(59, 130, 246, 0.1) 100%);
        }

        .sidebar-link:hover {
            background: linear-gradient(90deg, rgba(6, 182, 212, 0.15) 0%, rgba(59, 130, 246, 0.05) 100%);
            transform: translateX(5px);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .product-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 0;
            background: linear-gradient(180deg, #06b6d4, #3b82f6);
            transition: height 0.3s ease;
            border-radius: 0 4px 4px 0;
        }

        .product-card:hover::before {
            height: 100%;
        }

        .product-card:hover {
            background: linear-gradient(90deg, rgba(6, 182, 212, 0.08), rgba(59, 130, 246, 0.04));
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover .product-image {
            transform: scale(1.1) rotate(3deg);
        }

        .badge {
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            font-size: 0.7rem;
        }

        .badge:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .action-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .action-btn:hover {
            transform: scale(1.2) rotate(5deg);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #06b6d4, #3b82f6, #8b5cf6);
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
            box-shadow: 0 10px 25px rgba(6, 182, 212, 0.3);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            box-shadow: 0 15px 35px rgba(6, 182, 212, 0.5);
            transform: translateY(-3px);
        }

        ::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        ::-webkit-scrollbar-track {
            background: linear-gradient(180deg, #f1f5f9, #e2e8f0);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #06b6d4, #3b82f6);
            border-radius: 10px;
            border: 2px solid #f1f5f9;
        }

        .sidebar.mobile-hidden {
            transform: translateX(-100%);
        }

        @media (min-width: 1024px) {
            .sidebar.mobile-hidden {
                transform: translateX(0);
            }
        }

        .menu-btn span {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu-btn.active span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .menu-btn.active span:nth-child(2) {
            opacity: 0;
            transform: translateX(-20px);
        }

        .menu-btn.active span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        .logo-wrapper {
            position: relative;
            animation: glow 3s ease-in-out infinite;
        }

        .header-gradient {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(20px);
        }

        .alert-success {
            animation: slideInDown 0.5s ease-out;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .table-header {
            background: linear-gradient(135deg, rgba(241, 245, 249, 0.8), rgba(226, 232, 240, 0.8));
        }

        .stock-low {
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.6;
            }
        }
    </style>
</head>
<body class="min-h-screen">
    
    <!-- Mobile Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-60 z-30 lg:hidden hidden backdrop-blur-sm transition-opacity"></div>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar fixed lg:static inset-y-0 left-0 z-40 w-72 min-h-screen text-white shadow-2xl mobile-hidden">
            <div class="p-6 lg:p-8 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="logo-wrapper w-14 h-14 rounded-2xl shadow-2xl overflow-hidden flex-shrink-0 ring-4 ring-cyan-500/30">
                        <img src="/uploads/Logo Es Dongan.png"
                            class="w-full h-full object-cover"
                            alt="Logo">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2 class="text-xl lg:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-300">Admin Es Dongan</h2>
                        <p class="text-xs lg:text-sm text-cyan-400 mt-0.5 truncate font-medium">Toko Es Dongan</p>
                    </div>
                </div>
            </div>

            <nav class="mt-6 px-4 space-y-2 pb-6 overflow-y-auto" style="max-height: calc(100vh - 160px);">
                <a href="/admin/dashboard" class="sidebar-link flex items-center space-x-3 py-4 px-5 rounded-2xl text-gray-300 hover:text-white">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="font-semibold text-base">Dashboard</span>
                </a>

                <a href="/admin/products" class="sidebar-link active flex items-center space-x-3 py-4 px-5 rounded-2xl text-white shadow-lg">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z" />
                    </svg>
                    <span class="font-semibold text-base">Produk</span>
                </a>

                <a href="/admin/categories" class="sidebar-link flex items-center space-x-3 py-4 px-5 rounded-2xl text-gray-300 hover:text-white">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                    <span class="font-semibold text-base">Kategori</span>
                </a>

                <a href="/admin/orders" class="sidebar-link flex items-center space-x-3 py-4 px-5 rounded-2xl text-gray-300 hover:text-white">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold text-base">Pesanan</span>
                </a>

                <a href="/admin/users" class="sidebar-link flex items-center space-x-3 py-4 px-5 rounded-2xl text-gray-300 hover:text-white">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <span class="font-semibold text-base">Pengguna</span>
                </a>

                <div class="my-5 border-t border-gray-700/50"></div>

                <a href="/" class="sidebar-link flex items-center space-x-3 py-4 px-5 rounded-2xl text-gray-300 hover:text-white">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold text-base">Lihat Website</span>
                </a>

                <a href="/logout" class="sidebar-link flex items-center space-x-3 py-4 px-5 rounded-2xl text-red-400 hover:text-red-300 hover:bg-red-500/20">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold text-base">Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 w-full lg:w-auto overflow-y-auto">
            <!-- Mobile Header -->
            <div class="lg:hidden sticky top-0 z-20 header-gradient shadow-xl px-4 py-4 flex items-center justify-between border-b border-white/20">
                <button id="menuBtn" class="menu-btn p-2 rounded-xl hover:bg-white/20 transition-all">
                    <div class="w-6 h-5 flex flex-col justify-between">
                        <span class="w-full h-0.5 bg-gray-700 rounded"></span>
                        <span class="w-full h-0.5 bg-gray-700 rounded"></span>
                        <span class="w-full h-0.5 bg-gray-700 rounded"></span>
                    </div>
                </button>
                <h1 class="text-xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">Kelola Produk</h1>
                <div class="w-10"></div>
            </div>

            <div class="p-4 sm:p-6 lg:p-10">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 lg:mb-8 gap-4 animate-fade-in-up">
                    <div>
                        <h1 class="text-3xl lg:text-5xl font-black bg-gradient-to-r from-white via-cyan-100 to-blue-100 bg-clip-text text-transparent mb-2 drop-shadow-2xl">Kelola Produk</h1>
                        <p class="text-white/90 text-sm lg:text-base font-medium backdrop-blur-sm bg-white/10 inline-block px-4 py-2 rounded-xl">Kelola semua produk toko Anda</p>
                    </div>
                    <a href="/admin/products/create" class="btn-gradient px-6 py-3 lg:px-8 lg:py-4 text-white rounded-2xl font-bold transition-all duration-300 text-sm lg:text-base shadow-2xl flex items-center space-x-2 w-full sm:w-auto justify-center">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tambah Produk</span>
                    </a>
                </div>

                <!-- Success Alert -->
                <?php if(session()->getFlashdata('success')): ?>
                <div class="alert-success glass-effect border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-2xl mb-6 shadow-xl animate-scale-in">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold"><?= session()->getFlashdata('success') ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Products Table -->
                <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="table-header border-b-2 border-gray-200">
                                    <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider">Gambar</th>
                                    <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider">Nama Produk</th>
                                    <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider hidden md:table-cell">Kategori</th>
                                    <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider">Harga</th>
                                    <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider hidden lg:table-cell">Stok</th>
                                    <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider hidden sm:table-cell">Status</th>
                                    <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                <?php foreach($products as $product): ?>
                                <tr class="product-card transition-all">
                                    <td class="px-4 sm:px-6 py-4 lg:py-5">
                                        <div class="w-16 h-16 lg:w-20 lg:h-20 bg-gradient-to-br from-cyan-100 via-blue-100 to-purple-100 rounded-2xl flex items-center justify-center overflow-hidden shadow-lg">
                                            <?php if($product['image']): ?>
                                                <img src="/uploads/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="product-image w-full h-full object-cover">
                                            <?php else: ?>
                                                <svg class="w-8 h-8 lg:w-10 lg:h-10 text-cyan-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"/>
                                                </svg>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 lg:py-5">
                                        <div class="font-bold text-gray-900 text-sm lg:text-base"><?= $product['name'] ?></div>
                                        <div class="text-xs lg:text-sm text-gray-500 mt-1 hidden sm:block"><?= substr($product['description'], 0, 50) ?>...</div>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 lg:py-5 hidden md:table-cell">
                                        <span class="badge px-3 py-2 bg-gradient-to-r from-cyan-100 to-cyan-200 text-cyan-900 rounded-xl inline-block">
                                            <?= $product['category_name'] ?>
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 lg:py-5">
                                        <span class="text-gray-900 font-black text-sm lg:text-base">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 lg:py-5 hidden lg:table-cell">
                                        <span class="font-bold <?= $product['stock'] < 10 ? 'text-red-600 stock-low' : 'text-gray-900' ?>">
                                            <?= $product['stock'] ?> pcs
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 lg:py-5 hidden sm:table-cell">
                                        <?php if($product['is_available']): ?>
                                            <span class="badge px-3 py-2 bg-gradient-to-r from-green-100 to-green-200 text-green-900 rounded-xl inline-block">Tersedia</span>
                                        <?php else: ?>
                                            <span class="badge px-3 py-2 bg-gradient-to-r from-red-100 to-red-200 text-red-900 rounded-xl inline-block">Tidak Tersedia</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 lg:py-5">
                                        <div class="flex gap-2 lg:gap-3">
                                            <a href="/admin/products/edit/<?= $product['id'] ?>" 
                                                class="action-btn p-2 lg:p-3 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl hover:shadow-xl" title="Edit">
                                                <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <a href="/admin/products/delete/<?= $product['id'] ?>" 
                                                onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                                class="action-btn p-2 lg:p-3 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-xl hover:shadow-xl" title="Hapus">
                                                <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleMenu() {
            sidebar.classList.toggle('mobile-hidden');
            overlay.classList.toggle('hidden');
            menuBtn.classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');
        }

        menuBtn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    toggleMenu();
                }
            });
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('mobile-hidden');
                overlay.classList.add('hidden');
                menuBtn.classList.remove('active');
                document.body.classList.remove('overflow-hidden');
            }
        });

        // Stagger animation for table rows
        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('.product-card');
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.style.opacity = '0';
                    row.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        row.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                        row.style.opacity = '1';
                        row.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 100);
            });
        });
    </script>

</body>
</html>