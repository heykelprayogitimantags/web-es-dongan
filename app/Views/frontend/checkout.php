<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Toko Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        
        .glass-effect { 
            background: rgba(255, 255, 255, 0.98); 
            backdrop-filter: blur(20px); 
            border: 1px solid rgba(255, 255, 255, 0.5); 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-text { 
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
            background-clip: text; 
        }
        
        .input-focus:focus { 
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.15); 
            border-color: #06b6d4; 
        }
        
        .radio-custom:checked + label { 
            border-color: #06b6d4; 
            background: linear-gradient(135deg, #ecfeff 0%, #f0f9ff 100%);
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.2);
        }
        
        .payment-details { 
            display: none; 
            overflow: hidden; 
        }
        
        .payment-details.active { 
            display: block; 
            animation: slideDown 0.3s ease-out; 
        }
        
        @keyframes slideDown { 
            from { 
                opacity: 0; 
                transform: translateY(-10px); 
            } 
            to { 
                opacity: 1; 
                transform: translateY(0); 
            } 
        }
        
        /* Scrollbar custom */
        .custom-scrollbar::-webkit-scrollbar { 
            width: 8px; 
        }
        
        .custom-scrollbar::-webkit-scrollbar-track { 
            background: #f1f5f9; 
            border-radius: 10px; 
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb { 
            background: linear-gradient(180deg, #06b6d4, #3b82f6); 
            border-radius: 10px; 
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { 
            background: linear-gradient(180deg, #0891b2, #2563eb); 
        }

        /* Button hover effect */
        .btn-primary {
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
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

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        /* Card hover effect */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Step indicator */
        .step-badge {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.125rem;
        }

        /* Alert animation */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .alert-animate {
            animation: shake 0.5s ease;
        }

        /* Navbar enhancement */
        .nav-shadow {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 via-cyan-50 to-purple-50 min-h-screen">
    
    <!-- NAVBAR FIXED -->
    <nav class="glass-effect sticky top-0 z-50 nav-shadow">
        <div class="container mx-auto px-4 lg:px-6">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold gradient-text">Es Dongan</h1>
                        <p class="text-xs text-gray-500">Segar & Berkualitas</p>
                    </div>
                </a>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-4">
                    <a href="/cart" class="flex items-center space-x-2 px-4 py-2 text-gray-600 hover:text-cyan-600 font-medium rounded-lg hover:bg-cyan-50 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="hidden sm:inline">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-4 py-8 lg:py-12 max-w-7xl">
        
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-800">Checkout</h1>
                    <p class="text-gray-600">Selesaikan pesanan Anda dengan mudah</p>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="mt-6 flex items-center justify-center space-x-2">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-cyan-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg">1</div>
                    <span class="ml-2 text-sm font-medium text-gray-700 hidden sm:inline">Keranjang</span>
                </div>
                <div class="w-16 h-1 bg-cyan-500 rounded"></div>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-cyan-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg">2</div>
                    <span class="ml-2 text-sm font-medium text-cyan-600 hidden sm:inline">Checkout</span>
                </div>
                <div class="w-16 h-1 bg-gray-300 rounded"></div>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-300 text-gray-500 rounded-full flex items-center justify-center font-bold">3</div>
                    <span class="ml-2 text-sm font-medium text-gray-500 hidden sm:inline">Selesai</span>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-6 shadow-lg alert-animate">
                <div class="flex items-start">
                    <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <p class="font-bold mb-1">Periksa kembali inputan Anda:</p>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-xl mb-6 shadow-lg alert-animate">
                <div class="flex items-start">
                    <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <p><?= session()->getFlashdata('error') ?></p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
            
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-6 lg:p-8 border border-gray-100 card-hover">
                    
                    <form action="/checkout/process" method="post" id="checkoutForm">
                        <?= csrf_field(); ?>
                        
                        <!-- Section 1: Shipping Data -->
                        <div class="mb-8">
                            <h2 class="text-xl lg:text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <span class="step-badge bg-gradient-to-br from-cyan-500 to-cyan-600 text-white rounded-xl mr-3 shadow-lg">1</span>
                                Data Pengiriman
                            </h2>

                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Penerima</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" value="<?= session()->get('name') ?>" disabled
                                            class="w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl bg-gray-50 text-gray-500 font-medium">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        No. Telepon / WhatsApp <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                        <input type="number" name="phone" required value="<?= old('phone') ?>"
                                            class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                                            placeholder="Contoh: 081234567890">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Alamat Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute top-4 left-0 pl-4 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <textarea name="shipping_address" rows="4" required
                                            class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all resize-none"
                                            placeholder="Nama Jalan, Nomor Rumah, RT/RW, Kelurahan, Kecamatan..."><?= old('shipping_address') ?></textarea>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Catatan Tambahan <span class="text-gray-400 font-normal">(Opsional)</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" name="notes" value="<?= old('notes') ?>"
                                            class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all"
                                            placeholder="Contoh: Antar sebelum jam 5 sore">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 2: Payment Method -->
                        <div class="border-t pt-8">
                            <h2 class="text-xl lg:text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <span class="step-badge bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl mr-3 shadow-lg">2</span>
                                Metode Pembayaran
                            </h2>

                            <div class="space-y-4">
                                <!-- COD Option -->
                                <input type="radio" name="payment_method" value="cod" id="cod" class="hidden radio-custom" <?= old('payment_method') == 'cod' ? 'checked' : '' ?>>
                                <label for="cod" class="flex items-center p-5 border-2 border-gray-200 rounded-xl cursor-pointer transition-all hover:border-cyan-300 hover:shadow-md">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-400 flex items-center justify-center mr-4">
                                        <div class="w-3 h-3 rounded-full bg-cyan-600 hidden check-circle"></div>
                                    </div>
                                    <div class="flex items-center flex-1">
                                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center mr-4 shadow-md">
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-bold text-gray-800 text-lg">Cash on Delivery (COD)</div>
                                            <div class="text-sm text-gray-500">Bayar tunai saat pesanan sampai</div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Transfer Option -->
                                <input type="radio" name="payment_method" value="transfer" id="transfer" class="hidden radio-custom" <?= old('payment_method') == 'transfer' ? 'checked' : '' ?>>
                                <label for="transfer" class="flex flex-col p-5 border-2 border-gray-200 rounded-xl cursor-pointer transition-all hover:border-cyan-300 hover:shadow-md">
                                    <div class="flex items-center">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-400 flex items-center justify-center mr-4">
                                            <div class="w-3 h-3 rounded-full bg-cyan-600 hidden check-circle"></div>
                                        </div>
                                        <div class="flex items-center flex-1">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mr-4 shadow-md">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <div class="font-bold text-gray-800 text-lg">Transfer Bank</div>
                                                <div class="text-sm text-gray-500">BCA, Mandiri, BRI (Verifikasi Otomatis)</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="info-transfer" class="payment-details mt-4 ml-10 text-sm">
                                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-lg border border-blue-200">
                                            <div class="flex items-start">
                                                <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-blue-700">Anda akan diarahkan ke halaman konfirmasi untuk melihat nomor rekening dan upload bukti transfer.</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- QRIS Option -->
                                <input type="radio" name="payment_method" value="qris" id="qris" class="hidden radio-custom" <?= old('payment_method') == 'qris' ? 'checked' : '' ?>>
                                <label for="qris" class="flex flex-col p-5 border-2 border-gray-200 rounded-xl cursor-pointer transition-all hover:border-cyan-300 hover:shadow-md">
                                    <div class="flex items-center">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-400 flex items-center justify-center mr-4">
                                            <div class="w-3 h-3 rounded-full bg-cyan-600 hidden check-circle"></div>
                                        </div>
                                        <div class="flex items-center flex-1">
                                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4 shadow-md">
                                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <div class="font-bold text-gray-800 text-lg">QRIS Payment</div>
                                                <div class="text-sm text-gray-500">GoPay, OVO, Dana, ShopeePay</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="info-qris" class="payment-details mt-4 ml-10 text-sm">
                                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-4 rounded-lg border border-purple-200">
                                            <div class="flex items-start">
                                                <svg class="w-5 h-5 text-purple-600 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="text-purple-700">Anda akan diarahkan ke halaman pembayaran untuk memindai QR Code dan menyelesaikan transaksi.</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-8">
                            <button type="submit" 
                                class="btn-primary w-full bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] transition-all transform duration-300 relative overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Buat Pesanan Sekaranggg
                                </span>
                            </button>
                            <p class="text-center text-sm text-gray-500 mt-3">Dengan melanjutkan, Anda menyetujui syarat dan ketentuan kami</p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24 border border-gray-100 card-hover">
                    <div class="flex items-center justify-between mb-5 pb-4 border-b-2 border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Ringkasan Pesanan
                        </h3>
                        <span class="bg-cyan-100 text-cyan-700 text-xs font-bold px-3 py-1 rounded-full"><?= count($cart) ?> Item</span>
                    </div>
                    
                    <div class="space-y-4 max-h-80 overflow-y-auto custom-scrollbar mb-5 pr-2">
                        <?php foreach ($cart as $item): ?>
                            <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-lg flex items-center justify-center flex-shrink-0 shadow-md">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="font-semibold text-gray-800 text-sm truncate"><?= esc($item['name']) ?></div>
                                    <div class="text-gray-500 text-xs mt-1">
                                        <span class="font-medium"><?= $item['quantity'] ?>x</span> @ Rp <?= number_format($item['price'], 0, ',', '.') ?>
                                    </div>
                                    <div class="font-bold text-cyan-600 text-sm mt-1">
                                        Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="space-y-3 border-t-2 border-gray-100 pt-5">
                        <div class="flex justify-between text-gray-600 text-sm">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                Subtotal
                            </span>
                            <span class="font-semibold text-gray-800">Rp <?= number_format($total, 0, ',', '.') ?></span>
                        </div>
                        <div class="flex justify-between text-gray-600 text-sm">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Biaya Layanan
                            </span>
                            <span class="text-green-600 font-bold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Gratis
                            </span>
                        </div>
                        <div class="flex justify-between items-center pt-4 mt-4 border-t-2 border-dashed border-gray-200">
                            <div>
                                <span class="text-gray-600 text-xs block">Total Pembayaran</span>
                                <span class="font-bold text-gray-800 text-lg">Total Tagihan</span>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-2xl bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                                    Rp <?= number_format($total, 0, ',', '.') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Badge -->
                    <div class="mt-5 pt-5 border-t border-gray-100">
                        <div class="flex items-center justify-center space-x-2 text-xs text-gray-500">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Transaksi Aman & Terpercaya</span>
                        </div>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl shadow-lg p-5 mt-6 border border-cyan-100">
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 mb-1">Butuh Bantuan?</h4>
                            <p class="text-sm text-gray-600 mb-3">Tim kami siap membantu Anda</p>
                            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center text-sm font-semibold text-cyan-600 hover:text-cyan-700 transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"></path>
                                </svg>
                                Chat WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="relative mt-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-cyan-900"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-500 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="/uploads/Logo Es Dongan.png" alt="Es Dongan" class="w-12 h-12 rounded-full bg-white p-2 shadow-lg">
                        <div>
                            <h3 class="text-2xl font-bold text-white">Es Dongan</h3>
                            <p class="text-sm text-gray-300">Segar & Berkualitas</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4 leading-relaxed">
                        Menyediakan berbagai pilihan es segar berkualitas premium untuk keluarga Indonesia.
                        Dipercaya sejak 2020 dengan ribuan pelanggan puas.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold text-white mb-4">Menu Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-300 hover:text-white transition-colors hover:pl-2 inline-block">Beranda</a></li>
                        <li><a href="#products" class="text-gray-300 hover:text-white transition-colors hover:pl-2 inline-block">Produk</a></li>
                        <li><a href="#about" class="text-gray-300 hover:text-white transition-colors hover:pl-2 inline-block">Tentang Kami</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors hover:pl-2 inline-block">Kontak</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-lg font-bold text-white mb-4">Dukungan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors hover:pl-2 inline-block">FAQ</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors hover:pl-2 inline-block">Cara Pemesanan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors hover:pl-2 inline-block">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors hover:pl-2 inline-block">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-300 text-sm mb-4 md:mb-0">
                    &copy; 2025 Es Dongan. All Rights Reserved. Made with ❤️ By Heykel Prayogi Timanta G.s
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png" alt="Visa" class="h-8 opacity-70 hover:opacity-100 transition-opacity">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/200px-MasterCard_Logo.svg.png" alt="Mastercard" class="h-8 opacity-70 hover:opacity-100 transition-opacity">
                    <div class="bg-white rounded-lg p-2.5 md:p-3 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <img src="/uploads/Mandiri.png" alt="Mandiri" class="h-6 md:h-8 opacity-70 hover:opacity-100 transition-opacity">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="payment_method"]');
            const form = document.getElementById('checkoutForm');
            
            // Function to update radio button UI
            function updateRadioUI() {
                // Reset all UI
                document.querySelectorAll('.check-circle').forEach(el => el.classList.add('hidden'));
                document.querySelectorAll('.payment-details').forEach(el => el.classList.remove('active'));
                
                // Set selected UI
                radios.forEach(radio => {
                    const label = document.querySelector(`label[for="${radio.id}"]`);
                    const circle = label.querySelector('.check-circle');
                    
                    if (radio.checked) {
                        circle.classList.remove('hidden');
                        
                        // Show additional info if exists
                        if (radio.value === 'transfer') {
                            document.getElementById('info-transfer').classList.add('active');
                        } else if (radio.value === 'qris') {
                            document.getElementById('info-qris').classList.add('active');
                        }
                    }
                });
            }

            // Event listener for radio change
            radios.forEach(radio => {
                radio.addEventListener('change', updateRadioUI);
            });

            // Run once on load (to handle 'old' input if validation error)
            updateRadioUI();

            // Form validation
            form.addEventListener('submit', function(e) {
                const phone = document.querySelector('input[name="phone"]').value;
                const address = document.querySelector('textarea[name="shipping_address"]').value;
                const paymentMethod = document.querySelector('input[name="payment_method"]:checked');

                if (!phone || !address || !paymentMethod) {
                    e.preventDefault();
                    alert('Mohon lengkapi semua data yang diperlukan!');
                    return false;
                }

                // Phone validation (basic)
                if (phone.length < 10) {
                    e.preventDefault();
                    alert('Nomor telepon tidak valid!');
                    return false;
                }
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>