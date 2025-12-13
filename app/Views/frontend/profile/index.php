<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-cyan-50 min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 sm:py-4">
                <a href="/" class="flex items-center space-x-2">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z"/>
                        </svg>
                    </div>
                    <span class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">Toko Es</span>
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="/" class="px-3 lg:px-4 py-2 text-gray-600 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg transition-all duration-200">Beranda</a>
                    <a href="/cart" class="px-3 lg:px-4 py-2 text-gray-600 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg transition-all duration-200">Keranjang</a>
                    <a href="/profile" class="px-3 lg:px-4 py-2 text-cyan-600 bg-cyan-50 font-semibold rounded-lg">Profile</a>
                    <a href="/logout" class="ml-2 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-sm">Logout</a>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden pb-4 space-y-2">
                <a href="/" class="block px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">Beranda</a>
                <a href="/cart" class="block px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">Keranjang</a>
                <a href="/profile" class="block px-4 py-2 text-cyan-600 bg-cyan-50 font-semibold rounded-lg">Profile</a>
                <a href="/logout" class="block px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
        <div class="flex flex-col lg:flex-row gap-6">
            
            <!-- Sidebar -->
            <aside class="lg:w-72 xl:w-80">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:sticky lg:top-24">
                    <!-- User Info -->
                    <div class="text-center mb-6 pb-6 border-b border-gray-100">
                        <div class="relative inline-block mb-4">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-cyan-400 via-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center text-white text-2xl sm:text-3xl font-bold shadow-lg">
                                <?= strtoupper(substr(session()->get('name'), 0, 2)) ?>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 border-4 border-white rounded-full"></div>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800"><?= session()->get('name') ?></h3>
                        <p class="text-sm text-gray-500 mt-1 break-all"><?= session()->get('email') ?></p>
                    </div>

                    <!-- Menu -->
                    <nav class="space-y-1">
                        <a href="/profile" class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-cyan-50 to-blue-50 text-cyan-700 rounded-xl font-semibold transition-all duration-200 border border-cyan-100">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Profile Saya</span>
                        </a>
                        <a href="/profile/edit" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-all duration-200 hover:text-cyan-600">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <span>Edit Profile</span>
                        </a>
                        <a href="/orders" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-all duration-200 hover:text-cyan-600">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <span>Pesanan Saya</span>
                        </a>
                        <a href="/profile/change-password" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl transition-all duration-200 hover:text-cyan-600">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Ganti Password</span>
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 min-w-0">
                <?php if(session()->getFlashdata('success')): ?>
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-700 px-4 sm:px-6 py-4 rounded-xl mb-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span><?= session()->getFlashdata('success') ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Profile Info Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 mb-6">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 mb-6">
                        <div>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Informasi Profile</h2>
                            <p class="text-gray-500 mt-1 text-sm sm:text-base">Kelola informasi pribadi Anda</p>
                        </div>
                        <a href="/profile/edit" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-cyan-600 to-blue-600 text-white px-5 py-2.5 rounded-xl hover:from-cyan-700 hover:to-blue-700 transition-all duration-200 shadow-sm hover:shadow-md text-sm sm:text-base">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Profile
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                            <label class="text-xs sm:text-sm text-gray-500 font-medium uppercase tracking-wider">Nama Lengkap</label>
                            <p class="text-base sm:text-lg text-gray-900 font-semibold mt-1"><?= $user['name'] ?? 'N/A' ?></p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                            <label class="text-xs sm:text-sm text-gray-500 font-medium uppercase tracking-wider">Email</label>
                            <p class="text-base sm:text-lg text-gray-900 mt-1 break-all"><?= $user['email'] ?? 'N/A' ?></p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                            <label class="text-xs sm:text-sm text-gray-500 font-medium uppercase tracking-wider">No. Telepon</label>
                            <p class="text-base sm:text-lg text-gray-900 mt-1"><?= $user['phone'] ?? 'Belum diisi' ?></p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                            <label class="text-xs sm:text-sm text-gray-500 font-medium uppercase tracking-wider">Terdaftar Sejak</label>
                            <p class="text-base sm:text-lg text-gray-900 mt-1"><?= date('d F Y', strtotime($user['created_at'])) ?></p>
                        </div>

                        <div class="sm:col-span-2 bg-gray-50 rounded-xl p-4 border border-gray-100">
                            <label class="text-xs sm:text-sm text-gray-500 font-medium uppercase tracking-wider">Alamat</label>
                            <p class="text-base sm:text-lg text-gray-900 mt-1"><?= $user['address'] ?? 'Belum diisi' ?></p>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6">
                    <div class="bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-cyan-100 text-sm font-medium">Total Pesanan</p>
                                <h3 class="text-3xl sm:text-4xl font-bold mt-2"><?= $total_orders ?? 0 ?></h3>
                                <p class="text-xs text-cyan-100 mt-2">Semua waktu</p>
                            </div>
                            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl flex-shrink-0">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100 text-sm font-medium">Pesanan Selesai</p>
                                <h3 class="text-3xl sm:text-4xl font-bold mt-2"><?= $completed_orders ?? 0 ?></h3>
                                <p class="text-xs text-green-100 mt-2">Berhasil diproses</p>
                            </div>
                            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl flex-shrink-0">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200 sm:col-span-2 lg:col-span-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-yellow-100 text-sm font-medium">Pesanan Pending</p>
                                <h3 class="text-3xl sm:text-4xl font-bold mt-2"><?= $pending_orders ?? 0 ?></h3>
                                <p class="text-xs text-yellow-100 mt-2">Menunggu proses</p>
                            </div>
                            <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl flex-shrink-0">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                        <div>
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Pesanan Terakhir</h2>
                            <p class="text-gray-500 mt-1 text-sm sm:text-base">Riwayat pesanan terbaru Anda</p>
                        </div>
                        <a href="/orders" class="inline-flex items-center gap-2 text-cyan-600 hover:text-cyan-700 font-semibold group text-sm sm:text-base">
                            Lihat Semua 
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>

                    <?php if(isset($recent_orders) && !empty($recent_orders)): ?>
                    <div class="space-y-3 sm:space-y-4">
                        <?php foreach($recent_orders as $order): ?>
                        <div class="border border-gray-100 rounded-xl p-4 sm:p-5 hover:border-cyan-200 hover:shadow-md transition-all duration-200">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-base sm:text-lg text-gray-800"><?= $order['order_number'] ?></p>
                                    <p class="text-sm text-gray-500 mt-1"><?= date('d M Y', strtotime($order['created_at'])) ?></p>
                                </div>
                                <div class="text-left sm:text-right flex-shrink-0">
                                    <p class="font-bold text-lg sm:text-xl text-cyan-600">Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></p>
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full mt-2
                                        <?= $order['status'] === 'pending' ? 'bg-yellow-100 text-yellow-700 border border-yellow-200' : '' ?>
                                        <?= $order['status'] === 'processing' ? 'bg-blue-100 text-blue-700 border border-blue-200' : '' ?>
                                        <?= $order['status'] === 'completed' ? 'bg-green-100 text-green-700 border border-green-200' : '' ?>">
                                        <?= ucfirst($order['status']) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                    <div class="text-center py-12">
                        <div class="inline-block p-6 bg-gray-50 rounded-2xl mb-4">
                            <svg class="w-16 h-16 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <p class="text-gray-500 text-lg mb-2">Belum ada pesanan</p>
                        <p class="text-gray-400 text-sm mb-6">Mulai berbelanja sekarang dan nikmati berbagai produk kami</p>
                        <a href="/" class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-600 to-blue-600 text-white px-6 py-3 rounded-xl hover:from-cyan-700 hover:to-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            Mulai Belanja
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>

</body>
</html>