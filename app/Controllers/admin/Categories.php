<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    // ============================
    //  LIST KATEGORI
    // ============================
    public function index()
    {
        $data = [
            'title' => 'Kelola Kategori',
            'categories' => $this->categoryModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/categories/index', $data);
    }

    // ============================
    //  SIMPAN KATEGORI BARU
    // ============================
    public function store()
    {
        $this->categoryModel->insert([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/admin/categories')->with('success', 'Kategori berhasil ditambahkan');
    }

    // ============================
    //  UPDATE KATEGORI
    // ============================
    public function update($id)
    {
        $this->categoryModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/admin/categories')->with('success', 'Kategori berhasil diperbarui');
    }

    // ============================
    //  HAPUS KATEGORI
    // ============================
    public function delete($id)
    {
        $this->categoryModel->delete($id);

        return redirect()->to('/admin/categories')->with('success', 'Kategori berhasil dihapus');
    }
}
    