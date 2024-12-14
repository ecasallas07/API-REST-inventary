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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('The name of the supplier');
            $table->string('contact_email')->unique()->comment('The email of the supplier');
            $table->string('contact_phone')->comment('The phone number of the supplier');
            $table->longText('text')->comment('The text of the supplier');
            $table->timestamps(0);
            $table->softDeletes('deleat_at',0); // Soft delete for historical tracking and auditing.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
