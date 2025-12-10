<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - Admin Panel</title>
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

        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
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

        .stat-card {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            border-color: rgba(6, 182, 212, 0.5);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #06b6d4, #3b82f6, #8b5cf6);
            transform: scaleX(0);
            transition: transform 0.4s ease;
            border-radius: 0 0 20px 20px;
        }

        .stat-card:hover::after {
            transform: scaleX(1);
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

        .icon-wrapper {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.15), rgba(59, 130, 246, 0.1));
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            animation: float 3s ease-in-out infinite;
        }

        .stat-card:hover .icon-wrapper {
            transform: scale(1.2) rotate(10deg);
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.3), rgba(59, 130, 246, 0.2));
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        table tbody tr {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        table tbody tr::before {
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

        table tbody tr:hover::before {
            height: 100%;
        }

        table tbody tr:hover {
            background: linear-gradient(90deg, rgba(6, 182, 212, 0.08), rgba(59, 130, 246, 0.04));
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            font-size: 0.7rem;
        }

        .status-badge:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
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

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #0891b2, #2563eb);
        }

        .sidebar.mobile-hidden {
            transform: translateX(-100%);
        }

        @media (min-width: 1024px) {
            .sidebar.mobile-hidden {
                transform: translateX(0);
            }
        }

        .overlay {
            transition: opacity 0.3s ease;
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

        .stat-number {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo-wrapper {
            position: relative;
            animation: glow 3s ease-in-out infinite;
        }

        .header-gradient {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(20px);
        }

        @media (max-width: 768px) {
            .stat-card {
                backdrop-filter: blur(15px);
            }
        }

        .btn-gradient {
            background: linear-gradient(135deg, #06b6d4, #3b82f6, #8b5cf6);
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
            box-shadow: 0 10px 25px rgba(6, 182, 212, 0.3);
        }

        .btn-gradient:hover {
            box-shadow: 0 15px 35px rgba(6, 182, 212, 0.5);
            transform: translateY(-3px);
        }

        .empty-state {
            animation: fadeInUp 0.8s ease-out;
        }

        .table-header {
            background: linear-gradient(135deg, rgba(241, 245, 249, 0.8), rgba(226, 232, 240, 0.8));
        }
    </style>
</head>

<body class="min-h-screen">

    <!-- Mobile Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-60 z-30 lg:hidden hidden overlay backdrop-blur-sm"></div>

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
                <a href="/admin/dashboard" class="sidebar-link active flex items-center space-x-3 py-4 px-5 rounded-2xl text-white shadow-lg">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="font-semibold text-base">Dashboard</span>
                </a>

                <a href="/admin/products" class="sidebar-link flex items-center space-x-3 py-4 px-5 rounded-2xl text-gray-300 hover:text-white">
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
                <h1 class="text-xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">Dashboard</h1>
                <div class="w-10"></div>
            </div>

            <div class="p-4 sm:p-6 lg:p-10">
                <!-- Header Desktop -->
                <div class="hidden lg:block mb-10 animate-fade-in-up">
                    <h1 class="text-5xl font-black bg-gradient-to-r from-white via-cyan-100 to-blue-100 bg-clip-text text-transparent mb-3 drop-shadow-2xl">Dashboard</h1>
                    <p class="text-white/90 text-lg font-medium backdrop-blur-sm bg-white/10 inline-block px-4 py-2 rounded-xl">Selamat datang kembali! Berikut ringkasan toko Anda hari ini.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 lg:gap-6 mb-8 lg:mb-10">
                    <div class="stat-card rounded-3xl shadow-2xl p-6 lg:p-7 border animate-fade-in-up" style="animation-delay: 0.1s;">
                        <div class="flex flex-col space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="icon-wrapper p-4 rounded-2xl shadow-lg">
                                    <svg class="w-8 h-8 lg:w-10 lg:h-10 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm font-semibold mb-2 uppercase tracking-wide">Total Produk</p>
                                <h3 class="stat-number text-5xl lg:text-6xl font-black mb-2"><?= $total_products ?? 0 ?></h3>
                                <p class="text-xs text-cyan-600 font-bold flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                                    </svg>
                                    Aktif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card rounded-3xl shadow-2xl p-6 lg:p-7 border animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="flex flex-col space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="icon-wrapper p-4 rounded-2xl shadow-lg" style="background: linear-gradient(135deg, rgba(34,197,94,0.15), rgba(34,197,94,0.1));">
                                    <svg class="w-8 h-8 lg:w-10 lg:h-10 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm font-semibold mb-2 uppercase tracking-wide">Total Pesanan</p>
                                <h3 class="stat-number text-5xl lg:text-6xl font-black mb-2"><?= $total_orders ?? 0 ?></h3>
                                <p class="text-xs text-green-600 font-bold flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                                    </svg>
                                    Semua waktu
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card rounded-3xl shadow-2xl p-6 lg:p-7 border animate-fade-in-up" style="animation-delay: 0.3s;">
                        <div class="flex flex-col space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="icon-wrapper p-4 rounded-2xl shadow-lg" style="background: linear-gradient(135deg, rgba(234,179,8,0.15), rgba(234,179,8,0.1));">
                                    <svg class="w-8 h-8 lg:w-10 lg:h-10 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm font-semibold mb-2 uppercase tracking-wide">Pesanan Pending</p>
                                <h3 class="stat-number text-5xl lg:text-6xl font-black mb-2"><?= $pending_orders ?? 0 ?></h3>
                                <p class="text-xs text-yellow-600 font-bold flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Menunggu
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card rounded-3xl shadow-2xl p-6 lg:p-7 border animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="flex flex-col space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="icon-wrapper p-4 rounded-2xl shadow-lg" style="background: linear-gradient(135deg, rgba(168,85,247,0.15), rgba(168,85,247,0.1));">
                                    <svg class="w-8 h-8 lg:w-10 lg:h-10 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm font-semibold mb-2 uppercase tracking-wide">Total Pengguna</p>
                                <h3 class="stat-number text-5xl lg:text-6xl font-black mb-2"><?= $total_users ?? 0 ?></h3>
                                <p class="text-xs text-purple-600 font-bold flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                                    </svg>
                                    Terdaftar
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="glass-effect rounded-3xl shadow-2xl p-5 sm:p-7 lg:p-10 animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 lg:mb-8 gap-4">
                        <div>
                            <h2 class="text-2xl lg:text-3xl font-black text-gray-800 mb-1">Pesanan Terbaru</h2>
                            <p class="text-sm lg:text-base text-gray-500 font-medium">Daftar pesanan yang baru masuk</p>
                        </div>
                        <a href="/admin/orders" class="btn-gradient px-6 py-3 text-white rounded-2xl font-bold transition-all duration-300 text-sm lg:text-base text-center shadow-xl">
                            Lihat Semua →
                        </a>
                    </div>

                    <div class="overflow-x-auto -mx-5 sm:mx-0">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden rounded-2xl border border-gray-100">
                                <table class="w-full">
                                    <thead>
                                        <tr class="table-header border-b-2 border-gray-200">
                                            <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider">No. Pesanan</th>
                                            <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider">Total</th>
                                            <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider">Status</th>
                                            <th class="px-4 sm:px-6 py-4 lg:py-5 text-left text-xs lg:text-sm font-black text-gray-700 uppercase tracking-wider hidden sm:table-cell">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 bg-white">
                                        <?php if (isset($recent_orders) && !empty($recent_orders)): ?>
                                            <?php foreach ($recent_orders as $order): ?>
                                                <tr class="transition-all">
                                                    <td class="px-4 sm:px-6 py-4 lg:py-5">
                                                        <span class="font-bold text-gray-800 text-sm lg:text-base"><?= $order['order_number'] ?></span>
                                                    </td>
                                                    <td class="px-4 sm:px-6 py-4 lg:py-5">
                                                        <span class="font-black text-gray-900 text-sm lg:text-base">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></span>
                                                    </td>
                                                    <td class="px-4 sm:px-6 py-4 lg:py-5">
                                                        <span class="status-badge px-3 sm:px-4 py-2 rounded-xl inline-block
                                                        <?= $order['status'] === 'pending' ? 'bg-gradient-to-r from-yellow-200 to-yellow-300 text-yellow-900' : '' ?>
                                                        <?= $order['status'] === 'processing' ? 'bg-gradient-to-r from-blue-200 to-blue-300 text-blue-900' : '' ?>
                                                        <?= $order['status'] === 'completed' ? 'bg-gradient-to-r from-green-200 to-green-300 text-green-900' : '' ?>
                                                        <?= $order['status'] === 'cancelled' ? 'bg-gradient-to-r from-red-200 to-red-300 text-red-900' : '' ?>">
                                                            <?= ucfirst($order['status']) ?>
                                                        </span>
                                                    </td>
                                                    <td class="px-4 sm:px-6 py-4 lg:py-5 hidden sm:table-cell">
                                                        <span class="text-gray-600 font-medium text-sm lg:text-base"><?= date('d M Y', strtotime($order['created_at'])) ?></span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="px-6 py-16 text-center">
                                                    <div class="empty-state flex flex-col items-center justify-center">
                                                        <div class="bg-gradient-to-br from-gray-100 to-gray-200 p-6 rounded-3xl mb-6 shadow-lg">
                                                            <svg class="w-16 h-16 lg:w-20 lg:h-20 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-gray-600 font-bold text-lg lg:text-xl mb-2">Belum ada pesanan</p>
                                                        <p class="text-sm lg:text-base text-gray-400 font-medium">Pesanan baru akan muncul di sini</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

        document.addEventListener('DOMContentLoaded', () => {
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(30px)';
                    setTimeout(() => {
                        card.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 150);
            });
        });
    </script>

</body>

</html>