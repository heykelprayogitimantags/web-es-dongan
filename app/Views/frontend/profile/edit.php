<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Toko Es</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                
                <a href="/" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"/>
                    </svg>
                    <span class="text-2xl font-bold text-cyan-700">Toko Es</span>
                </a>

                <button id="mobile-menu-btn" class="md:hidden text-gray-500 hover:text-cyan-600 focus:outline-none p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div class="hidden md:flex items-center space-x-8 text-sm md:text-base">
                    <a href="/" class="text-gray-700 hover:text-cyan-600 transition">Beranda</a>
                    <a href="/cart" class="text-gray-700 hover:text-cyan-600 transition">Keranjang</a>
                    <a href="/profile" class="text-cyan-600 font-semibold transition">Profile</a>
                    <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition shadow-sm">Logout</a>
                </div>
            </div>

            <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-gray-100">
                <div class="flex flex-col space-y-2 mt-3">
                    <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-lg">Beranda</a>
                    <a href="/cart" class="block px-4 py-2 text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-lg">Keranjang</a>
                    <a href="/profile" class="block px-4 py-2 text-cyan-600 font-semibold bg-cyan-50 rounded-lg">Profile</a>
                    <a href="/logout" class="block px-4 py-2 text-red-500 hover:bg-red-50 rounded-lg">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-6 md:py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            
            <aside class="w-full lg:w-64 bg-white rounded-lg shadow-lg p-6 h-fit">
                <div class="text-center mb-6 pb-6 border-b">
                    <div class="w-20 h-20 md:w-24 md:h-24 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center text-white text-2xl md:text-3xl font-bold mx-auto mb-4 shadow-md">
                        <?= strtoupper(substr(session()->get('name') ?? 'User', 0, 2)) ?>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-800 truncate"><?= session()->get('name') ?></h3>
                    <p class="text-xs md:text-sm text-gray-500 truncate"><?= session()->get('email') ?></p>
                </div>

                <nav class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-2">
                    <a href="/profile" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="truncate">Profile Saya</span>
                    </a>
                    <a href="/profile/edit" class="flex items-center gap-3 px-4 py-3 bg-cyan-50 text-cyan-700 rounded-lg font-semibold border border-cyan-100 shadow-sm">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span class="truncate">Edit Profile</span>
                    </a>
                    <a href="/orders" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span class="truncate">Pesanan Saya</span>
                    </a>
                    <a href="/profile/change-password" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <span class="truncate">Ganti Password</span>
                    </a>
                </nav>
            </aside>

            <main class="flex-1">
                <div class="bg-white rounded-lg shadow-lg p-5 md:p-8">
                    <div class="mb-6">
                        <h2 class="text-xl md:text-2xl font-bold text-gray-800">Edit Profile</h2>
                        <p class="text-sm md:text-base text-gray-600">Update informasi data diri Anda terbaru</p>
                    </div>

                    <?php if(session()->getFlashdata('errors')): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                        <ul class="list-disc list-inside">
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('success')): ?>
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-4 text-sm flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                    <?php endif; ?>

                    <form action="/profile/update" method="post">
                        <?= csrf_field() ?> 
                        <div class="space-y-4 md:space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                                
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Nama Lengkap *</label>
                                    <input type="text" name="name" required 
                                        value="<?= old('name', $user['name'] ?? '') ?>"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                                        placeholder="Nama lengkap">
                                </div>

                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Email *</label>
                                    <input type="email" name="email" required 
                                        value="<?= old('email', $user['email'] ?? '') ?>"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                                        placeholder="email@example.com">
                                </div>

                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">No. Telepon</label>
                                    <input type="text" name="phone" 
                                        value="<?= old('phone', $user['phone'] ?? '') ?>"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                                        placeholder="081234567890">
                                </div>

                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Terdaftar Sejak</label>
                                    <input type="text" disabled 
                                        value="<?= isset($user['created_at']) ? date('d F Y', strtotime($user['created_at'])) : '-' ?>"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Alamat Lengkap</label>
                                    <textarea name="address" rows="4"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition resize-none"
                                        placeholder="Jalan, RT/RW, Kecamatan, Kota, Provinsi..."><?= old('address', $user['address'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <div class="flex flex-col-reverse sm:flex-row gap-3 md:gap-4 pt-6 border-t mt-4">
                                <a href="/profile" 
                                    class="w-full sm:w-auto text-center bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 font-semibold transition">
                                    Batal
                                </a>
                                <button type="submit" 
                                    class="w-full sm:w-auto bg-cyan-600 text-white px-8 py-3 rounded-lg hover:bg-cyan-700 font-semibold shadow-md hover:shadow-lg transition flex justify-center items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>