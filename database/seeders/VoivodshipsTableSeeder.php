<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VoivodshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Voivodship::factory(16)->create();
    }
}
