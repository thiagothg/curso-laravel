<?php

namespace Database\Seeders;

use Database\Seeders\App\ClientSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(50)->withPersonalTeam()->create();

        // User::factory()->withPersonalTeam()->create([
        //     'name' => 'Thiago User',
        //     'email' => 'thiago@example.com',
        //     'password' => Hash::make('123'),
        //     'email_verified_at' => now(),
        // ]);

        $this->call([
            // SiteContactSeeder::class
            BrandSeeder::class,
            ModeloSeeder::class,
            CarSeeder::class,
            ClientSeeder::class,
            RentSeeder::class,
        ]);
    }
}
