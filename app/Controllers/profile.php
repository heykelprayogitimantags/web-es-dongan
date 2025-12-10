<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OrderModel;

class Profile extends BaseController
{
    protected $userModel;
    protected $orderModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->orderModel = new OrderModel();
    }
    
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        $orders = $this->orderModel->getUserOrders($userId);
        
        $data = [
            'title' => 'Profile Saya',
            'user' => $user,
            'total_orders' => count($orders),
            'completed_orders' => count(array_filter($orders, fn($o) => $o['status'] === 'completed')),
            'pending_orders' => count(array_filter($orders, fn($o) => $o['status'] === 'pending')),
            'recent_orders' => array_slice($orders, 0, 5)
        ];
        
        return view('frontend/profile/index', $data);
    }
    
    public function edit()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        
        $data = [
            'title' => 'Edit Profile',
            'user' => $user
        ];
        
        return view('frontend/profile/edit', $data);
    }
    
    public function update()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $userId = session()->get('user_id');
        
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,{$userId}]",
            'phone' => 'permit_empty|min_length[10]'
        ]);
        
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address')
        ];
        
        $this->userModel->update($userId, $data);
        
        // Update session
        session()->set([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
        
        return redirect()->to('/profile')->with('success', 'Profile berhasil diupdate!');
    }
    
    public function changePassword()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        return view('frontend/profile/change-password');
    }
    
    public function updatePassword()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        
        $validation = $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]'
        ]);
        
        if (!$validation) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        
        // Verify old password
        if (!password_verify($this->request->getPost('old_password'), $user['password'])) {
            return redirect()->back()->with('errors', ['old_password' => 'Password lama salah!']);
        }
        
        // Update password
        $newPassword = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);
        $this->userModel->update($userId, ['password' => $newPassword]);
        
        return redirect()->to('/profile/change-password')->with('success', 'Password berhasil diubah!');
    }
}