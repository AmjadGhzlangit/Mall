<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> 'password',
            'is_admin'=> true,
        ]);

        User::factory(7)->create();
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(SellerSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
