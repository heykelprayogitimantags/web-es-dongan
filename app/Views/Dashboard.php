<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 min-h-screen text-white">
            <div class="p-6">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
            </div>
            <nav class="mt-6">
                <a href="/admin/dashboard" class="block py-3 px-6 bg-cyan-600 hover:bg-cyan-700">Dashboard</a>
                <a href="/admin/products" class="block py-3 px-6 hover:bg-gray-800">Produk</a>
                <a href="/admin/categories" class="block py-3 px-6 hover:bg-gray-800">Kategori</a>
                <a href="/admin/orders" class="block py-3 px-6 hover:bg-gray-800">Pesanan</a>
                <a href="/admin/users" class="block py-3 px-6 hover:bg-gray-800">Pengguna</a>
                <a href="/" class="block py-3 px-6 hover:bg-gray-800">Lihat Website</a>
                <a href="/logout" class="block py-3 px-6 hover:bg-gray-800 text-red-400">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Dashboard</h1>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Produk</p>
                            <h3 class="text-3xl font-bold text-cyan-600"><?= $total_products ?></h3>
                        </div>
                        <svg class="w-12 h-12 text-cyan-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Pesanan</p>
                            <h3 class="text-3xl font-bold text-green-600"><?= $total_orders ?></h3>
                        </div>
                        <svg class="w-12 h-12 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Pesanan Pending</p>
                            <h3 class="text-3xl font-bold text-yellow-600"><?= $pending_orders ?></h3>
                        </div>
                        <svg class="w-12 h-12 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Pengguna</p>
                            <h3 class="text-3xl font-bold text-purple-600"><?= $total_users ?></h3>
                        </div>
                        <svg class="w-12 h-12 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Pesanan Terbaru</h2>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left">No. Pesanan</th>
                                <th class="px-4 py-3 text-left">Total</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recent_orders as $order): ?>
                            <tr class="border-b">
                                <td class="px-4 py-3"><?= $order['order_number'] ?></td>
                                <td class="px-4 py-3">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></td>
                                <td class="px-4 py-3">
                                    <span class="px-3 py-1 rounded-full text-sm
                                        <?= $order['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' ?>
                                        <?= $order['status'] === 'processing' ? 'bg-blue-100 text-blue-800' : '' ?>
                                        <?= $order['status'] === 'completed' ? 'bg-green-100 text-green-800' : '' ?>
                                        <?= $order['status'] === 'cancelled' ? 'bg-red-100 text-red-800' : '' ?>">
                                        <?= ucfirst($order['status']) ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3"><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>