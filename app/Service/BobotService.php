<?php
namespace App\Service;

use App\Models\Bobot;
use App\Models\Kriteria;

class BobotService {
    public function bobotNormalization() {
        $allBobots = Kriteria::all();

        $kriteriaBobots = $allBobots->map(function($kriteria) {
            return $kriteria->bobot->nilai;
        });
            $sumBobots =$allBobots->sum(function($kriteria) {
                return (int)$kriteria->bobot->nilai;
            });


        $normalizedBobots = $kriteriaBobots->map(function($bobot) use ($sumBobots) {
            return number_format($bobot / $sumBobots,2);
        });

        return $normalizedBobots->toArray();

    }


    public function setNormalizaionBobotToKriteria() {
        $normalizedBobots = $this->bobotNormalization();

        $allKriterias = Kriteria::all();


        foreach($allKriterias as $index => $kriteria) {
            $kriteria->normalisasi = $normalizedBobots[$index]; 
            $kriteria->save();
        }
    }
}


?>