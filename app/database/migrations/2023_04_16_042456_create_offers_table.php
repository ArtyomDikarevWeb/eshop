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
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->unsignedInteger('amount');
            $table->unsignedInteger('price');
            $table->timestamps();
            $table->softDeletes();

            $table->index('category_id', 'category_offers_idx');
            $table->foreign('category_id', 'category_offers_fk')
                ->on('categories')
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
