<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Client;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database. php artisan migrate:fresh --seed komanda
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Client::factory()->count(30)->create();
        // Company::factory()->count(10)->create();
        $this->call([
            TypeSeeder::class,
            CompanySeeder::class,
            ClientSeeder::class,

            // ClientSeeder::class
        ]);
    }
}
