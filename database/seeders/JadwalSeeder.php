<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Jadwal;
use App\Models\Dosen;
use App\Models\Matakuliah;

require_once 'vendor/autoload.php';

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Jadwal');
        $nidn_dosen = Dosen::pluck('nidn')->toArray();
        $kode_matkul = Matakuliah::pluck('kode_matakuliah')->toArray();
        
        for($i=0; $i<=5; $i++){
            DB::table('jadwal')->insert([
                'id' => $faker->numberBetween(0,10),
                'kode_matakuliah' => $faker->randomElement($kode_matkul),
                'nidn' => $faker->randomElement($nidn_dosen),
                'kelas' => $faker->randomLetter(),
                'hari' => $faker->dayOfWeek(),
                'jam' => $faker->dateTime(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
