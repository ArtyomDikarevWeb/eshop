<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Offer;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Product::factory(20)->create();
        Offer::factory(20)->create();

        DB::table('roles')->insert([
            ['title' => 'admin'], 
            ['title' => 'manager']
        ]);
    }
}
