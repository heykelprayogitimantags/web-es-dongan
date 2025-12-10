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
                <a href="/admin/dashboard" class="block py-3 px-6 hover:bg-gray-800">Dashboard</a>
                <a href="/admin/products" class="block py-3 px-6 bg-cyan-600 hover:bg-cyan-700">Produk</a>
                <a href="/admin/categories" class="block py-3 px-6 hover:bg-gray-800">Kategori</a>
                <a href="/admin/orders" class="block py-3 px-6 hover:bg-gray-800">Pesanan</a>
                <a href="/admin/users" class="block py-3 px-6 hover:bg-gray-800">Pengguna</a>
                <a href="/" class="block py-3 px-6 hover:bg-gray-800">Lihat Website</a>
                <a href="/logout" class="block py-3 px-6 hover:bg-gray-800 text-red-400">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Kelola Produk</h1>
                <a href="/admin/products/create" class="bg-cyan-600 text-white px-6 py-3 rounded-lg hover:bg-cyan-700">
                    + Tambah Produk
                </a>
            </div>

            <?php if(session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?= session()->getFlashdata('success') ?>
            </div>
            <?php endif; ?>

            <!-- Products Table -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach($products as $product): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-lg flex items-center justify-center">
                                    <?php if($product['image']): ?>
                                        <img src="/uploads/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="w-full h-full object-cover rounded-lg">
                                    <?php else: ?>
                                        <svg class="w-8 h-8 text-cyan-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900"><?= $product['name'] ?></div>
                                <div class="text-sm text-gray-500"><?= substr($product['description'], 0, 50) ?>...</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs bg-cyan-100 text-cyan-800 rounded-full">
                                    <?= $product['category_name'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-900 font-medium">
                                Rp <?= number_format($product['price'], 0, ',', '.') ?>
                            </td>
                            <td class="px-6 py-4">
                                <span class="<?= $product['stock'] < 10 ? 'text-red-600' : 'text-gray-900' ?>">
                                    <?= $product['stock'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($product['is_available']): ?>
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Tersedia</span>
                                <?php else: ?>
                                    <span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Tidak Tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="/admin/products/edit/<?= $product['id'] ?>" 
                                        class="text-blue-600 hover:text-blue-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <a href="/admin/products/delete/<?= $product['id'] ?>" 
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                        class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        </main>
    </div>

</body>
</html>