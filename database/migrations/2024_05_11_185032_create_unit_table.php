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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10); //cm, mm, kg
            $table->string('description', 50);

            $table->timestamps();
        });

        Schema::table('products', function ($table) {
            // $table->foreign('unit_id')->re;
            $table->foreignId('unit_id')->references('id')->on('units');
        });

        Schema::table('product_details', function ($table) {
            // $table->foreign('unit_id')->re;
            $table->foreignId('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function ($table) {
            $table->dropForeign(['unit_id']);
            $table->dropColumn('unit_id');
        });

        Schema::table('product_details', function ($table) {
            //[table]_[coluna]_foregin
            $table->dropForeign(['unit_id']);
            $table->dropColumn('unit_id');
        });

        Schema::dropIfExists('units');
    }
};
