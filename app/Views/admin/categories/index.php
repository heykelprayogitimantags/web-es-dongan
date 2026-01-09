<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-400 via-purple-500 to-purple-600 min-h-screen">
    
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 min-h-screen text-white">
            <div class="p-6 flex items-center gap-3">
                <div class="w-12 h-12 bg-cyan-400 rounded-xl flex items-center justify-center">
                    <span class="text-2xl">🧊</span>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Admin Es Dongan</h2>
                    <p class="text-xs text-cyan-400">Toko Es Dongan</p>
                </div>
            </div>
            <nav class="mt-6">
                <a href="/admin/dashboard" class="flex items-center gap-3 py-3 px-6 hover:bg-slate-800 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                    Dashboard
                </a>
                <a href="/admin/products" class="flex items-center gap-3 py-3 px-6 hover:bg-slate-800 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                    </svg>
                    Produk
                </a>
                <a href="/admin/categories" class="flex items-center gap-3 py-3 px-6 bg-cyan-600 border-l-4 border-cyan-400">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                    </svg>
                    Kategori
                </a>
                <a href="/admin/orders" class="flex items-center gap-3 py-3 px-6 hover:bg-slate-800 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                    Pesanan
                </a>
                <a href="/admin/users" class="flex items-center gap-3 py-3 px-6 hover:bg-slate-800 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                    Pengguna
                </a>
                <a href="/" class="flex items-center gap-3 py-3 px-6 hover:bg-slate-800 transition mt-6 border-t border-slate-800">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                    </svg>
                    Lihat Website
                </a>
                <a href="/logout" class="flex items-center gap-3 py-3 px-6 hover:bg-slate-800 transition text-red-400">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                    </svg>
                    Logout
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Kategori</h1>
                    <p class="text-purple-100">Kelola kategori produk toko Anda</p>
                </div>
                <button onclick="openAddModal()" class="bg-cyan-500 text-white px-6 py-3 rounded-xl hover:bg-cyan-600 font-semibold shadow-lg transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Tambah Kategori
                </button>
            </div>

            <!-- Success Message -->
            <div id="successAlert" class="hidden bg-white rounded-xl shadow-lg p-4 mb-6 border-l-4 border-green-500">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="text-gray-800 font-medium">Berhasil! Kategori telah diperbarui</span>
                </div>
            </div>

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="categoriesGrid">
                <!-- Sample Categories -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="openEditModal(1, 'Es Buah', 'Berbagai macam es buah segar')" 
                                class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button onclick="confirmDelete(1)" 
                                class="w-8 h-8 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Es Buah</h3>
                    <p class="text-gray-600 text-sm mb-4">Berbagai macam es buah segar</p>
                    
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-gray-500">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            09 Jan 2026
                        </span>
                        <span class="text-xs bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full font-semibold">Aktif</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="openEditModal(2, 'Es Krim', 'Es krim dengan berbagai rasa')" 
                                class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button onclick="confirmDelete(2)" 
                                class="w-8 h-8 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Es Krim</h3>
                    <p class="text-gray-600 text-sm mb-4">Es krim dengan berbagai rasa</p>
                    
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-gray-500">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            09 Jan 2026
                        </span>
                        <span class="text-xs bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full font-semibold">Aktif</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-100 to-orange-200 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div class="flex gap-2">
                            <button onclick="openEditModal(3, 'Es Campur', 'Es campur spesial')" 
                                class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button onclick="confirmDelete(3)" 
                                class="w-8 h-8 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Es Campur</h3>
                    <p class="text-gray-600 text-sm mb-4">Es campur spesial</p>
                    
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-gray-500">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            09 Jan 2026
                        </span>
                        <span class="text-xs bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full font-semibold">Aktif</span>
                    </div>
                </div>
            </div>

            <!-- Empty State -->
            <div id="emptyState" class="hidden bg-white rounded-2xl shadow-lg p-12 text-center">
                <div class="w-24 h-24 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Kategori</h3>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">Mulai dengan menambahkan kategori produk untuk mengorganisir toko Anda dengan lebih baik</p>
                <button onclick="openAddModal()" class="bg-cyan-500 text-white px-6 py-3 rounded-xl hover:bg-cyan-600 transition inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Tambah Kategori
                </button>
            </div>
        </main>
    </div>

    <!-- Add Modal -->
    <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 shadow-2xl transform transition-all">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Tambah Kategori Baru</h2>
            </div>
            
            <form action="/admin/categories/store" method="post">
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Nama Kategori *</label>
                    <input type="text" name="name" id="editName" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 transition">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Deskripsi</label>
                    <textarea name="description" id="editDescription" rows="3"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-blue-500 transition resize-none"></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 font-semibold transition shadow-lg">
                        Update Kategori
                    </button>
                    <button type="button" onclick="closeEditModal()" 
                        class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-xl hover:bg-gray-300 font-semibold transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 shadow-2xl transform transition-all">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Konfirmasi Hapus</h2>
            </div>
            
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.</p>

            <div class="flex gap-3">
                <a id="deleteConfirmBtn" href="#" class="flex-1 bg-red-600 text-white py-3 rounded-xl hover:bg-red-700 font-semibold transition shadow-lg text-center">
                    Ya, Hapus
                </a>
                <button type="button" onclick="closeDeleteModal()" 
                    class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-xl hover:bg-gray-300 font-semibold transition">
                    Batal
                </button>
            </div>
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

        function confirmDelete(id) {
            document.getElementById('deleteConfirmBtn').href = '/admin/categories/delete/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Close modal on backdrop click
        document.getElementById('addModal').addEventListener('click', function(e) {
            if (e.target === this) closeAddModal();
        });

        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) closeEditModal();
        });

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddModal();
                closeEditModal();
                closeDeleteModal();
            }
        });
    </script>

</body>
</html> font-semibold mb-2 text-sm">Nama Kategori *</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-cyan-500 transition"
                        placeholder="Contoh: Es Buah">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-cyan-500 transition resize-none"
                        placeholder="Deskripsi kategori (opsional)"></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-cyan-500 text-white py-3 rounded-xl hover:bg-cyan-600 font-semibold transition shadow-lg">
                        Simpan Kategori
                    </button>
                    <button type="button" onclick="closeAddModal()" 
                        class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-xl hover:bg-gray-300 font-semibold transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 shadow-2xl transform transition-all">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Edit Kategori</h2>
            </div>
            
            <form id="editForm" method="post">
                <div class="mb-5">
                    <label class="block text-gray-700