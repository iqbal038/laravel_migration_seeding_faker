<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Dosen;

require_once 'vendor/autoload.php';

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Dosen');
       
            for($i=0; $i<=5; $i++){
                DB::table('dosen')->insert([
                    'nidn' => $faker->numberBetween(1212121212,2323232323),
                    'nama' => $faker->name(),
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                ]);
            }
    }
}
