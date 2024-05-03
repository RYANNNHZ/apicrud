<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\siswa;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create('id_ID');

        for ($i=0; $i < 10; $i++) {
            siswa::create([
                'nama' => $faker->name,
                'umur' => $faker->numberBetween(15,19),
                'kelas' => $faker->randomElement(['XI RPL 1','XI RPL 2'])
            ]);
        }
    }
}
