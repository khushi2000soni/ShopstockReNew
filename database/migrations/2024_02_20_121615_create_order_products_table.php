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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->decimal('quantity', 15, 2);
            $table->decimal('price', 15, 2);
            $table->decimal('height', 15, 2)->nullable();
			$table->decimal('width', 15, 2)->nullable();
			$table->decimal('length', 15, 2)->nullable();
            $table->decimal('total_price', 15, 2);
			$table->tinyInteger('is_draft')->default(0);
            $table->text('description')->default(null)->nullable();
            $table->json('other_details')->default(null)->nullable();
            $table->text('is_sub_product')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
