<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password - Toko Es</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="/" class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"/>
                    </svg>
                    <span class="text-2xl font-bold text-cyan-700">Toko Es</span>
                </a>
                
                <div class="flex items-center space-x-6">
                    <a href="/" class="text-gray-700 hover:text-cyan-600">Beranda</a>
                    <a href="/cart" class="text-gray-700 hover:text-cyan-600">Keranjang</a>
                    <a href="/profile" class="text-cyan-600 font-semibold">Profile</a>
                    <a href="/logout" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            
            <!-- Sidebar -->
            <aside class="lg:w-64 bg-white rounded-lg shadow-lg p-6">
                <div class="text-center mb-6 pb-6 border-b">
                    <div class="w-24 h-24 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4">
                        <?= strtoupper(substr(session()->get('name'), 0, 2)) ?>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800"><?= session()->get('name') ?></h3>
                    <p class="text-sm text-gray-500"><?= session()->get('email') ?></p>
                </div>

                <nav class="space-y-2">
                    <a href="/profile" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Profile Saya
                    </a>
                    <a href="/profile/edit" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Profile
                    </a>
                    <a href="/orders" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Pesanan Saya
                    </a>
                    <a href="/profile/change-password" class="flex items-center gap-3 px-4 py-3 bg-cyan-50 text-cyan-700 rounded-lg font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Ganti Password
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1">
                <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold">Ganti Password</h2>
                        <p class="text-gray-600">Update password akun Anda untuk keamanan</p>
                    </div>

                    <?php if(session()->getFlashdata('errors')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <li>• <?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                    <?php endif; ?>

                    <form action="/profile/update-password" method="post">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Password Lama *</label>
                                <input type="password" name="old_password" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                                    placeholder="••••••••">
                                <p class="text-sm text-gray-500 mt-1">Masukkan password lama Anda</p>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Password Baru *</label>
                                <input type="password" name="new_password" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                                    placeholder="••••••••">
                                <p class="text-sm text-gray-500 mt-1">Minimal 6 karakter</p>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Konfirmasi Password Baru *</label>
                                <input type="password" name="confirm_password" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-cyan-500"
                                    placeholder="••••••••">
                                <p class="text-sm text-gray-500 mt-1">Ketik ulang password baru</p>
                            </div>

                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-yellow-600 mt-0.5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-yellow-900">Tips Keamanan</h4>
                                        <ul class="text-sm text-yellow-800 mt-1 space-y-1">
                                            <li>• Gunakan kombinasi huruf besar, kecil, angka, dan simbol</li>
                                            <li>• Jangan gunakan password yang sama dengan akun lain</li>
                                            <li>• Ubah password secara berkala</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-4 pt-6 border-t">
                                <button type="submit" 
                                    class="bg-cyan-600 text-white px-8 py-3 rounded-lg hover:bg-cyan-700 font-semibold">
                                    Ganti Password
                                </button>
                                <a href="/profile" 
                                    class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 font-semibold">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

</body>
</html>