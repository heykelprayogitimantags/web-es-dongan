<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        $data = [
            'name' => 'Administrator',
            'email' => 'admin@tokoes.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'phone' => '081234567890',
            'address' => 'Jl. Admin No. 123',
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->table('users')->insert($data);
        
        // Create Sample Categories
        $categories = [
            [
                'name' => 'Es Buah',
                'description' => 'Es dengan campuran buah-buahan segar',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Es Krim',
                'description' => 'Es krim dengan berbagai rasa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Es Cincau',
                'description' => 'Es dengan cincau hitam atau hijau',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Es Kopi',
                'description' => 'Minuman kopi dingin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        
        $this->db->table('categories')->insertBatch($categories);
        
        // Create Sample Products
        $products = [
            [
                'category_id' => 1,
                'name' => 'Es Buah Segar',
                'description' => 'Es buah dengan campuran melon, semangka, dan kelapa muda',
                'price' => 15000,
                'stock' => 50,
                'is_available' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 2,
                'name' => 'Es Krim Vanilla',
                'description' => 'Es krim lembut rasa vanilla premium',
                'price' => 20000,
                'stock' => 30,
                'is_available' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 2,
                'name' => 'Es Krim Coklat',
                'description' => 'Es krim coklat dengan topping choco chips',
                'price' => 22000,
                'stock' => 25,
                'is_available' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 3,
                'name' => 'Es Cincau Hitam',
                'description' => 'Es cincau hitam dengan susu dan gula merah',
                'price' => 12000,
                'stock' => 40,
                'is_available' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 4,
                'name' => 'Es Kopi Susu',
                'description' => 'Kopi susu dingin dengan gula aren',
                'price' => 18000,
                'stock' => 35,
                'is_available' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 1,
                'name' => 'Es Campur Spesial',
                'description' => 'Es campur dengan tape, alpukat, dan kolang-kaling',
                'price' => 17000,
                'stock' => 30,
                'is_available' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        
        $this->db->table('products')->insertBatch($products);
        
        echo "Admin dan data sample berhasil dibuat!\n";
        echo "Email Admin: admin@tokoes.com\n";
        echo "Password: admin123\n";
    }
}