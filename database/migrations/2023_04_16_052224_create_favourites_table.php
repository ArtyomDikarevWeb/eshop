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
        Schema::create('favourites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('offer_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id', 'favourites_user_idx');
            $table->foreign('user_id', 'favourites_user_fk')
                ->on('users')
                ->references('id');

            $table->index('offer_id', 'favourites_offer_idx');
            $table->foreign('offer_id', 'favourites_offer_fk')
                ->on('offers')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourites');
    }
};
