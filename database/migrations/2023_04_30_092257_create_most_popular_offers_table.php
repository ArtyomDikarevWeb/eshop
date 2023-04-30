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
        Schema::create('most_popular_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('offer_id');
            $table->timestamps();

            $table->index('user_id', 'most_popular_offers_user_idx');
            $table->foreign('user_id', 'most_popular_offers_user_fk')
                ->on('users')
                ->references('id');

            $table->index('offer_id', 'most_popular_offers_offer_idx');
            $table->foreign('offer_id', 'most_popular_offers_offer_fk')
                ->on('offers')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('most_popular_offers');
    }
};
