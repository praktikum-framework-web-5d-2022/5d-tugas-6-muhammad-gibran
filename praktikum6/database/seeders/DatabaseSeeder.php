<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penumpang;
use App\Models\Tiket;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Tiket::create([
            'nama'=>'Bisnis'
        ]);
        Tiket::create([
            'nama'=>'Ekonomi'
        ]);

        $faker = Faker::create('id_ID');
        $faker->seed(123);

        for($i=0;$i<10;$i++){
            Penumpang::create([
                'nomor_penumpang' => $faker->unique()->numerify(),
                'nama' => $faker -> firstName.''. $faker->lastName,
                'tiket_id' => $faker -> numberBetween(1,2)
            ]);
        }

    }
}
