<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContact;

class SiteContactSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       SiteContact::factory()->count(10)->create();
    }
}
