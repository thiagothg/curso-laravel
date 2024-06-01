<?php

namespace Database\Seeders;

use App\Models\Rent;
use Database\Factories\RentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Rent::factory()->count(10)->create();
    }
}
