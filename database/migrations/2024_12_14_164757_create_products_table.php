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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained(); // Match with the table category is same, if not is specific in constrained
            $table->string('name',60)->comment('The name of the product');
            $table->string('sku')->unique()->comment('The unique name of the product - Stock Keeping Unit ');
            $table->decimal('price',10,2)->comment('The price of the product');
            $table->integer('stock')->default(0)->comment('The stock of the product');
            $table->longText('description')->comment('The description of the product');
            $table->timestamps(0);
            $table->softDeletes(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
