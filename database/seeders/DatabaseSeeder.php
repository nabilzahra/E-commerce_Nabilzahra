<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create regular user
        User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create sample products
        $products = [
            [
                'name' => 'Laptop Gaming ASUS ROG',
                'description' => 'Laptop gaming dengan performa tinggi, cocok untuk gaming dan multitasking',
                'price' => 15000000,
                'stock' => 10,
                'category' => 'Elektronik',
                'sku' => 'LAPTOP-001',
                'is_active' => true,
            ],
            [
                'name' => 'Smartphone Samsung Galaxy S23',
                'description' => 'Smartphone flagship dengan kamera berkualitas tinggi',
                'price' => 12000000,
                'stock' => 25,
                'category' => 'Elektronik',
                'sku' => 'PHONE-001',
                'is_active' => true,
            ],
            [
                'name' => 'Headphone Sony WH-1000XM5',
                'description' => 'Headphone dengan noise cancelling terbaik',
                'price' => 4500000,
                'stock' => 15,
                'category' => 'Audio',
                'sku' => 'AUDIO-001',
                'is_active' => true,
            ],
            [
                'name' => 'Keyboard Mechanical Keychron K2',
                'description' => 'Keyboard mechanical dengan build quality premium',
                'price' => 1200000,
                'stock' => 30,
                'category' => 'Aksesoris',
                'sku' => 'ACC-001',
                'is_active' => true,
            ],
            [
                'name' => 'Mouse Logitech MX Master 3',
                'description' => 'Mouse ergonomis untuk produktivitas tinggi',
                'price' => 1500000,
                'stock' => 20,
                'category' => 'Aksesoris',
                'sku' => 'ACC-002',
                'is_active' => true,
            ],
            [
                'name' => 'Monitor LG UltraWide 34"',
                'description' => 'Monitor ultrawide untuk multitasking maksimal',
                'price' => 7000000,
                'stock' => 8,
                'category' => 'Elektronik',
                'sku' => 'MONITOR-001',
                'is_active' => true,
            ],
            [
                'name' => 'Webcam Logitech C920',
                'description' => 'Webcam HD untuk video conference berkualitas',
                'price' => 1000000,
                'stock' => 40,
                'category' => 'Aksesoris',
                'sku' => 'ACC-003',
                'is_active' => true,
            ],
            [
                'name' => 'SSD Samsung 1TB',
                'description' => 'SSD NVMe dengan kecepatan baca tulis tinggi',
                'price' => 1800000,
                'stock' => 50,
                'category' => 'Storage',
                'sku' => 'STORAGE-001',
                'is_active' => true,
            ],
            [
                'name' => 'Tablet iPad Air',
                'description' => 'Tablet premium untuk kreativitas dan produktivitas',
                'price' => 9000000,
                'stock' => 12,
                'category' => 'Elektronik',
                'sku' => 'TABLET-001',
                'is_active' => true,
            ],
            [
                'name' => 'Smartwatch Apple Watch Series 8',
                'description' => 'Smartwatch dengan fitur kesehatan lengkap',
                'price' => 6000000,
                'stock' => 18,
                'category' => 'Wearable',
                'sku' => 'WATCH-001',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
