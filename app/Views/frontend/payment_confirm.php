<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - Toko Es Dongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-card { background: white; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .copy-btn.copied { background: #10b981 !important; color: white !important; }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-600">Es Dongan</span>
            </div>
            <span class="text-sm font-medium text-gray-500">ID Pesanan: #<?= $order['order_number'] ?></span>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8 max-w-4xl">
        
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Menunggu Pembayaran</h1>
            <p class="text-gray-600 mt-2">Selesaikan pembayaran Anda sebelum pesanan dibatalkan otomatis.</p>
            <div class="mt-4 text-3xl font-bold text-cyan-600">
                Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="glass-card rounded-2xl p-6 h-fit">
                <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Instruksi Pembayaran</h2>

                <?php if ($order['payment_status'] == 'transfer'): ?>
                    <p class="text-sm text-gray-600 mb-4">Silakan transfer sesuai nominal ke salah satu rekening di bawah ini:</p>
                    
                    <div class="space-y-4">
                        <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                            <div class="flex justify-between items-center mb-1">
                                <span class="font-bold text-blue-800">Bank Mandiri</span>
                                <img src="/uploads/Mandiri.png" alt="Mandiri" class="h-4 object-contain">
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-mono text-lg font-bold text-gray-700">1370-0123-4567-89</span>
                                <button onclick="copyToClipboard('13700123456789', this)" class="text-xs bg-white border border-blue-200 px-3 py-1 rounded-lg hover:bg-blue-100 transition copy-btn">Salin</button>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">a.n. Toko Es Dongan</div>
                        </div>

                        <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                            <div class="flex justify-between items-center mb-1">
                                <span class="font-bold text-blue-800">Bank BCA</span>
                                <span class="text-xs font-bold text-blue-600">BCA</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-mono text-lg font-bold text-gray-700">8765-4321-09</span>
                                <button onclick="copyToClipboard('8765432109', this)" class="text-xs bg-white border border-blue-200 px-3 py-1 rounded-lg hover:bg-blue-100 transition copy-btn">Salin</button>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">a.n. Toko Es Dongan</div>
                        </div>
                    </div>
                
                <?php elseif ($order['payment_method'] == 'qris'): ?>
                    <div class="text-center">
                        <p class="text-sm text-gray-600 mb-4">Scan QR Code menggunakan aplikasi E-Wallet Anda (Gopay/OVO/Dana/ShopeePay):</p>
                        <div class="bg-white p-4 border rounded-xl inline-block shadow-sm">
                            <img src="/uploads/Pembayaran Es dongan.png" alt="QRIS Code" class="w-48 h-48 object-contain mx-auto">
                        </div>
                        <div class="flex justify-center gap-2 mt-4">
                             <span class="text-[10px] bg-gray-100 px-2 py-1 rounded">GoPay</span>
                             <span class="text-[10px] bg-gray-100 px-2 py-1 rounded">OVO</span>
                             <span class="text-[10px] bg-gray-100 px-2 py-1 rounded">Dana</span>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mt-6 p-3 bg-yellow-50 rounded-lg text-xs text-yellow-800 flex gap-2">
                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <p>Penting: Pastikan nominal transfer sesuai hingga 3 digit terakhir agar verifikasi berjalan otomatis.</p>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-6 h-fit">
                <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Konfirmasi Pembayaran</h2>
                
                <form action="/orders/upload-proof" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="order_id" value="<?= $order['id'] ?>">

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pengirim (Rekening)</label>
                        <input type="text" name="sender_name" required placeholder="Contoh: Heykel Prayogi" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:outline-none text-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Bukti Transfer</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:bg-gray-50 transition relative cursor-pointer" id="drop-area">
                            <input type="file" name="payment_proof" id="file-input" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required onchange="previewImage(event)">
                            
                            <div id="preview-container" class="hidden">
                                <img id="preview-img" src="#" alt="Preview" class="max-h-48 mx-auto rounded-lg shadow-sm">
                                <p class="text-xs text-green-600 mt-2 font-medium">File terpilih. Klik ganti jika salah.</p>
                            </div>

                            <div id="upload-placeholder">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">Klik untuk upload foto bukti</p>
                                <p class="mt-1 text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-cyan-600 to-blue-600 text-white font-bold py-3 rounded-xl shadow hover:shadow-lg transition-all">
                        Saya Sudah Transfer
                    </button>
                    
                    <a href="/" class="block text-center text-sm text-gray-500 mt-4 hover:text-cyan-600">Kembali ke Beranda</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi Salin Rekening
        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const originalText = btn.textContent;
                btn.textContent = 'Tersalin!';
                btn.classList.add('copied');
                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.classList.remove('copied');
                }, 2000);
            });
        }

        // Fungsi Preview Image
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('preview-container').classList.remove('hidden');
                    document.getElementById('upload-placeholder').classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>