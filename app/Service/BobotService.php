<?php
namespace App\Service;

use App\Models\Bobot;

class BobotService {
    public function bobotNormalization(Bobot $bobot) {
        $bobotSum = $bobot->sum('nilai');
        $result = [];
        foreach($bobot->all() as $value) {
            $result[] = $value / $bobotSum ;
        }

        return $result;


    }
}


?>