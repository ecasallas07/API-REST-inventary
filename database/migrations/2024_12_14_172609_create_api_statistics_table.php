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
        Schema::create('api_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('endpoint')->comment('Path of the requested API (e.g. /api/products).');
            $table->integer('total_requests')->comment('Total applications received');
            $table->integer('success_requests')->comment('Number of requests with successful response (codes 2XX).');
            $table->integer('error_requests')->comment('Number of applications with errors (codes 4XX and 5XX)');
            $table->timestamp('last_accessed',0)->comment('Date and time of request');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_statistics');
    }
};
