<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
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

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-slide-in {
            animation: slideIn 0.4s ease-out forwards;
        }

        .stat-card {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 1) 100%);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .sidebar-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: linear-gradient(180deg, #06b6d4 0%, #0891b2 100%);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar-link:hover::before,
        .sidebar-link.active::before {
            transform: scaleY(1);
        }

        .sidebar-link.active {
            background: linear-gradient(90deg, rgba(6, 182, 212, 0.15) 0%, rgba(8, 145, 178, 0.05) 100%);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .icon-wrapper {
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.1) 0%, rgba(6, 182, 212, 0.05) 100%);
            transition: all 0.3s ease;
        }

        .stat-card:hover .icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }

        table tbody tr {
            transition: all 0.2s ease;
        }

        table tbody tr:hover {
            background-color: rgba(6, 182, 212, 0.05);
            transform: scale(1.01);
        }

        .status-badge {
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: all 0.2s ease;
        }

        .status-badge:hover {
            transform: scale(1.05);
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #06b6d4 0%, #0891b2 100%);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0891b2;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-cyan-50 min-h-screen">

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-72 min-h-screen text-white animate-slide-in shadow-2xl" style="background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);">
            <div class="p-8">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-xl shadow-lg overflow-hidden">
                        <img src="/uploads/Logo Es Dongan.png"
                            class="w-full h-full object-cover"
                            alt="Logo">
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold">Admin Es Dongan</h2>
                        <p class="text-sm text-cyan-300 mt-0.5">Toko Es Dongan</p>
                    </div>
                </div>
            </div>

            <nav class="mt-4 px-4 space-y-1">
                <a href="/admin/dashboard" class="sidebar-link active flex items-center space-x-3 py-3.5 px-4 rounded-xl text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="/admin/products" class="sidebar-link flex items-center space-x-3 py-3.5 px-4 rounded-xl text-gray-300 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z" />
                    </svg>
                    <span class="font-medium">Produk</span>
                </a>

                <a href="/admin/categories" class="sidebar-link flex items-center space-x-3 py-3.5 px-4 rounded-xl text-gray-300 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                    <span class="font-medium">Kategori</span>
                </a>

                <a href="/admin/orders" class="sidebar-link flex items-center space-x-3 py-3.5 px-4 rounded-xl text-gray-300 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Pesanan</span>
                </a>

                <a href="/admin/users" class="sidebar-link flex items-center space-x-3 py-3.5 px-4 rounded-xl text-gray-300 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <span class="font-medium">Pengguna</span>
                </a>

                <div class="my-4 border-t border-gray-700"></div>

                <a href="/" class="sidebar-link flex items-center space-x-3 py-3.5 px-4 rounded-xl text-gray-300 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Lihat Website</span>
                </a>

                <a href="/logout" class="sidebar-link flex items-center space-x-3 py-3.5 px-4 rounded-xl text-red-400 hover:text-red-300 hover:bg-red-500/10">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <!-- Header -->
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Dashboard</h1>
                <p class="text-gray-500">Selamat datang kembali! Berikut ringkasan toko Anda hari ini.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <div class="stat-card rounded-2xl shadow-lg p-6 border border-gray-100 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium mb-1">Total Produk</p>
                            <h3 class="text-4xl font-bold text-gray-800"><?= $total_products ?? 0 ?></h3>
                            <p class="text-xs text-cyan-600 mt-2 font-semibold">↗ Aktif</p>
                        </div>
                        <div class="icon-wrapper p-4 rounded-2xl">
                            <svg class="w-10 h-10 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card rounded-2xl shadow-lg p-6 border border-gray-100 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium mb-1">Total Pesanan</p>
                            <h3 class="text-4xl font-bold text-gray-800"><?= $total_orders ?? 0 ?></h3>
                            <p class="text-xs text-green-600 mt-2 font-semibold">↗ Semua waktu</p>
                        </div>
                        <div class="icon-wrapper p-4 rounded-2xl" style="background: linear-gradient(135deg, rgba(34,197,94,0.1) 0%, rgba(34,197,94,0.05) 100%);">
                            <svg class="w-10 h-10 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card rounded-2xl shadow-lg p-6 border border-gray-100 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium mb-1">Pesanan Pending</p>
                            <h3 class="text-4xl font-bold text-gray-800"><?= $pending_orders ?? 0 ?></h3>
                            <p class="text-xs text-yellow-600 mt-2 font-semibold">⏳ Menunggu</p>
                        </div>
                        <div class="icon-wrapper p-4 rounded-2xl" style="background: linear-gradient(135deg, rgba(234,179,8,0.1) 0%, rgba(234,179,8,0.05) 100%);">
                            <svg class="w-10 h-10 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card rounded-2xl shadow-lg p-6 border border-gray-100 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium mb-1">Total Pengguna</p>
                            <h3 class="text-4xl font-bold text-gray-800"><?= $total_users ?? 0 ?></h3>
                            <p class="text-xs text-purple-600 mt-2 font-semibold">↗ Terdaftar</p>
                        </div>
                        <div class="icon-wrapper p-4 rounded-2xl" style="background: linear-gradient(135deg, rgba(168,85,247,0.1) 0%, rgba(168,85,247,0.05) 100%);">
                            <svg class="w-10 h-10 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="glass-effect rounded-2xl shadow-xl p-8 animate-fade-in-up" style="animation-delay: 0.5s;">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Pesanan Terbaru</h2>
                        <p class="text-sm text-gray-500 mt-1">Daftar pesanan yang baru masuk</p>
                    </div>
                    <a href="/admin/orders" class="px-4 py-2 bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-xl font-medium hover:shadow-lg transition-all duration-300 hover:scale-105">
                        Lihat Semua
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-gray-200">
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">No. Pesanan</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php if (isset($recent_orders) && !empty($recent_orders)): ?>
                                <?php foreach ($recent_orders as $order): ?>
                                    <tr class="hover:shadow-md rounded-lg">
                                        <td class="px-6 py-4">
                                            <span class="font-semibold text-gray-800"><?= $order['order_number'] ?></span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="font-bold text-gray-900">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="status-badge px-4 py-2 rounded-full text-xs inline-block
                                            <?= $order['status'] === 'pending' ? 'bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800' : '' ?>
                                            <?= $order['status'] === 'processing' ? 'bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800' : '' ?>
                                            <?= $order['status'] === 'completed' ? 'bg-gradient-to-r from-green-100 to-green-200 text-green-800' : '' ?>
                                            <?= $order['status'] === 'cancelled' ? 'bg-gradient-to-r from-red-100 to-red-200 text-red-800' : '' ?>">
                                                <?= ucfirst($order['status']) ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-gray-600"><?= date('d M Y', strtotime($order['created_at'])) ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-gray-500 font-medium">Belum ada pesanan</p>
                                            <p class="text-sm text-gray-400 mt-1">Pesanan baru akan muncul di sini</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>

</html>