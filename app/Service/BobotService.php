<?php

namespace App\Service;

use App\Models\Bobot;
use App\Models\Kriteria;

class BobotService
{
    public function bobotNormalization()
    {
        $allKriteria= Kriteria::all();

        $kriteriaBobots = $allKriteria->map(function ($kriteria) {
            return $kriteria->bobot->nilai;
        });

        $sumBobots = $allKriteria->sum(function ($kriteria) {
            return (int)$kriteria->bobot->nilai;
        });


        $normalizedBobots = $allKriteria->map(function ($kriteria) use ($sumBobots) {
            $normalize =  number_format($kriteria->bobot->nilai / $sumBobots, 4);
            if($kriteria->kategori == 'cost') {
                $normalize *= -1;
            }

            return $normalize;
        });

        return $normalizedBobots->toArray();
    }


    public function setNormalizaionBobotToKriteria()
    {
        $normalizedBobots = $this->bobotNormalization();

        $allKriterias = Kriteria::all();


        foreach ($allKriterias as $index => $kriteria) {
            $kriteria->normalisasi = $normalizedBobots[$index];
            $kriteria->save();
        }
    }
}
