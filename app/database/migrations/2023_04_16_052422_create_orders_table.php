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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('offer_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'orders_user_idx');
            $table->foreign('user_id', 'orders_user_fk')
                ->on('users')
                ->references('id');

            $table->index('offer_id', 'orders_offer_idx');
            $table->foreign('offer_id', 'orders_offers_fk')
                ->on('offers')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
