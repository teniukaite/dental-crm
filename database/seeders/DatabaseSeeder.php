<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        ServiceCategory::factory(20)->create();
        Service::factory(100)->create();

        //create admin
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('superpass'),
            'date_of_birth' => fake()->date(),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'info' => fake()->paragraph(),
            ]);
    }
}
