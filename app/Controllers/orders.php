<?php

namespace App\Controllers;

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
    
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        $userId = session()->get('user_id');
        $orders = $this->orderModel->getUserOrders($userId);
        
        $data = [
            'title' => 'Pesanan Saya',
            'orders' => $orders
        ];
        
        return view('frontend/orders', $data);
    }
    
    public function detail($orderId)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        $userId = session()->get('user_id');
        $order = $this->orderModel->find($orderId);
        
        // Pastikan order milik user yang login
        if (!$order || $order['user_id'] != $userId) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $orderItems = $this->orderItemModel->getOrderItems($orderId);
        
        $data = [
            'title' => 'Detail Pesanan #' . $order['order_number'],
            'order' => $order,
            'order_items' => $orderItems
        ];
        
        return view('frontend/order_detail', $data);
    }
    
    // METHOD BARU: Halaman Order Success
    public function success()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        // Cek apakah ada data order terakhir dari checkout
        if (!session()->has('last_order')) {
            return redirect()->to('/')->with('error', 'Tidak ada data pesanan');
        }
        
        $lastOrder = session()->get('last_order');
        
        $data = [
            'title' => 'Pesanan Berhasil',
            'order' => $lastOrder,
            'cart' => isset($lastOrder['items']) ? $lastOrder['items'] : [],
            'total' => $lastOrder['total']
        ];
        
        return view('frontend/order_success', $data);
    }
}