<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Bahasa Indonesia

        for ($i = 0; $i < 160; $i++) {
            DB::table('ceritas')->insert([
                'tema' => $faker->randomElement([
                    'Karma Baik',
                    'Karma Buruk',
                    'Pengendalian Diri',
                    'Keserakahan',
                    'Kedermawanan',
                    'Kebijaksanaan',
                    'Perjuangan Hidup',
                    'Kesabaran',
                    'Penderitaan',
                    'Kebajikan',
                ]),
                'cerita' => $faker->paragraph(4), // 4 kalimat cerita
                'makna' => $faker->sentence(),     // ringkasan makna
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
