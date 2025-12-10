<?= $this->extend('frontend/layout') ?>

<?= $this->section('content') ?>

<!-- Navbar -->
<nav id="navbar" class="bg-white sticky top-0 z-50 transition-all duration-300 shadow-sm">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-center py-4">

            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 group">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur opacity-75 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative bg-white rounded-full p-2 shadow-lg">
                        <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan Logo" class="w-10 h-10 object-contain">
                    </div>
                </div>
                <div>
                    <span class="text-xl lg:text-2xl font-bold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                        Es Dongan
                    </span>
                    <p class="text-xs text-gray-500 hidden sm:block">Minumannya Kawan Awak</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="/" class="nav-link text-gray-700 hover:text-cyan-600 font-medium transition-colors pb-1">
                    Beranda
                </a>
                <a href="/products" class="nav-link active text-gray-700 hover:text-cyan-600 font-medium transition-colors pb-1">
                    Produk
                </a>
                <a href="/about" class="nav-link text-gray-700 hover:text-cyan-600 font-medium transition-colors pb-1">
                    Tentang
                </a>
                <a href="/contact" class="nav-link text-gray-700 hover:text-cyan-600 font-medium transition-colors pb-1">
                    Kontak
                </a>
            </div>

            <!-- Right Side: Cart & Login -->
            <div class="flex items-center space-x-4">
                <!-- Shopping Cart -->
                <a href="/cart" class="relative p-2 hover:bg-gray-100 rounded-lg transition-colors group">
                    <svg class="w-6 h-6 text-gray-700 group-hover:text-cyan-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span class="cart-badge hidden absolute -top-1 -right-1 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center shadow-lg">
                        0
                    </span>
                </a>

                <!-- Login Button (Desktop) -->
                <a href="/login" class="hidden lg:block btn-ripple bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-6 py-2.5 rounded-lg font-semibold hover:from-cyan-600 hover:to-blue-600 shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 relative overflow-hidden">
                    <span class="relative z-10">Login</span>
                </a>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <svg id="hamburger" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 text-gray-700 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu Backdrop -->
<div id="backdrop" class="backdrop fixed inset-0 bg-black/50 z-40 opacity-0 pointer-events-none transition-opacity duration-300" onclick="toggleMobileMenu()"></div>

<!-- Mobile Menu Sidebar -->
<div id="mobile-menu" class="mobile-menu fixed top-0 left-0 w-80 h-full bg-white z-50 shadow-2xl transform -translate-x-full transition-transform duration-300">
    <div class="p-6">
        <!-- Mobile Menu Header -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full p-2">
                    <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan" class="w-8 h-8">
                </div>
                <div>
                    <h3 class="font-bold text-gray-800">Es Dongan</h3>
                    <p class="text-xs text-gray-500">Menu</p>
                </div>
            </div>
            <button onclick="toggleMobileMenu()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Items -->
        <div class="space-y-2">
            <a href="/" class="mobile-menu-item flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-cyan-50 hover:to-blue-50 transition-all group">
                <svg class="w-5 h-5 text-gray-500 group-hover:text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="font-medium text-gray-700 group-hover:text-cyan-600">Beranda</span>
            </a>

            <a href="/products" class="mobile-menu-item flex items-center space-x-3 p-4 rounded-xl bg-gradient-to-r from-cyan-50 to-blue-50 group">
                <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <span class="font-medium text-cyan-600">Produk</span>
            </a>

            <a href="/about" class="mobile-menu-item flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-cyan-50 hover:to-blue-50 transition-all group">
                <svg class="w-5 h-5 text-gray-500 group-hover:text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium text-gray-700 group-hover:text-cyan-600">Tentang</span>
            </a>

            <a href="/contact" class="mobile-menu-item flex items-center space-x-3 p-4 rounded-xl hover:bg-gradient-to-r hover:from-cyan-50 hover:to-blue-50 transition-all group">
                <svg class="w-5 h-5 text-gray-500 group-hover:text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span class="font-medium text-gray-700 group-hover:text-cyan-600">Kontak</span>
            </a>
        </div>

        <!-- Mobile Login Button -->
        <div class="mt-8">
            <a href="/login" class="block w-full bg-gradient-to-r from-cyan-500 to-blue-500 text-white text-center py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                Login
            </a>
        </div>

        <!-- Mobile Menu Footer -->
        <div class="absolute bottom-6 left-6 right-6">
            <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-2">Butuh bantuan?</p>
                <a href="tel:+628123456789" class="text-cyan-600 font-semibold text-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>



<section class="py-20 bg-gradient-to-b from-cyan-50 to-white min-h-screen">
    <div class="container mx-auto px-4">
        <!-- Header dengan animasi -->
        <div class="text-center mb-12 animate-fade-in">
            <h1 class="text-4xl lg:text-5xl font-bold mb-4 bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                Semua Produk Kami
            </h1>
            <p class="text-gray-600 text-lg">Pilih kategori favorit Anda dan nikmati kesegaran</p>
        </div>
        <div class="max-w-xl mx-auto mb-10 px-4 relative group animate-fade-in" style="animation-delay: 0.1s;">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-6 h-6 text-cyan-500 group-focus-within:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <input type="text"
                    id="searchInput"
                    onkeyup="searchProducts()"
                    placeholder="Cari es dongan, es krim, atau camilan..."
                    class="block w-full pl-12 pr-4 py-4 rounded-full border-2 border-transparent bg-white shadow-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-cyan-500/20 focus:border-cyan-500 transition-all duration-300">

                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-20 group-focus-within:opacity-30 blur-lg transition-opacity duration-300 -z-10"></div>
            </div>
        </div>
        <!-- Filter Kategori dengan counter -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button onclick="filterProducts('all')" class="filter-btn active px-6 py-3 rounded-full font-semibold transition-all duration-300 relative overflow-hidden group">
                <span class="relative z-10 flex items-center gap-2">
                    Semua Produk
                    <span class="badge-count-filter text-xs bg-cyan-600 text-white px-2 py-0.5 rounded-full"><?= count($products) ?></span>
                </span>
            </button>
            <button onclick="filterProducts('1')" class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 relative overflow-hidden group">
                <span class="relative z-10 flex items-center gap-2">
                    Minuman Segar
                    <span class="badge-count-filter text-xs bg-white/50 px-2 py-0.5 rounded-full"><?= count(array_filter($products, fn($p) => $p['category_id'] == 1)) ?></span>
                </span>
            </button>
            <button onclick="filterProducts('2')" class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 relative overflow-hidden group">
                <span class="relative z-10 flex items-center gap-2">
                    Es Krim
                    <span class="badge-count-filter text-xs bg-white/50 px-2 py-0.5 rounded-full"><?= count(array_filter($products, fn($p) => $p['category_id'] == 2)) ?></span>
                </span>
            </button>
            <button onclick="filterProducts('3')" class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 relative overflow-hidden group">
                <span class="relative z-10 flex items-center gap-2">
                    Makanan Ringan
                    <span class="badge-count-filter text-xs bg-white/50 px-2 py-0.5 rounded-full"><?= count(array_filter($products, fn($p) => $p['category_id'] == 3)) ?></span>
                </span>
            </button>
        </div>

        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card shadow-lg rounded-2xl overflow-hidden bg-white transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl relative group" data-category="<?= $product['category_id'] ?>">
                    <!-- Image Container dengan overlay -->
                    <div class="relative overflow-hidden">
                        <!-- Badge Kategori -->
                        <div class="absolute top-3 left-3 z-10 transform transition-transform duration-300 group-hover:scale-110">
                            <?php
                            $categoryBadge = [
                                '1' => ['text' => 'Minuman Segar', 'color' => 'bg-green-500'],
                                '2' => ['text' => 'Es Krim', 'color' => 'bg-blue-500'],
                                '3' => ['text' => 'Makanan Ringan', 'color' => 'bg-orange-500']
                            ];
                            $badge = $categoryBadge[$product['category_id']] ?? ['text' => 'Produk', 'color' => 'bg-gray-500'];
                            ?>
                            <span class="<?= $badge['color'] ?> text-white text-xs px-3 py-1.5 rounded-full font-semibold shadow-lg backdrop-blur-sm bg-opacity-90">
                                <?= $badge['text'] ?>
                            </span>
                        </div>

                        <!-- Tombol Wishlist dengan animasi -->
                        <button onclick="toggleWishlist(<?= $product['id'] ?>, event)" class="wishlist-btn absolute top-3 right-3 z-10 bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg hover:scale-110 active:scale-95 transition-all duration-300">
                            <svg class="w-5 h-5 text-gray-400 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>

                        <!-- Product Image dengan zoom effect -->
                        <?php if ($product['image']): ?>
                            <img src="/uploads/products/<?= $product['image'] ?>"
                                class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="<?= esc($product['name']) ?>"
                                loading="lazy">
                        <?php else: ?>
                            <div class="w-full h-48 bg-gradient-to-br from-cyan-100 to-blue-100 flex items-center justify-center transition-transform duration-700 group-hover:scale-110">
                                <span class="text-gray-400 text-5xl">🍦</span>
                            </div>
                        <?php endif; ?>

                        <!-- Overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2 text-gray-800 line-clamp-1 group-hover:text-cyan-600 transition-colors duration-300">
                            <?= esc($product['name']) ?>
                        </h3>
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                            <?= esc($product['description']) ?>
                        </p>

                        <!-- Price Section -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <?php if (isset($product['original_price']) && $product['original_price'] > $product['price']): ?>
                                    <p class="text-gray-400 text-xs line-through">Rp <?= number_format($product['original_price'], 0, ',', '.') ?></p>
                                <?php endif; ?>
                                <p class="text-cyan-600 font-bold text-xl">
                                    Rp <?= number_format($product['price'], 0, ',', '.') ?>
                                </p>
                            </div>
                            <?php if (isset($product['rating'])): ?>
                                <div class="flex items-center gap-1 bg-yellow-50 px-2 py-1 rounded-lg">
                                    <span class="text-yellow-400 text-sm">⭐</span>
                                    <span class="font-semibold text-gray-700 text-sm"><?= $product['rating'] ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Add to Cart Button dengan loading state -->
                        <form action="/cart/add" method="post" class="w-full" onsubmit="return handleFormSubmit(this, event)">
                            <?= csrf_field() ?>
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="add-to-cart-btn w-full bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white py-3 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center gap-2 shadow-md hover:shadow-xl active:scale-95 relative overflow-hidden group">
                                <!-- Normal state -->
                                <span class="btn-content flex items-center gap-2">
                                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <span>Tambah ke Keranjang</span>
                                </span>
                                <!-- Loading state -->
                                <span class="btn-loading hidden">
                                    <svg class="animate-spin h-5 w-5" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                                <!-- Success state -->
                                <span class="btn-success hidden">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Empty State -->
        <div id="no-products" class="hidden text-center py-20 animate-fade-in">
            <div class="text-6xl mb-6 animate-bounce">😢</div>
            <h3 class="text-2xl font-bold text-gray-700 mb-2">Produk Tidak Ditemukan</h3>
            <p class="text-gray-500 text-lg">Belum ada produk dalam kategori ini</p>
        </div>
    </div>
</section>

<style>
    /* Navbar Styles */
    .nav-link {
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0;
        height: 3px;
        background: linear-gradient(90deg, #06b6d4, #0891b2);
        transition: width 0.3s ease;
        border-radius: 2px;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }

    .btn-ripple::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-ripple:hover::after {
        width: 300px;
        height: 300px;
    }

    .navbar-scrolled {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    /* Mobile Menu */
    .mobile-menu.active {
        transform: translateX(0);
    }

    .backdrop.active {
        opacity: 1;
        pointer-events: auto;
    }

    .cart-badge {
        animation: pulse-badge 2s infinite;
    }

    @keyframes pulse-badge {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    .mobile-menu-item {
        opacity: 0;
        transform: translateX(-20px);
        animation: slideIn 0.3s ease-out forwards;
    }

    .mobile-menu-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    .mobile-menu-item:nth-child(2) {
        animation-delay: 0.15s;
    }

    .mobile-menu-item:nth-child(3) {
        animation-delay: 0.2s;
    }

    .mobile-menu-item:nth-child(4) {
        animation-delay: 0.25s;
    }

    @keyframes slideIn {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Filter Buttons */
    .filter-btn {
        background-color: white;
        color: #0891b2;
        border: 2px solid #e5e7eb;
        position: relative;
    }

    .filter-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #06b6d4, #0891b2);
        opacity: 0;
        transition: opacity 0.3s;
        border-radius: 9999px;
    }

    .filter-btn:hover::before {
        opacity: 0.1;
    }

    .filter-btn:hover {
        border-color: #06b6d4;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(8, 145, 178, 0.2);
    }

    .filter-btn.active {
        background: linear-gradient(135deg, #06b6d4, #0891b2);
        color: white;
        border-color: #0891b2;
        box-shadow: 0 8px 16px rgba(8, 145, 178, 0.3);
    }

    .filter-btn.active .badge-count-filter {
        background-color: rgba(255, 255, 255, 0.3) !important;
        color: white !important;
    }

    /* Text Clamp */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Animations */
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out;
    }

    @keyframes slide-in-right {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slide-out-right {
        from {
            transform: translateX(0);
            opacity: 1;
        }

        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    @keyframes bounce-in {
        0% {
            transform: scale(0.3);
            opacity: 0;
        }

        50% {
            transform: scale(1.05);
        }

        70% {
            transform: scale(0.9);
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes pulse-success {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    /* Toast Notification */
    .toast-notification {
        animation: slide-in-right 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        backdrop-filter: blur(10px);
    }

    .toast-notification.hiding {
        animation: slide-out-right 0.3s ease-in-out forwards;
    }

    /* Wishlist Button */
    .wishlist-btn.liked svg {
        fill: #ef4444;
        stroke: #ef4444;
        animation: bounce-in 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* Product Card Stagger Animation */
    .product-card {
        animation: fade-in 0.6s ease-out backwards;
    }

    .product-card:nth-child(1) {
        animation-delay: 0.05s;
    }

    .product-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .product-card:nth-child(3) {
        animation-delay: 0.15s;
    }

    .product-card:nth-child(4) {
        animation-delay: 0.2s;
    }

    .product-card:nth-child(5) {
        animation-delay: 0.25s;
    }

    .product-card:nth-child(6) {
        animation-delay: 0.3s;
    }

    .product-card:nth-child(7) {
        animation-delay: 0.35s;
    }

    .product-card:nth-child(8) {
        animation-delay: 0.4s;
    }

    /* Smooth transitions for filtering */
    .product-card.hiding {
        animation: fade-out 0.3s ease-out forwards;
    }

    @keyframes fade-out {
        to {
            opacity: 0;
            transform: scale(0.9);
        }
    }

    /* Button Loading State */
    .add-to-cart-btn.loading {
        pointer-events: none;
    }

    .add-to-cart-btn.success {
        background: linear-gradient(135deg, #10b981, #059669) !important;
    }

    /* Skeleton Loading (optional) */
    @keyframes skeleton-loading {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }

    .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: skeleton-loading 1.5s infinite;
    }

    /* Scrollbar Styling */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #06b6d4, #0891b2);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #0891b2, #0e7490);
    }
</style>

<script>
    // ===== NAVBAR FUNCTIONS =====

    // Toggle Mobile Menu
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const backdrop = document.getElementById('backdrop');
        const hamburger = document.getElementById('hamburger');
        const closeIcon = document.getElementById('close-icon');

        const isOpen = menu.classList.contains('active');

        if (isOpen) {
            menu.classList.remove('active');
            backdrop.classList.remove('active');
            document.body.style.overflow = 'auto';
        } else {
            menu.classList.add('active');
            backdrop.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        hamburger.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }

    // Add shadow to navbar on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 20) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });

    // Update cart badge from localStorage
    function updateCartBadge() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        const badge = document.querySelector('.cart-badge');

        if (badge) {
            badge.textContent = totalItems;
            if (totalItems > 0) {
                badge.classList.remove('hidden');
            } else {
                badge.classList.add('hidden');
            }
        }
    }

    // Close mobile menu when clicking on a link
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.mobile-menu-item').forEach(item => {
            item.addEventListener('click', function() {
                if (window.innerWidth < 1024) {
                    toggleMobileMenu();
                }
            });
        });
    });

    // ===== PRODUCT FILTER FUNCTIONS =====

    function filterProducts(category) {
        const cards = document.querySelectorAll('.product-card');
        const buttons = document.querySelectorAll('.filter-btn');
        const noProducts = document.getElementById('no-products');
        let visibleCount = 0;

        // Update button states
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Filter products
        cards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide no products message
        if (visibleCount === 0) {
            noProducts.classList.remove('hidden');
        } else {
            noProducts.classList.add('hidden');
        }
    }

    // Fungsi wishlist
    function toggleWishlist(productId) {
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const index = wishlist.indexOf(productId);

        const button = event.target.closest('button');
        const icon = button.querySelector('svg');

        if (index > -1) {
            wishlist.splice(index, 1);
            icon.classList.remove('text-red-500', 'fill-red-500');
            icon.classList.add('text-gray-400');
        } else {
            wishlist.push(productId);
            icon.classList.remove('text-gray-400');
            icon.classList.add('text-red-500', 'fill-red-500');
        }

        localStorage.setItem('wishlist', JSON.stringify(wishlist));
    }

    // Load wishlist states saat halaman dimuat
    function loadWishlistStates() {
        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        document.querySelectorAll('[onclick^="toggleWishlist"]').forEach(button => {
            const productId = parseInt(button.getAttribute('onclick').match(/\d+/)[0]);
            if (wishlist.includes(productId)) {
                const icon = button.querySelector('svg');
                icon.classList.remove('text-gray-400');
                icon.classList.add('text-red-500', 'fill-red-500');
            }
        });
    }

    // Initialize saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        loadWishlistStates();
        updateCartBadge(); // Update navbar cart badge

        // Close mobile menu on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                const menu = document.getElementById('mobile-menu');
                const backdrop = document.getElementById('backdrop');
                if (menu.classList.contains('active')) {
                    menu.classList.remove('active');
                    backdrop.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            }
        });
    });
    function searchProducts() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const cards = document.querySelectorAll('.product-card');
        const noProducts = document.getElementById('no-products');
        let visibleCount = 0;

        // Reset tombol filter kategori menjadi 'Semua Produk' agar pencarian menyeluruh
        // (Opsional: Hapus 2 baris di bawah jika ingin mencari HANYA di kategori yang sedang aktif)
        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
        document.querySelector('.filter-btn[onclick="filterProducts(\'all\')"]').classList.add('active');

        cards.forEach(card => {
            // Ambil nama produk dari elemen h3 di dalam card
            const productName = card.querySelector('h3').textContent || card.querySelector('h3').innerText;
            
            // Cek apakah nama produk mengandung teks pencarian
            if (productName.toLowerCase().indexOf(filter) > -1) {
                card.style.display = "block";
                // Tambahkan animasi masuk agar halus
                card.classList.remove('hiding'); 
                card.style.animation = 'fade-in 0.5s ease';
                visibleCount++;
            } else {
                card.style.display = "none";
            }
        });

        // Tampilkan pesan jika tidak ada hasil
        if (visibleCount === 0) {
            noProducts.classList.remove('hidden');
            // Ubah teks pesan error sedikit agar sesuai konteks pencarian
            noProducts.querySelector('h3').textContent = "Yah, Produk Tidak Ditemukan";
            noProducts.querySelector('p').textContent = `Tidak ada hasil untuk "${input.value}"`;
        } else {
            noProducts.classList.add('hidden');
        }
    }
</script>

<style>
    @keyframes slide-in {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slide-out {
        from {
            transform: translateX(0);
            opacity: 1;
        }

        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    .animate-slide-in {
        animation: slide-in 0.3s ease-in-out;
    }
</style>

<footer class="glass-dark text-white py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-900 opacity-90"></div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan" class="w-12 h-12 rounded-full bg-white p-2">
                    <div>
                        <h3 class="text-2xl font-bold">Es Dongan</h3>
                        <p class="text-sm text-gray-300">Segar & Berkualitas</p>
                    </div>
                </div>
                <p class="text-gray-300 mb-4 leading-relaxed">
                    Menyediakan berbagai pilihan es segar berkualitas premium untuk keluarga Indonesia.
                    Dipercaya sejak 2020 dengan ribuan pelanggan puas.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-4">Menu Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-300 hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="#products" class="text-gray-300 hover:text-white transition-colors">Produk</a></li>
                    <li><a href="#about" class="text-gray-300 hover:text-white transition-colors">Tentang Kami</a></li>
                    <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors">Kontak</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div>
                <h4 class="text-lg font-bold mb-4">Dukungan</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Cara Pemesanan</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Kebijakan Privasi</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-300 text-sm mb-4 md:mb-0">
                &copy; 2025 Es Dongan. All Rights Reserved. Made with ❤️ By Heykel Prayogi Timanta G.s
            </p>
            <div class="flex items-center gap-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png" alt="Visa" class="h-8 opacity-70">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/200px-MasterCard_Logo.svg.png" alt="Mastercard" class="h-8 opacity-70">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_gopay.svg/200px-Logo_gopay.svg.png" alt="GoPay" class="h-8 opacity-70">
            </div>
        </div>
    </div>
</footer>
<?= $this->endSection() ?>