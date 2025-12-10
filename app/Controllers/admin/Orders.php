<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Orders extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
    }

    // ✅ MENAMPILKAN DAFTAR PESANAN (Dengan Nama & Email Pelanggan)
    public function index()
    {
        $orders = $this->orderModel
            ->select('orders.*, users.name as user_name, users.email as user_email') // Ambil data user
            ->join('users', 'users.id = orders.user_id', 'left') // Hubungkan tabel
            ->orderBy('orders.id', 'DESC')
            ->findAll();

        $data = [
            'title'  => 'Daftar Pesanan',
            'orders' => $orders
        ];

        return view('admin/orders/index', $data);
    }

    // ✅ MENAMPILKAN DETAIL PESANAN
    public function detail($id)
    {
        // 1. Ambil data order + Data User (PENTING: Pakai join juga disini agar detail ada namanya)
        $order = $this->orderModel
            ->select('orders.*, users.name as user_name, users.email as user_email')
            ->join('users', 'users.id = orders.user_id', 'left')
            ->find($id);

        if (!$order) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pesanan tidak ditemukan.");
        }

        // 2. Ambil item pesanan (produk yang dibeli)
        $order_items = $this->orderItemModel
            ->where('order_id', $id)
            ->findAll();

        $data = [
            'title'       => 'Detail Pesanan',
            'order'       => $order,
            'order_items' => $order_items
        ];

        return view('admin/orders/detail', $data);
    }

    // ✅ UPDATE STATUS PESANAN
    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');

        $this->orderModel->update($id, [
            'status'     => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/orders/detail/' . $id)
                         ->with('success', 'Status berhasil diperbarui!');
    }
}