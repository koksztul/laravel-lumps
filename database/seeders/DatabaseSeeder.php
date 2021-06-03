<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            VoivodshipsTableSeeder::class,
            CitiesTableSeeder::class,
            ShopsTableSeeder::class,
            PostsTableSeeder::class,
            ImagesTableSeeder::class,
            CommentsTableSeeder::class,
        ]);
    }
}
