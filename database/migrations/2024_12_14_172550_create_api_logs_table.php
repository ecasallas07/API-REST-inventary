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
        Schema::create('api_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('endpoint')->comment('Path of the requested API (e.g. /api/products).');
            $table->enum('method',['GET', 'POST', 'PUT', 'DELETE', 'PATCH'])->comment('HTTP method used.');
            $table->integer('status_code')->comment('HTTP response code (200, 404, 500, etc.)');
            $table->ipAddress('ip_address')->comment('Customer IP address');
            $table->json('user_agent')->comment(' Customers browser or device information.');
            $table->timestamp('request_time',0)->comment('Date and time of request');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_logs');
    }
};
