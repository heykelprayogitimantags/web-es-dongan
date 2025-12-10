<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['category_id', 'name', 'description', 'price', 'image', 'stock', 'is_available'];
    
    public function getProductsWithCategory()
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id')
                    ->where('products.is_available', 1)
                    ->findAll();
    }
    
    public function getProductById($id)
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id')
                    ->find($id);
    }
    
    public function searchProducts($keyword)
    {
        return $this->like('name', $keyword)
                    ->orLike('description', $keyword)
                    ->where('is_available', 1)
                    ->findAll();
    }
    
}