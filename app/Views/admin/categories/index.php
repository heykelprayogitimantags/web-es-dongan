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
                <a href="/admin/products" class="block py-3 px-6 hover:bg-gray-800">Produk</a>
                <a href="/admin/categories" class="block py-3 px-6 bg-cyan-600">Kategori</a>
                <a href="/admin/orders" class="block py-3 px-6 hover:bg-gray-800">Pesanan</a>
                <a href="/admin/users" class="block py-3 px-6 hover:bg-gray-800">Pengguna</a>
                <a href="/" class="block py-3 px-6 hover:bg-gray-800">Lihat Website</a>
                <a href="/logout" class="block py-3 px-6 hover:bg-gray-800 text-red-400">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Kelola Kategori</h1>
                <button onclick="openAddModal()" class="bg-cyan-600 text-white px-6 py-3 rounded-lg hover:bg-cyan-700 font-semibold">
                    + Tambah Kategori
                </button>
            </div>

            <?php if(session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?= session()->getFlashdata('success') ?>
            </div>
            <?php endif; ?>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach($categories as $category): ?>
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                    <div class="flex justify-between items-start mb-4">
                        <div class="bg-cyan-100 p-3 rounded-full">
                            <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="openEditModal(<?= $category['id'] ?>, '<?= addslashes($category['name']) ?>', '<?= addslashes($category['description'] ?? '') ?>')" 
                                class="text-blue-600 hover:text-blue-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <a href="/admin/categories/delete/<?= $category['id'] ?>" 
                                onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                class="text-red-600 hover:text-red-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?= $category['name'] ?></h3>
                    <p class="text-gray-600 text-sm"><?= $category['description'] ?? 'Tidak ada deskripsi' ?></p>
                    
                    <div class="mt-4 pt-4 border-t">
                        <span class="text-sm text-gray-500">
                            Dibuat: <?= date('d M Y', strtotime($category['created_at'])) ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <?php if(empty($categories)): ?>
            <div class="bg-white rounded-lg shadow-lg p-12 text-center">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                <h3 class="text-2xl font-semibold text-gray-700 mb-2">Belum Ada Kategori</h3>
                <p class="text-gray-600 mb-6">Mulai dengan menambahkan kategori produk</p>
                <button onclick="openAddModal()" class="bg-cyan-600 text-white px-6 py-3 rounded-lg hover:bg-cyan-700">
                    + Tambah Kategori
                </button>
            </div>
            <?php endif; ?>
        </main>
    </div>

    <!-- Add Modal -->
    <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold mb-6">Tambah Kategori Baru</h2>
            
            <form action="/admin/categories/store" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Nama Kategori *</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                        placeholder="Contoh: Es Buah">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                        placeholder="Deskripsi kategori (opsional)"></textarea>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="flex-1 bg-cyan-600 text-white py-3 rounded-lg hover:bg-cyan-700 font-semibold">
                        Simpan
                    </button>
                    <button type="button" onclick="closeAddModal()" 
                        class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-lg hover:bg-gray-400 font-semibold">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold mb-6">Edit Kategori</h2>
            
            <form id="editForm" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Nama Kategori *</label>
                    <input type="text" name="name" id="editName" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea name="description" id="editDescription" rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"></textarea>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="flex-1 bg-cyan-600 text-white py-3 rounded-lg hover:bg-cyan-700 font-semibold">
                        Update
                    </button>
                    <button type="button" onclick="closeEditModal()" 
                        class="flex-1 bg-gray-300 text-gray-700 py-3 rounded-lg hover:bg-gray-400 font-semibold">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(id, name, description) {
            document.getElementById('editForm').action = '/admin/categories/update/' + id;
            document.getElementById('editName').value = name;
            document.getElementById('editDescription').value = description;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Close modal on backdrop click
        document.getElementById('addModal').addEventListener('click', function(e) {
            if (e.target === this) closeAddModal();
        });

        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) closeEditModal();
        });
    </script>

</body>
</html>