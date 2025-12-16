<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    
    // PERBAIKAN DISINI: 
    // Saya menambahkan 'payment_status', 'proof_image', 'customer_name', 'customer_email'
    // agar data bisa tersimpan lengkap.
    protected $allowedFields = [
        'user_id', 
        'order_number', 
        'customer_name', 
        'customer_email', 
        'total_amount', 
        'status',          // Status Order (pending, processing, dll)
        'payment_status',  // Status Bayar (unpaid, paid)
        'payment_method',  // Metode (cod, transfer, qris)
        'shipping_address', 
        'phone', 
        'notes',
        'proof_image'      // Kolom baru untuk nama file bukti transfer
    ];
    
    public function getOrdersWithUser()
    {
        return $this->select('orders.*, users.name as user_real_name, users.email as user_email')
                    ->join('users', 'users.id = orders.user_id')
                    ->orderBy('orders.created_at', 'DESC')
                    ->findAll();
    }
    
    public function getUserOrders($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
    
    public function generateOrderNumber()
    {
        return 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
    }
}