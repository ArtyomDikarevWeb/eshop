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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('title');
            $table->unsignedInteger('price');
            $table->timestamps();
            $table->softDeletes();

            $table->index('product_id', 'offers_product_idx');
            $table->foreign('product_id', 'offers_product_fk')
                ->on('products')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
