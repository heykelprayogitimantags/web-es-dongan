<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    
    public function __construct()
    {
        if (session()->get('role') !== 'admin') {
            echo 'Access denied';
            exit;
        }
        
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Kelola Produk',
            'products' => $this->productModel->getProductsWithCategory()
        ];
        
        return view('admin/products/index', $data);
    }
    
    public function create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'categories' => $this->categoryModel->findAll()
        ];
        
        return view('admin/products/create', $data);
    }
    
    public function store()
    {
        $validation = $this->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]'
        ]);
        
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('uploads/products', $imageName);
        
        $data = [
            'category_id' => $this->request->getPost('category_id'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'image' => $imageName,
            'is_available' => $this->request->getPost('is_available') ?? 1
        ];
        
        $this->productModel->insert($data);
        return redirect()->to('/admin/products')->with('success', 'Produk berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $data = [
            'title' => 'Edit Produk',
            'product' => $product,
            'categories' => $this->categoryModel->findAll()
        ];
        
        return view('admin/products/edit', $data);
    }
    
    public function update($id)
    {
        $validation = $this->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);
        
        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'category_id' => $this->request->getPost('category_id'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'is_available' => $this->request->getPost('is_available') ?? 1
        ];
        
        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/products', $imageName);
            $data['image'] = $imageName;
            
            $oldProduct = $this->productModel->find($id);
            if ($oldProduct['image'] && file_exists('uploads/products/' . $oldProduct['image'])) {
                unlink('uploads/products/' . $oldProduct['image']);
            }
        }
        
        $this->productModel->update($id, $data);
        return redirect()->to('/admin/products')->with('success', 'Produk berhasil diupdate!');
    }
    
    public function delete($id)
    {
        $product = $this->productModel->find($id);
        
        if ($product && $product['image'] && file_exists('uploads/products/' . $product['image'])) {
            unlink('uploads/products/' . $product['image']);
        }
        
        $this->productModel->delete($id);
        return redirect()->to('/admin/products')->with('success', 'Produk berhasil dihapus!');
    }
}