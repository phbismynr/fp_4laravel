<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 15; $i++) { 
            Mahasiswa::create([
                'nim' => $faker->unique()->numerify('17090###'),
                'nama' => $faker->name,
                'kelas' => $faker->randomElement($array = array ('6A','6B','6C','6D')),
                'role_id' => '1'
            ]);
        }
    }
}
