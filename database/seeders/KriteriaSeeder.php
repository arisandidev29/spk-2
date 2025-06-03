<?php

namespace Database\Seeders;

use App\Models\Bobot;
use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::create([
            'kd_kriteria' => 'w1',
            'nama' => 'minat',
            'bobot_id' => Bobot::first()->id,
            'normalisasi' => 54, 
            'desc' => 'fdf'
        ]);
    }
}
