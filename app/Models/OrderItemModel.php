<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['order_id', 'product_id', 'product_name', 'quantity', 'price', 'subtotal'];
    
    public function getOrderItems($orderId)
    {
        return $this->where('order_id', $orderId)->findAll();
    }
}