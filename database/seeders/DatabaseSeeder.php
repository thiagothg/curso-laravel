<?php

namespace Database\Seeders;

use App\Models\SiteContact;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            SiteContactSeeder::class
        ]);
    }
}
