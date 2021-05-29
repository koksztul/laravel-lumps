<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/miasta.json";
        $data = json_decode(file_get_contents($path), true);
        $array1 = $data;
        for ($i = 0; $i < 16; $i++) {
            foreach ($array1[$i]['cities'] as $obj) {
                DB::table('cities')->insert(array(
                    'name' => $obj['text_simple'],
                    'voivodship_id' => $i + 1
                ));
            }
        }
    }
}
