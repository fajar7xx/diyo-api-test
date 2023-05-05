<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('sales_detail_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_detail_id')->constrained('sales_details');
            $table->string('variant_name');
            $table->integer('price')->default(0);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('sales_detail_variants');
        Schema::enableForeignKeyConstraints();
    }
};
