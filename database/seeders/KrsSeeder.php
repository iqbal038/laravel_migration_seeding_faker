<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Dosen;

require_once 'vendor/autoload.php';

class KrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\krs');
        $kode_matkul = Matakuliah::pluck('kode_matakuliah')->toArray();
        $npm = Mahasiswa::pluck('npm')->toArray();
        
        for($i=0; $i<=5; $i++){
            DB::table('krs')->insert([
                'id' => $faker->numberBetween(0,10),
                'npm' => $faker->randomElement($npm),
                'kode_matakuliah' => $faker->randomElement($kode_matkul),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
