<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }
    
 
    public function index()
    {
        
        $products = $this->productModel
            ->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->orderBy('products.id', 'DESC')
            ->limit(4)
            ->find();

        $data = [
            'title'      => 'Beranda',
            'products'   => $products,
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('frontend/index', $data);
    }

    public function products()
    {
        $data = [
            'title'      => 'Semua Produk',
            'products'   => $this->productModel
                                    ->select('products.*, categories.name as category_name')
                                    ->join('categories', 'categories.id = products.category_id', 'left')
                                    ->orderBy('products.id', 'DESC')
                                    ->findAll(),
            'categories' => $this->categoryModel->findAll()
        ];

        return view('frontend/products', $data);
    }
}
