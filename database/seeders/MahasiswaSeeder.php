<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Mahasiswa;
use App\Models\Dosen;

require_once 'vendor/autoload.php';

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Mahasiswa');
        $nidn_dosen = Dosen::pluck('nidn')->toArray();
        
        for($i=0; $i<=5; $i++){
            DB::table('mahasiswa')->insert([
                'npm' => $faker->numberBetween(1010101000,1010101199),
                'nama' => $faker->name(),
                'nidn' => $faker->randomElement($nidn_dosen),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
