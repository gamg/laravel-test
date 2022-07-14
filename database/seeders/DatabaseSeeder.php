<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'email' => 'superadmin@admin.com',
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'email' => 'client@gmail.com',
        ]);

        \App\Models\User::factory(10)->create();

        Product::factory(10)->create();

        Purchase::factory()->create([
            'user_id' => 2,
            'product_id' => 1,
        ]);

        Purchase::factory()->create([
            'user_id' => 2,
            'product_id' => 4,
        ]);

        Purchase::factory()->create([
            'user_id' => 2,
            'product_id' => 7,
        ]);

        Purchase::factory()->create([
            'user_id' => 5,
            'product_id' => 1,
        ]);

        Purchase::factory()->create([
            'user_id' => 5,
            'product_id' => 1,
        ]);

        Purchase::factory()->create([
            'user_id' => 5,
            'product_id' => 3,
        ]);
    }
}
