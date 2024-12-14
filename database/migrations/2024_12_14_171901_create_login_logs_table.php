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
        Schema::create('login_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('Identifies the logged in user.');
            $table->ipAddress('ip_address')->comment('IP address from which the login was made');
            $table->json('user_agent')->comment('Users browser or device information');
            $table->timestamp('login_time',0)->comment('Date and time of login.');
            $table->boolean('success')->comment('Indicates if the login attempt was successful.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_logs');
    }
};
