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
        Schema::create('addresses_tabl', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('city',32);
            $table->string('street',32);
            $table->string('house',8)->nullable();
            $table->string('entrance',8)->nullable();
            $table->integer('floor')->nullable();
            $table->string('intercom')->nullable();
            $table->foreignId('user_id')->constrained('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses_tabl');
    }
};
