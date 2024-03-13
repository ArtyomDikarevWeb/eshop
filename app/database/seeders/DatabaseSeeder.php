<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Offer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Category::factory(20)->create();
        Offer::factory(20)->create();

        DB::table('users')->insert([
            'name' => 'Test',
            'username' => 'Test',
            'email' => 'testtest@test.com',
            'phone' => '+70000000000',
            'surname' => 'Test',
            'last_name' => 'Test',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        DB::table('roles')->insert([
            ['title' => 'admin'],
            ['title' => 'manager']
        ]);
    }
}
