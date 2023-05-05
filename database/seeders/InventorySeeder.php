<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\TryCatch;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::beginTransaction();

        Inventory::truncate();

        try {

            Inventory::factory()->count(50)->create();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


        Schema::enableForeignKeyConstraints();
    }
}
