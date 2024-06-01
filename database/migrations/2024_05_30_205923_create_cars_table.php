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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('modelo_id');
            $table->string('plate', 10)->unique();
            $table->boolean('available');
            $table->integer('km');
            $table->timestamps();

            //foreign key (constraints)
            $table->foreignId('modelos_id')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
