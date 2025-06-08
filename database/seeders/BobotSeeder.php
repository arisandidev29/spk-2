<?php

namespace Database\Seeders;

use App\Models\Bobot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bobot::create([
            'nilai' => 1,
            'keterangan' => 'Sangat Rendah'
        ]);
        Bobot::create([
            'nilai' => 2,
            'keterangan' => 'Rendah'
        ]);
        Bobot::create([
            'nilai' => 3,
            'keterangan' => 'Cukup'
        ]);
        Bobot::create([
            'nilai' => 4,
            'keterangan' => 'Baik'
        ]);
        Bobot::create([
            'nilai' => 5,
            'keterangan' => 'Sangat Baik'
        ]);
    }
}
