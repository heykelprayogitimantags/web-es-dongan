<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-900 min-h-screen text-white">
        <div class="p-6">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
            <p class="text-sm text-gray-400 mt-1">Toko Es</p>
        </div>

        <nav class="mt-6">
            <a href="/admin/dashboard" class="block py-3 px-6 hover:bg-gray-800">Dashboard</a>
            <a href="/admin/products" class="block py-3 px-6 hover:bg-gray-800">Produk</a>
            <a href="/admin/categories" class="block py-3 px-6 hover:bg-gray-800">Kategori</a>
            <a href="/admin/orders" class="block py-3 px-6 bg-cyan-600">Pesanan</a>
            <a href="/admin/users" class="block py-3 px-6 hover:bg-gray-800">Pengguna</a>
            <a href="/" class="block py-3 px-6 hover:bg-gray-800">Lihat Website</a>
            <a href="/logout" class="block py-3 px-6 hover:bg-gray-800 text-red-400">Logout</a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">

        <!-- Back -->
        <div class="mb-6">
            <a href="/admin/orders" class="text-cyan-600 hover:text-cyan-700 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Daftar Pesanan
            </a>
        </div>

        <!-- Header -->
        <div class="flex justify-between items-start mb-8">
            <div>
                <h1 class="text-3xl font-bold">Detail Pesanan</h1>
                <p class="text-gray-600 mt-1">#<?= esc($order['order_number']) ?></p>
            </div>

            <form action="/admin/orders/update-status/<?= $order['id'] ?>" method="post">
                <select name="status"
                        onchange="if(confirm('Yakin ingin mengubah status pesanan?')) this.form.submit()"
                        class="px-6 py-3 rounded-lg border-2 cursor-pointer font-semibold
                            <?= $order['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800 border-yellow-300' : '' ?>
                            <?= $order['status'] === 'processing' ? 'bg-blue-100 text-blue-800 border-blue-300' : '' ?>
                            <?= $order['status'] === 'completed' ? 'bg-green-100 text-green-800 border-green-300' : '' ?>
                            <?= $order['status'] === 'cancelled' ? 'bg-red-100 text-red-800 border-red-300' : '' ?>">
                    <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>⏳ Pending</option>
                    <option value="processing" <?= $order['status'] === 'processing' ? 'selected' : '' ?>>📦 Processing</option>
                    <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>✅ Completed</option>
                    <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>❌ Cancelled</option>
                </select>
            </form>
        </div>

        <!-- GRID CONTENT -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- LEFT SECTION -->
            <div class="lg:col-span-2 space-y-6">

                <!-- ITEMS -->
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 px-6 py-4">
                        <h2 class="text-xl font-bold text-white">Item Pesanan</h2>
                    </div>

                    <div class="p-6 space-y-4">

                        <?php foreach($order_items as $item): ?>
                        <div class="flex items-center gap-4 pb-4 border-b last:border-b-0">

                            <div class="w-16 h-16 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-cyan-500" fill="currentColor">
                                    <path d="M3 3h18v2H3zM3 7h18v2H3zM3 11h18v2H3zM3 15h18v2H3zM3 19h18v2H3z"/>
                                </svg>
                            </div>

                            <div class="flex-1">
                                <h3 class="font-semibold text-lg"><?= esc($item['product_name']) ?></h3>
                                <p class="text-sm text-gray-600">
                                    <?= $item['quantity'] ?> x Rp <?= number_format($item['price'], 0, ',', '.') ?>
                                </p>
                            </div>

                            <div class="text-right text-lg font-bold text-cyan-600">
                                Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <!-- SHIPPING -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-xl font-bold mb-4">Informasi Pengiriman</h2>

                    <div class="space-y-3">

                        <div>
                            <p class="text-sm text-gray-500">Alamat</p>
                            <p class="text-gray-900"><?= nl2br(esc($order['shipping_address'])) ?></p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">No. Telepon</p>
                            <p class="text-gray-900"><?= esc($order['phone']) ?></p>
                        </div>

                        <?php if($order['notes']): ?>
                        <div>
                            <p class="text-sm text-gray-500">Catatan</p>
                            <p class="text-gray-900 italic">"<?= esc($order['notes']) ?>"</p>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="lg:col-span-1 space-y-6">

                <!-- SUMMARY -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-xl font-bold mb-4">Ringkasan</h2>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-600">Ongkir</span>
                            <span class="font-semibold text-green-600">GRATIS</span>
                        </div>

                        <div class="flex justify-between pt-3 border-t">
                            <span class="text-lg font-bold">Total</span>
                            <span class="text-2xl font-bold text-cyan-600">
                                Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
                            </span>
                        </div>
                    </div>

                    <div class="p-4 bg-cyan-50 border border-cyan-200 rounded-lg text-sm">
                        <p class="font-semibold text-cyan-900 mb-1">Pembayaran</p>
                        <p class="text-cyan-800">Cash on Delivery (COD)</p>
                    </div>
                </div>

                <!-- TIMELINE -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-xl font-bold mb-4">Timeline</h2>

                    <div class="space-y-4">

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">✓</span>
                            </div>
                            <div>
                                <p class="font-semibold">Pesanan Dibuat</p>
                                <p class="text-sm text-gray-500"><?= date('d M Y, H:i', strtotime($order['created_at'])) ?></p>
                            </div>
                        </div>

                        <?php if($order['status'] !== 'pending'): ?>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">✓</span>
                            </div>
                            <div>
                                <p class="font-semibold">Pesanan Diproses</p>
                                <p class="text-sm text-gray-500"><?= date('d M Y, H:i', strtotime($order['updated_at'])) ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if($order['status'] === 'completed'): ?>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold">✓</span>
                            </div>
                            <div>
                                <p class="font-semibold">Pesanan Selesai</p>
                                <p class="text-sm text-gray-500"><?= date('d M Y, H:i', strtotime($order['updated_at'])) ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>

        </div>
    </main>

</div>

</body>
</html>
