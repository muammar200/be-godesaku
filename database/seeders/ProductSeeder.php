<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Gelang Cangkang Kepiting',
                'description' => 'Gelang unik yang terbuat dari cangkang kepiting asli dengan desain etnik.',
                'rate' => 4.8,
                'sold_quantity' => 250,
                'price' => 120000,
                'image' => 'img-1.png',
                'whatsapp_contact' => '+628123456789',
                'slug' => Str::slug('Gelang Cangkang Kepiting'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gelang Manik Mutiara',
                'description' => 'Gelang manik-manik dengan sentuhan mutiara yang menambah elegansi.',
                'rate' => 4.7,
                'sold_quantity' => 100,
                'price' => 450000,
                'image' => 'img-2.jpeg',
                'whatsapp_contact' => '+628987654321',
                'slug' => Str::slug('Gelang Manik Mutiara'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kalung Manik Terumbu',
                'description' => 'Kalung cantik yang terinspirasi dari warna dan bentuk terumbu karang.',
                'rate' => 4.6,
                'sold_quantity' => 180,
                'price' => 75000,
                'image' => 'img-3.jpeg',
                'whatsapp_contact' => '+628555123456',
                'slug' => Str::slug('Kalung Manik Terumbu'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Topi Rajut Jerami',
                'description' => 'Topi rajut yang terbuat dari serat jerami dengan desain sederhana dan stylish.',
                'rate' => 4.9,
                'sold_quantity' => 300,
                'price' => 95000,
                'image' => 'img-4.jpeg',
                'whatsapp_contact' => '+628321654987',
                'slug' => Str::slug('Topi Rajut Jerami'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kacang Asin',
                'description' => 'Kacang gurih yang diolah secara tradisional, ideal untuk camilan sehari-hari.',
                'rate' => 4.5,
                'sold_quantity' => 220,
                'price' => 35000,
                'image' => 'img-5.jpeg',
                'whatsapp_contact' => '+628222333444',
                'slug' => Str::slug('Kacang Asin'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kue Lumpur Labu',
                'description' => 'Kue lumpur lezat dengan isian labu yang manis dan lembut.',
                'rate' => 4.7,
                'sold_quantity' => 150,
                'price' => 28000,
                'image' => 'img-6.jpeg',
                'whatsapp_contact' => '+628111222333',
                'slug' => Str::slug('Kue Lumpur Labu'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Martabak Mini Pandan',
                'description' => 'Martabak mini dengan aroma pandan yang khas dan tekstur yang lembut.',
                'rate' => 4.4,
                'sold_quantity' => 90,
                'price' => 12000,
                'image' => 'img-7.jpeg',
                'whatsapp_contact' => '+628333555777',
                'slug' => Str::slug('Martabak Mini Pandan'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Putu Cangkir',
                'description' => 'Putu cangkir klasik dengan taburan kelapa parut yang nikmat.',
                'rate' => 4.8,
                'sold_quantity' => 130,
                'price' => 16000,
                'image' => 'img-8.jpeg',
                'whatsapp_contact' => '+628123987654',
                'slug' => Str::slug('Putu Cangkir'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kue Nagasari',
                'description' => 'Kue tradisional dengan isian pisang yang lembut dan manis.',
                'rate' => 4.6,
                'sold_quantity' => 200,
                'price' => 8500,
                'image' => 'img-9.jpeg',
                'whatsapp_contact' => '+628888666555',
                'slug' => Str::slug('Kue Nagasari'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Headset Gaming',
                'description' => 'Headset gaming berkualitas tinggi dengan suara surround dan kenyamanan ekstra.',
                'rate' => 4.8,
                'sold_quantity' => 210,
                'price' => 500000,
                'image' => 'img-10.jpg',
                'whatsapp_contact' => '+628334455667',
                'slug' => Str::slug('Headset Gaming'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
