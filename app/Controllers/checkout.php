<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Checkout extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;
    
    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
    }
    
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        $cart = session()->get('cart');
        
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Keranjang belanja kosong!');
        }
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        $data = [
            'title' => 'Checkout',
            'cart' => $cart,
            'total' => $total
        ];
        
        return view('frontend/checkout', $data);
    }
    
    public function process()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        // 1. PERBAIKAN VALIDASI: Tambahkan 'qris' ke dalam in_list
        $rules = [
            'phone' => [
                'rules' => 'required|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi',
                    'min_length' => 'Nomor telepon minimal 10 digit',
                    'max_length' => 'Nomor telepon maksimal 15 digit'
                ]
            ],
            'shipping_address' => [
                'rules' => 'required|min_length[10]', // Saya kurangi jadi 10 biar tidak terlalu ketat saat testing
                'errors' => [
                    'required' => 'Alamat pengiriman harus diisi',
                    'min_length' => 'Alamat terlalu pendek'
                ]
            ],
            'payment_method' => [
                'rules' => 'required|in_list[cod,transfer,qris]', // TAMBAHKAN qris DI SINI
                'errors' => [
                    'required' => 'Metode pembayaran harus dipilih',
                    'in_list' => 'Metode pembayaran tidak valid'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $cart = session()->get('cart');
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Keranjang belanja kosong!');
        }
        
        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        $orderNumber = 'ORD-' . date('Ymd') . '-' . rand(1000, 9999);
        $paymentMethod = $this->request->getPost('payment_method');
        
        // Tentukan status pembayaran awal
        // Jika COD, status unpaid tapi order diproses. Jika Transfer/QRIS, status unpaid menunggu upload.
        $paymentStatus = 'unpaid'; 

        // 2. DATABASE TRANSACTION: Agar data konsisten (Order & Item masuk bersamaan)
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $orderData = [
                'user_id' => session()->get('user_id'), // Pastikan session ini namanya benar
                'order_number' => $orderNumber,
                'customer_name' => session()->get('name'),
                'customer_email' => session()->get('email'),
                'phone' => $this->request->getPost('phone'),
                'shipping_address' => $this->request->getPost('shipping_address'),
                'notes' => $this->request->getPost('notes'),
                'payment_method' => $paymentMethod,
                'payment_status' => $paymentStatus, // Pastikan kolom ini ada di database kamu
                'total_amount' => $total,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $orderId = $this->orderModel->insert($orderData);
            
            foreach ($cart as $item) {
                $this->orderItemModel->insert([
                    'order_id' => $orderId,
                    'product_id' => $item['id'], // Pastikan key 'id' ada di array session cart
                    'product_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity']
                ]);
            }

            $db->transComplete(); // Selesai Transaksi

            if ($db->transStatus() === false) {
                // Jika gagal simpan ke database
                return redirect()->back()->withInput()->with('error', 'Gagal memproses pesanan. Database Error.');
            }

            // Hapus cart
            session()->remove('cart');

            // 3. LOGIKA REDIRECT: Pisahkan flow COD dan Transfer/QRIS
            
            if ($paymentMethod == 'cod') {
                // Jika COD, langsung ke halaman Sukses
                return redirect()->to("/orders/success/$orderId");
            } else {
                // Jika Transfer atau QRIS, ke halaman Konfirmasi Pembayaran (Upload Bukti)
                return redirect()->to("/orders/payment/$orderId");
            }

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    // Halaman Sukses (Khusus COD atau setelah lunas)
    public function success($orderId)
    {
        $order = $this->orderModel->find($orderId);
        
        if (!$order || $order['user_id'] != session()->get('user_id')) {
            return redirect()->to('/')->with('error', 'Pesanan tidak ditemukan.');
        }

        $data = [
            'title' => 'Pesanan Berhasil',
            'order' => $order,
            'items' => $this->orderItemModel->where('order_id', $orderId)->findAll()
        ];

        return view('frontend/order_success', $data);
    }

    // TAMBAHAN: Halaman Konfirmasi Pembayaran (Untuk Transfer & QRIS)
    public function payment($orderId)
    {
        $order = $this->orderModel->find($orderId);

        // Security check: pastikan order milik user yang login
        if (!$order || $order['user_id'] != session()->get('user_id')) {
            return redirect()->to('/')->with('error', 'Pesanan tidak ditemukan.');
        }

        $data = [
            'title' => 'Pembayaran',
            'order' => $order
        ];

        // Kamu perlu buat View baru: frontend/payment_confirm.php
        return view('frontend/payment_confirm', $data);
    }
    // ... code sebelumnya ...

    // FUNGSI BARU: Menangani Upload Bukti Bayar
    public function uploadProof()
    {
        // 1. Cek Login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // 2. Validasi File Gambar
        $rules = [
            'payment_proof' => [
                'rules' => 'uploaded[payment_proof]|is_image[payment_proof]|max_size[payment_proof,2048]',
                'errors' => [
                    'uploaded' => 'Harap pilih gambar bukti transfer',
                    'is_image' => 'File harus berupa gambar (JPG/PNG)',
                    'max_size' => 'Ukuran gambar maksimal 2MB'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'File tidak valid. Pastikan format gambar max 2MB.');
        }

        // 3. Proses Upload
        $file = $this->request->getFile('payment_proof');
        $orderId = $this->request->getPost('order_id');
        $senderName = $this->request->getPost('sender_name'); // Opsional, bisa disimpan di notes jika perlu

        if ($file->isValid() && !$file->hasMoved()) {
            // Generate nama file unik agar tidak bentrok
            $newName = $file->getRandomName();
            
            // Pindahkan file ke folder public/uploads/proofs
            $file->move('uploads/proofs', $newName);

            // 4. Update Database
            // Ubah status jadi 'pending_verification' dan simpan nama file
            $this->orderModel->update($orderId, [
                'proof_image' => $newName,
                'payment_status' => 'pending_verification',
                // Kita tambahkan nama pengirim ke notes agar admin tahu
                'notes' => 'Pengirim: ' . $senderName . '. ' . (session()->get('last_order')['notes'] ?? '') 
            ]);

            // 5. Redirect ke Halaman Sukses
            return redirect()->to("/orders/success/$orderId")->with('success', 'Terima kasih! Bukti pembayaran berhasil dikirim. Admin akan segera memverifikasi.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload gambar. Silakan coba lagi.');
    }

} // <--- Tutup Class Checkout