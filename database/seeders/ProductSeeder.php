<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Процесор Intel Core i5-12400F',
                'category_id' => 1,
                'description' => '6-ядерний процесор для ігор та роботи',
                'price' => 7200,
                'quantity' => 15,
                'image_path' => 'products/cpu_i5_12400f.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Процесор AMD Ryzen 5 5600',
                'category_id' => 1,
                'description' => 'Висока продуктивність для сучасних задач',
                'price' => 6900,
                'quantity' => 12,
                'image_path' => 'products/cpu_ryzen_5600.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Материнська плата ASUS PRIME B550M',
                'category_id' => 2,
                'description' => 'Підтримка Ryzen та DDR4',
                'price' => 4200,
                'quantity' => 10,
                'image_path' => 'products/mb_asus_b550m.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Материнська плата MSI B660M PRO',
                'category_id' => 2,
                'description' => 'Плата під Intel 12 покоління',
                'price' => 4500,
                'quantity' => 8,
                'image_path' => 'products/mb_msi_b660m.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Оперативна памʼять Kingston 16GB DDR4',
                'category_id' => 3,
                'description' => 'Частота 3200MHz',
                'price' => 1800,
                'quantity' => 25,
                'image_path' => 'products/ram_kingston_16gb.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Оперативна памʼять Corsair 32GB DDR4',
                'category_id' => 3,
                'description' => 'Набір з двох модулів',
                'price' => 3500,
                'quantity' => 14,
                'image_path' => 'products/ram_corsair_32gb.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Відеокарта NVIDIA RTX 3060',
                'category_id' => 4,
                'description' => '12GB GDDR6 для ігор',
                'price' => 12500,
                'quantity' => 6,
                'image_path' => 'products/gpu_rtx_3060.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'SSD Samsung 970 EVO Plus 1TB',
                'category_id' => 5,
                'description' => 'NVMe накопичувач',
                'price' => 3200,
                'quantity' => 20,
                'image_path' => 'products/ssd_970evo_1tb.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
