<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Kelola Pesanan' ?> - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.3s ease-out;
        }
        .status-badge {
            transition: all 0.2s ease;
        }
        .status-badge:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
    
    <div class="flex">
        <!-- Sidebar Modern -->
        <aside class="w-72 bg-gradient-to-b from-slate-900 to-slate-800 min-h-screen text-white shadow-2xl">
            <div class="p-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-cyan-500 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Toko Es</h2>
                        <p class="text-xs text-cyan-300">Admin Panel</p>
                    </div>
                </div>
            </div>
            
            <nav class="mt-4 px-4">
                <a href="/admin/dashboard" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-slate-700 transition mb-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                
                <a href="/admin/products" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-slate-700 transition mb-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <span>Produk</span>
                </a>
                
                <a href="/admin/categories" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-slate-700 transition mb-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <span>Kategori</span>
                </a>
                
                <a href="/admin/orders" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-gradient-to-r from-cyan-600 to-cyan-500 shadow-lg mb-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="font-semibold">Pesanan</span>
                </a>
                
                <a href="/admin/users" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-slate-700 transition mb-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Pengguna</span>
                </a>
                
                <div class="border-t border-slate-700 my-4"></div>
                
                <a href="/" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-slate-700 transition mb-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>Lihat Website</span>
                </a>
                
                <a href="/logout" class="flex items-center gap-3 py-3 px-4 rounded-lg hover:bg-red-600 transition text-red-300 hover:text-white mb-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-slate-800 mb-2">Kelola Pesanan</h1>
                <p class="text-slate-600">Kelola dan pantau semua pesanan pelanggan</p>
            </div>

            <!-- Success Message -->
            <?php if(session()->getFlashdata('success')): ?>
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-4 rounded-xl mb-6 shadow-lg fade-in">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-semibold"><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
            <?php endif; ?>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-cyan-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-600 text-sm font-medium mb-1">Total Pesanan</p>
                            <p class="text-3xl font-bold text-slate-800"><?= count($orders) ?></p>
                        </div>
                        <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-600 text-sm font-medium mb-1">Pending</p>
                            <p class="text-3xl font-bold text-slate-800"><?= count(array_filter($orders, fn($o) => $o['status'] === 'pending')) ?></p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">⏳</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-600 text-sm font-medium mb-1">Processing</p>
                            <p class="text-3xl font-bold text-slate-800"><?= count(array_filter($orders, fn($o) => $o['status'] === 'processing')) ?></p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">📦</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-600 text-sm font-medium mb-1">Completed</p>
                            <p class="text-3xl font-bold text-slate-800"><?= count(array_filter($orders, fn($o) => $o['status'] === 'completed')) ?></p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">✅</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="mb-6 flex gap-3 overflow-x-auto pb-2">
                <button onclick="filterOrders('all')" 
                    class="px-6 py-3 rounded-xl bg-gradient-to-r from-cyan-600 to-cyan-500 text-white font-semibold shadow-lg hover:shadow-xl transition whitespace-nowrap filter-btn" 
                    data-filter="all">
                    Semua Pesanan
                </button>
                <button onclick="filterOrders('pending')" 
                    class="px-6 py-3 rounded-xl bg-white text-slate-700 font-semibold shadow hover:shadow-lg transition whitespace-nowrap filter-btn" 
                    data-filter="pending">
                    ⏳ Pending
                </button>
                <button onclick="filterOrders('processing')" 
                    class="px-6 py-3 rounded-xl bg-white text-slate-700 font-semibold shadow hover:shadow-lg transition whitespace-nowrap filter-btn" 
                    data-filter="processing">
                    📦 Processing
                </button>
                <button onclick="filterOrders('completed')" 
                    class="px-6 py-3 rounded-xl bg-white text-slate-700 font-semibold shadow hover:shadow-lg transition whitespace-nowrap filter-btn" 
                    data-filter="completed">
                    ✅ Completed
                </button>
                <button onclick="filterOrders('cancelled')" 
                    class="px-6 py-3 rounded-xl bg-white text-slate-700 font-semibold shadow hover:shadow-lg transition whitespace-nowrap filter-btn" 
                    data-filter="cancelled">
                    ❌ Cancelled
                </button>
            </div>

            <!-- Orders Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-slate-50 to-slate-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">No. Pesanan</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Pelanggan</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            <?php if(empty($orders)): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                    <svg class="w-16 h-16 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-lg font-semibold">Belum ada pesanan</p>
                                    <p class="text-sm text-slate-400 mt-2">Pesanan dari pelanggan akan muncul di sini</p>
                                </td>
                            </tr>
                            <?php else: ?>
                                <?php foreach($orders as $order): ?>
                                <?php 
                                    // Get customer name and email
                                    $customerName = $order['customer_name'] ?? $order['name'] ?? $order['user_name'] ?? 'Guest';
                                    $customerEmail = $order['customer_email'] ?? $order['email'] ?? $order['user_email'] ?? 'Tidak ada email';
                                    
                                    // Get first letter for avatar
                                    $initial = strtoupper(substr($customerName, 0, 1));
                                    
                                    // Random gradient colors for avatar
                                    $gradients = [
                                        'from-purple-500 to-pink-500',
                                        'from-blue-500 to-cyan-500',
                                        'from-green-500 to-emerald-500',
                                        'from-orange-500 to-red-500',
                                        'from-indigo-500 to-purple-500',
                                        'from-pink-500 to-rose-500'
                                    ];
                                    $gradientClass = $gradients[array_rand($gradients)];
                                    
                                    // Status colors
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200 hover:border-yellow-300 focus:ring-yellow-400',
                                        'processing' => 'bg-blue-100 text-blue-800 border-blue-200 hover:border-blue-300 focus:ring-blue-400',
                                        'completed' => 'bg-green-100 text-green-800 border-green-200 hover:border-green-300 focus:ring-green-400',
                                        'cancelled' => 'bg-red-100 text-red-800 border-red-200 hover:border-red-300 focus:ring-red-400'
                                    ];
                                    $statusClass = $statusClasses[$order['status']] ?? 'bg-gray-100 text-gray-800';
                                ?>
                                <tr class="hover:bg-slate-50 transition order-row fade-in" data-status="<?= $order['status'] ?>">
                                    <td class="px-6 py-5">
                                        <div class="font-bold text-slate-900"><?= esc($order['order_number']) ?></div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-gradient-to-br <?= $gradientClass ?> rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                                <?= $initial ?>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="font-semibold text-slate-900 truncate"><?= esc($customerName) ?></div>
                                                <div class="text-sm text-slate-500 truncate"><?= esc($customerEmail) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="font-bold text-slate-900 text-lg">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <form action="/admin/orders/update-status/<?= $order['id'] ?>" method="post" class="inline-block">
                                            <select name="status" onchange="this.form.submit()" 
                                                class="status-badge px-4 py-2 text-sm font-bold rounded-xl cursor-pointer border-2 focus:outline-none focus:ring-2 <?= $statusClass ?>">
                                                <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>⏳ Pending</option>
                                                <option value="processing" <?= $order['status'] === 'processing' ? 'selected' : '' ?>>📦 Processing</option>
                                                <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>✅ Completed</option>
                                                <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>❌ Cancelled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="text-sm text-slate-600">
                                            <div class="font-medium"><?= date('d M Y', strtotime($order['created_at'])) ?></div>
                                            <div class="text-slate-500"><?= date('H:i', strtotime($order['created_at'])) ?></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <a href="/admin/orders/<?= $order['id'] ?>" 
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-50 text-cyan-700 font-semibold rounded-lg hover:bg-cyan-100 transition">
                                            <span>Detail</span>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        function filterOrders(status) {
            const rows = document.querySelectorAll('.order-row');
            const buttons = document.querySelectorAll('.filter-btn');
            
            // Update button styles
            buttons.forEach(btn => {
                if (btn.dataset.filter === status) {
                    btn.className = 'px-6 py-3 rounded-xl bg-gradient-to-r from-cyan-600 to-cyan-500 text-white font-semibold shadow-lg hover:shadow-xl transition whitespace-nowrap filter-btn';
                } else {
                    btn.className = 'px-6 py-3 rounded-xl bg-white text-slate-700 font-semibold shadow hover:shadow-lg transition whitespace-nowrap filter-btn';
                }
            });
            
            // Filter rows with animation
            rows.forEach((row, index) => {
                if (status === 'all' || row.dataset.status === status) {
                    setTimeout(() => {
                        row.style.display = '';
                        row.classList.add('fade-in');
                    }, index * 50);
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>

</body>
</html>