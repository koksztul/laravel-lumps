<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()
        ->state(new Sequence([
            'name' => 'admin',
            'email' => 'admin@o2.pl',
            'type' => 'admin',
            'password' => bcrypt('admin')
        ]))->create();

        \App\Models\User::factory(20)->create();
    }
}
