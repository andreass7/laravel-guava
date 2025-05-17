<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Solution::create([
            'label' => 'fruit_fly',
            'name' => 'Buah Gak Tau Penyaitnya',
            'solution' => 'Aduh Saya Gak Tau Ini Apa Penyakitnya' 
        ]);
    }
}
