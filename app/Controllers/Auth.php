<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(session()->get('role') === 'admin' ? '/admin/dashboard' : '/');
        }
        return view('auth/login');
    }
    
    public function loginProcess()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Validasi input
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Email dan password harus diisi!');
        }
        
        $user = $userModel->getUserByEmail($email);
        
        // Debug: Uncomment untuk testing
        // log_message('debug', 'Login attempt - Email: ' . $email);
        // log_message('debug', 'User found: ' . ($user ? 'Yes' : 'No'));
        
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'logged_in' => true
                ]);
                
                // Redirect berdasarkan role
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin/dashboard');
                }
                return redirect()->to('/');
            }
        }
        
        return redirect()->back()->with('error', 'Email atau password salah!');
    }
    
    public function register()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('auth/register');
    }
    
    public function registerProcess()
    {
        $userModel = new UserModel();
        
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ]);
        
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'role' => 'user'
        ];
        
        $userModel->insert($data);
        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}