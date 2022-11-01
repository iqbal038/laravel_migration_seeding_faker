<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Matakuliah;
use App\Models\Dosen;

require_once 'vendor/autoload.php';

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Matakuliah');
        
        for($i=0; $i<=5; $i++){
            DB::table('matakuliah')->insert([
                'kode_matakuliah' => $faker->numerify('KD-###'),
                'nama_matakuliah' => $faker->numerify('MK-###'),
                'sks' => $faker->randomDigitNot(0),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
