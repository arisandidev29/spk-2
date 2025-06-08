<?php

namespace Database\Seeders;

use App\Models\Bobot;
use App\Models\Kriteria;
use App\Service\BobotService;
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
            'kd_kriteria' => 'C1',
            'nama' => 'Minat',
            'bobot_id' => Bobot::where('nilai',5)->first()->id,
            'desc' => 'fdf'
        ]);
        Kriteria::create([
            'kd_kriteria' => 'C2',
            'nama' => 'Bakat',
            'bobot_id' => Bobot::where('nilai',4)->first()->id,
            'desc' => 'fdf'
        ]);
        Kriteria::create([
            'kd_kriteria' => 'C3',
            'nama' => 'Prospek Kerja',
            'bobot_id' => Bobot::where('nilai',5)->first()->id,
            'desc' => 'fdf'
        ]);
        Kriteria::create([
            'kd_kriteria' => 'C4',
            'nama' => 'Saran Keluarga',
            'bobot_id' => Bobot::where('nilai',4)->first()->id,
            'desc' => 'fdf'
        ]);
        Kriteria::create([
            'kd_kriteria' => 'C5',
            'nama' => 'Nilai Akademik',
            'bobot_id' => Bobot::where('nilai',5)->first()->id,
            'desc' => 'fdf'
        ]);


        $BobotService = app(BobotService::class);
        $BobotService->setNormalizaionBobotToKriteria();
    }
}
