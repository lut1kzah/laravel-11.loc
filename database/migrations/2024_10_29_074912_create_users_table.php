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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname',32);
            $table->string('name');
            $table->string('patronymic',32)->nullable();
            $table->boolean('sex');
            $table->date('birth_date');
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nickname',32)->unique();
            $table->string('phone')->unique()->nullable();
            $table->foreignId('role_id')->constrained('roles','id');
            $table->string('api_token')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
