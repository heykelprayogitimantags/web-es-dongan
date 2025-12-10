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
        
        // Validasi input
        $validation = $this->validate([
            'phone' => [
                'rules' => 'required|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi',
                    'min_length' => 'Nomor telepon minimal 10 digit',
                    'max_length' => 'Nomor telepon maksimal 15 digit'
                ]
            ],
            'shipping_address' => [
                'rules' => 'required|min_length[20]',
                'errors' => [
                    'required' => 'Alamat pengiriman harus diisi',
                    'min_length' => 'Alamat pengiriman minimal 20 karakter'
                ]
            ],
            'payment_method' => [
                'rules' => 'required|in_list[cod,transfer]',
                'errors' => [
                    'required' => 'Metode pembayaran harus dipilih',
                    'in_list' => 'Metode pembayaran tidak valid'
                ]
            ]
        ]);
        
        if (!$validation) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        
        // Ambil data cart
        $cart = session()->get('cart');
        
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Keranjang belanja kosong!');
        }
        
        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        // Generate order number
        $orderNumber = 'ORD-' . date('Ymd') . '-' . rand(1000, 9999);
        
        // Simpan order ke database
        $orderData = [
            'user_id' => session()->get('user_id'),
            'order_number' => $orderNumber,
            'customer_name' => session()->get('name'),
            'customer_email' => session()->get('email'),
            'phone' => $this->request->getPost('phone'),
            'shipping_address' => $this->request->getPost('shipping_address'),
            'notes' => $this->request->getPost('notes'),
            'payment_method' => $this->request->getPost('payment_method'),
            'total_amount' => $total,
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $orderId = $this->orderModel->insert($orderData);
        
        if (!$orderId) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal membuat pesanan. Silakan coba lagi.');
        }
        
        // Simpan order items
        foreach ($cart as $item) {
            $orderItemData = [
                'order_id' => $orderId,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity']
            ];
            
            $this->orderItemModel->insert($orderItemData);
        }
        
        // Simpan data order ke session untuk halaman success
        session()->set('last_order', [
            'order_id' => $orderId,
            'order_number' => $orderNumber,
            'phone' => $orderData['phone'],
            'shipping_address' => $orderData['shipping_address'],
            'notes' => $orderData['notes'],
            'payment_method' => $orderData['payment_method'],
            'total' => $total,
            'items' => $cart,
            'created_at' => date('d F Y, H:i')
        ]);
        
        // Hapus cart dari session
        session()->remove('cart');
        
        // Redirect ke halaman success
        return redirect()->to('/orders/success');
    }
}