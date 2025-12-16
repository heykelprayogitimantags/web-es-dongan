<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Toko Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-effect { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.5); }
        .gradient-text { background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .input-focus:focus { box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.15); border-color: #06b6d4; }
        .radio-custom:checked+label { border-color: #06b6d4; background-color: #ecfeff; }
        .payment-details { display: none; overflow: hidden; } /* Hidden by default via CSS */
        .payment-details.active { display: block; animation: fadeIn 0.4s ease-out; }
        @keyframes fadeIn { from { opacity: 0; max-height: 0; } to { opacity: 1; max-height: 500px; } }
        /* Scrollbar custom */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: linear-gradient(180deg, #06b6d4, #3b82f6); border-radius: 10px; }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-50 via-cyan-50 to-purple-50 min-h-screen">
    
    <nav class="glass-effect sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-xl font-bold gradient-text">Es Dongan</a>
            <a href="/cart" class="text-gray-600 hover:text-cyan-600 font-medium">Kembali</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Checkout</h1>
            <p class="text-gray-600">Selesaikan pesanan Anda</p>
        </div>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 shadow-sm">
                <p class="font-bold">Periksa kembali inputan Anda:</p>
                <ul class="list-disc list-inside text-sm">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 shadow-sm">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    
                    <form action="/checkout/process" method="post">
                        <?= csrf_field(); ?> <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                            <span class="bg-cyan-100 text-cyan-600 p-2 rounded-lg mr-3">1</span>
                            Data Pengiriman
                        </h2>

                        <div class="space-y-4 mb-8">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Penerima</label>
                                <input type="text" value="<?= session()->get('name') ?>" disabled
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 text-gray-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">No. Telepon / WhatsApp <span class="text-red-500">*</span></label>
                                <input type="number" name="phone" required value="<?= old('phone') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 transition-all"
                                    placeholder="Contoh: 081234567890">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap <span class="text-red-500">*</span></label>
                                <textarea name="shipping_address" rows="3" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 transition-all resize-none"
                                    placeholder="Nama Jalan, Nomor Rumah, RT/RW, Kelurahan..."><?= old('shipping_address') ?></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Catatan Tambahan (Opsional)</label>
                                <input type="text" name="notes" value="<?= old('notes') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 transition-all"
                                    placeholder="Pesan untuk penjual/kurir">
                            </div>
                        </div>

                        <div class="border-t pt-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                <span class="bg-green-100 text-green-600 p-2 rounded-lg mr-3">2</span>
                                Metode Pembayaran
                            </h2>

                            <div class="space-y-3">
                                <input type="radio" name="payment_method" value="cod" id="cod" class="hidden radio-custom" <?= old('payment_method') == 'cod' ? 'checked' : '' ?>>
                                <label for="cod" class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer transition-all hover:border-cyan-300">
                                    <div class="w-5 h-5 rounded-full border-2 border-gray-400 flex items-center justify-center mr-3">
                                        <div class="w-2.5 h-2.5 rounded-full bg-cyan-600 hidden check-circle"></div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-bold text-gray-800">Cash on Delivery (COD)</div>
                                        <div class="text-sm text-gray-500">Bayar tunai saat pesanan sampai</div>
                                    </div>
                                </label>

                                <input type="radio" name="payment_method" value="transfer" id="transfer" class="hidden radio-custom" <?= old('payment_method') == 'transfer' ? 'checked' : '' ?>>
                                <label for="transfer" class="flex flex-col p-4 border-2 border-gray-200 rounded-xl cursor-pointer transition-all hover:border-cyan-300">
                                    <div class="flex items-center">
                                        <div class="w-5 h-5 rounded-full border-2 border-gray-400 flex items-center justify-center mr-3">
                                            <div class="w-2.5 h-2.5 rounded-full bg-cyan-600 hidden check-circle"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-bold text-gray-800">Transfer Bank</div>
                                            <div class="text-sm text-gray-500">BCA, Mandiri, BRI (Cek Otomatis)</div>
                                        </div>
                                    </div>
                                    <div id="info-transfer" class="payment-details mt-3 ml-8 text-sm text-blue-600 bg-blue-50 p-3 rounded-lg">
                                        <p>Anda akan diarahkan ke halaman konfirmasi untuk melihat nomor rekening dan upload bukti transfer.</p>
                                    </div>
                                </label>

                                <input type="radio" name="payment_method" value="qris" id="qris" class="hidden radio-custom" <?= old('payment_method') == 'qris' ? 'checked' : '' ?>>
                                <label for="qris" class="flex flex-col p-4 border-2 border-gray-200 rounded-xl cursor-pointer transition-all hover:border-cyan-300">
                                    <div class="flex items-center">
                                        <div class="w-5 h-5 rounded-full border-2 border-gray-400 flex items-center justify-center mr-3">
                                            <div class="w-2.5 h-2.5 rounded-full bg-cyan-600 hidden check-circle"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-bold text-gray-800">QRIS (GoPay/OVO/Dana)</div>
                                            <div class="text-sm text-gray-500">Scan QR Code Instan</div>
                                        </div>
                                    </div>
                                    <div id="info-qris" class="payment-details mt-3 ml-8 text-sm text-purple-600 bg-purple-50 p-3 rounded-lg">
                                        <p>Anda akan diarahkan ke halaman pembayaran untuk memindai QR Code.</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button type="submit" 
                                class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.01] transition-all transform duration-200">
                                Buat Pesanan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Ringkasan Pesanan</h3>
                    
                    <div class="space-y-3 max-h-64 overflow-y-auto custom-scrollbar mb-4 pr-1">
                        <?php foreach ($cart as $item): ?>
                            <div class="flex justify-between items-start text-sm">
                                <div>
                                    <div class="font-medium text-gray-800"><?= esc($item['name']) ?></div>
                                    <div class="text-gray-500 text-xs"><?= $item['quantity'] ?> x Rp <?= number_format($item['price'], 0, ',', '.') ?></div>
                                </div>
                                <div class="font-semibold text-gray-700">
                                    Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="space-y-2 border-t pt-4 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Biaya Layanan</span>
                            <span class="text-green-600 font-medium">Gratis</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 mt-2 border-t border-dashed">
                            <span class="font-bold text-gray-800 text-base">Total Tagihan</span>
                            <span class="font-bold text-xl text-cyan-600">Rp <?= number_format($total, 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="payment_method"]');
            
            // Fungsi untuk update tampilan radio button
            function updateRadioUI() {
                // Reset semua UI
                document.querySelectorAll('.check-circle').forEach(el => el.classList.add('hidden'));
                document.querySelectorAll('.payment-details').forEach(el => el.classList.remove('active'));
                
                // Set UI yang dipilih
                radios.forEach(radio => {
                    const label = document.querySelector(`label[for="${radio.id}"]`);
                    const circle = label.querySelector('.check-circle');
                    
                    if (radio.checked) {
                        circle.classList.remove('hidden');
                        
                        // Tampilkan info tambahan jika ada
                        if (radio.value === 'transfer') {
                            document.getElementById('info-transfer').classList.add('active');
                        } else if (radio.value === 'qris') {
                            document.getElementById('info-qris').classList.add('active');
                        }
                    }
                });
            }

            // Event Listener saat ganti pilihan
            radios.forEach(radio => {
                radio.addEventListener('change', updateRadioUI);
            });

            // Jalankan sekali saat load (untuk handle 'old' input jika ada error validasi)
            updateRadioUI();
        });
    </script>
</body>
</html>