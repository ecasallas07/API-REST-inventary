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
            $table->string('name')->comment('The name of the user');
            $table->string('email')->unique()->comment('The email address of the user');
            $table->string('password')->comment('The password of the user');
            $table->enum('role',['admin','user'])->default('user')->comment('The role of the user');
            $table->timestamps(0); // Created fields created_at and updated_at
            $table->softDeletes('deleted_at', precision: 0); // Delete the elements
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
