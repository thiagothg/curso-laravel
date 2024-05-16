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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();

            $table->string('name', 30);
            $table->timestamps();
        });

        Schema::create('products_branches', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('branch_id');
            // $table->unsignedBigInteger('product_id');

            $table->decimal('price_sale');
            $table->integer('stock_min')->default(1);
            $table->integer('stock_max')->default(1);
            $table->timestamps();

            $table->foreignId('branch_id')->references('id')->on('branches');
            $table->foreignId('product_id')->references('id')->on('products');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'price_sale',
                'stock_min',
                'stock_max'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_branches');
        Schema::dropIfExists('branches');


        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price_sale')->default(0.0);
            $table->integer('stock_min')->default(1);
            $table->integer('stock_max')->default(1);
        });
    }
};
