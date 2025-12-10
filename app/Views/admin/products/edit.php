<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 min-h-screen text-white">
            <div class="p-6">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
                <p class="text-sm text-gray-400 mt-1">Toko Es</p>
            </div>
            <nav class="mt-6">
                <a href="/admin/dashboard" class="block py-3 px-6 hover:bg-gray-800">Dashboard</a>
                <a href="/admin/products" class="block py-3 px-6 bg-cyan-600">Produk</a>
                <a href="/admin/categories" class="block py-3 px-6 hover:bg-gray-800">Kategori</a>
                <a href="/admin/orders" class="block py-3 px-6 hover:bg-gray-800">Pesanan</a>
                <a href="/admin/users" class="block py-3 px-6 hover:bg-gray-800">Pengguna</a>
                <a href="/" class="block py-3 px-6 hover:bg-gray-800">Lihat Website</a>
                <a href="/logout" class="block py-3 px-6 hover:bg-gray-800 text-red-400">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="mb-6">
                <a href="/admin/products" class="text-cyan-600 hover:text-cyan-700 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Daftar Produk
                </a>
            </div>

            <h1 class="text-3xl font-bold mb-8">Edit Produk</h1>

            <?php if(session()->getFlashdata('errors')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <li>• <?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <div class="bg-white rounded-lg shadow-lg p-8">
                <form action="/admin/products/update/<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nama Produk *</label>
                            <input type="text" name="name" required value="<?= old('name', $product['name']) ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                                placeholder="Nama produk">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Kategori *</label>
                            <select name="category_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500">
                                <option value="">Pilih Kategori</option>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>" 
                                        <?= old('category_id', $product['category_id']) == $category['id'] ? 'selected' : '' ?>>
                                        <?= $category['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Harga *</label>
                            <input type="number" name="price" required value="<?= old('price', $product['price']) ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                                placeholder="15000" min="0">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Stok *</label>
                            <input type="number" name="stock" required value="<?= old('stock', $product['stock']) ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                                placeholder="100" min="0">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                            <textarea name="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                                placeholder="Deskripsi produk"><?= old('description', $product['description']) ?></textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-semibold mb-2">Gambar Produk</label>
                            
                            <?php if($product['image']): ?>
                            <div class="mb-4">
                                <img src="/uploads/products/<?= $product['image'] ?>" 
                                    alt="<?= $product['name'] ?>" 
                                    class="w-32 h-32 object-cover rounded-lg border-2 border-gray-300">
                                <p class="text-sm text-gray-500 mt-2">Gambar saat ini</p>
                            </div>
                            <?php endif; ?>
                            
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500">
                            <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG. Max 2MB. Kosongkan jika tidak ingin mengganti gambar.</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="is_available" value="1" 
                                    <?= old('is_available', $product['is_available']) ? 'checked' : '' ?>
                                    class="w-4 h-4 text-cyan-600">
                                <span class="text-gray-700">Produk tersedia untuk dijual</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-8">
                        <button type="submit" 
                            class="bg-cyan-600 text-white px-6 py-3 rounded-lg hover:bg-cyan-700 font-semibold">
                            Update Produk
                        </button>
                        <a href="/admin/products" 
                            class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 font-semibold">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>