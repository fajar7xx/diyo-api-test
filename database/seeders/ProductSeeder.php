<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::beginTransaction();
        try {

            Product::truncate();
            ProductVariant::truncate();

            Product::factory()
                ->has(ProductVariant::factory()->count(3), 'variants')
                ->count(10)
                ->create();

            Product::factory()->count(20)->create();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        Schema::enableForeignKeyConstraints();
    }
}
