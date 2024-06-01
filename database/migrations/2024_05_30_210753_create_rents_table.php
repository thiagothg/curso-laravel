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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('cliente_id');
            // $table->unsignedBigInteger('carro_id');
            $table->dateTime('period_start_data');
            $table->dateTime('date_final_expected_period');
            $table->dateTime('end_date_realized_period');
            $table->float('price', 8, 2);
            $table->integer('initial_km');
            $table->integer('final_km');
            $table->timestamps();

            //foreign key (constraints)
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->foreignId('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
