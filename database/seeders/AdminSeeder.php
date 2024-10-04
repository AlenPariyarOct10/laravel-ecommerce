<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Alen Pariyar',
            'email' => 'oct10.alenpariyar@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
