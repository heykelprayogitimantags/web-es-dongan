<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $productModel;
    protected $orderModel;
    protected $userModel;
    
    public function __construct()
    {
        if (session()->get('role') !== 'admin') {
            echo 'Access denied';
            exit;
        }
        
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'total_products' => $this->productModel->countAll(),
            'total_orders' => $this->orderModel->countAll(),
            'total_users' => $this->userModel->where('role', 'user')->countAllResults(),
            'pending_orders' => $this->orderModel->where('status', 'pending')->countAllResults(),
            'recent_orders' => $this->orderModel->orderBy('created_at', 'DESC')->limit(5)->findAll()
        ];
        
        return view('admin/dashboard', $data);
    }
}