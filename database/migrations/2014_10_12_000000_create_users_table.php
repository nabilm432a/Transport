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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('contact')->unique()->nullable();
            $table->string('passport')->unique()->nullable();
            $table->string('nid')->unique()->nullable();
            $table->rememberToken();
            $table->string('google_id')->unique()->nullable();
            $table->timestamps();
            $table->boolean('is_admin')->default('0');
            $table->integer('points')->default('0');
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
