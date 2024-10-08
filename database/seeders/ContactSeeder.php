<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'Staff 1',
            'number' => '0812132163263',
            'icon' => 'wa-icon.png',
            'is_active' => true,
        ]);

        Contact::create([
            'name' => 'Staff 2',
            'number' => '0812132164263',
            'icon' => 'wa-icon.png',
            'is_active' => true,
        ]);

        Contact::create([
            'name' => 'Admin',
            'number' => '0812132163223',
            'icon' => 'wa-icon.png',
            'is_active' => true,
        ]);
    }
}
