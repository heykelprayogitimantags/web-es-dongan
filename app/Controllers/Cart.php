<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Cart extends BaseController
{
    protected $productModel;
    protected $orderModel;
    protected $orderItemModel;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
    }
    
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        
        $data = [
            'title' => 'Keranjang Belanja',
            'cart' => $cart,
            'total' => $this->calculateTotal($cart)
        ];
        
        return view('frontend/cart', $data);
    }
    
    public function add()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity') ?? 1;
        
        $product = $this->productModel->find($productId);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }
        
        $cart = session()->get('cart') ?? [];
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => $quantity
            ];
        }
        
        session()->set('cart', $cart);
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }
    
    public function update()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');
        
        $cart = session()->get('cart') ?? [];
        
        if (isset($cart[$productId])) {
            if ($quantity > 0) {
                $cart[$productId]['quantity'] = $quantity;
            } else {
                unset($cart[$productId]);
            }
            session()->set('cart', $cart);
        }
        
        return redirect()->to('/cart');
    }
    
    public function remove($productId)
    {
        $cart = session()->get('cart') ?? [];
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->set('cart', $cart);
        }
        
        return redirect()->to('/cart')->with('success', 'Produk dihapus dari keranjang!');
    }
    
    public function checkout()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }
        
        $cart = session()->get('cart') ?? [];
        
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Keranjang belanja kosong!');
        }
        
        $data = [
            'title' => 'Checkout',
            'cart' => $cart,
            'total' => $this->calculateTotal($cart)
        ];
        
        return view('frontend/checkout', $data);
    }
    
    public function processCheckout()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $cart = session()->get('cart') ?? [];
        
        if (empty($cart)) {
            return redirect()->to('/cart');
        }
        
        $validation = $this->validate([
            'shipping_address' => 'required',
            'phone' => 'required'
        ]);
        
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $orderData = [
            'user_id' => session()->get('user_id'),
            'order_number' => $this->orderModel->generateOrderNumber(),
            'total_amount' => $this->calculateTotal($cart),
            'status' => 'pending',
            'shipping_address' => $this->request->getPost('shipping_address'),
            'phone' => $this->request->getPost('phone'),
            'notes' => $this->request->getPost('notes')
        ];
        
        $orderId = $this->orderModel->insert($orderData);
        
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
        
        session()->remove('cart');
        return redirect()->to('/orders')->with('success', 'Pesanan berhasil dibuat!');
    }
    
    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}