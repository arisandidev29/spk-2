<?php

namespace App\Service;

use App\Models\Alternative;
use App\Models\HasilRekomendasi;
use App\Models\User;
use App\Models\UserJawaban;

class SpkService
{
    public function calculateVektorS($user)
    {

        $userjawaban = UserJawaban::where('user_id', $user->id)
            ->get()
            ->groupBy('alternative_id');


        $result = $userjawaban->map(function ($jawaban) {
            return  number_format($jawaban->map(function ($j) {
                return pow($j->jawaban, $j->kriteria->normalisasi);
            })->reduce(function ($carry, $item) {
                return $carry * $item;
            }, 1), 2);
        });


        return $result;
    }


    public function calculateVektorV($vektorSResult)
    {
        $vektorV = $vektorSResult->map(function ($vektorS) use ($vektorSResult) {
            return number_format($vektorS / $vektorSResult->sum(), 2);
        });
        return $vektorV;
    }

    public function createSpk($user)
    {
        $vektorS = $this->calculateVektorS($user);
        $vektorV = $this->calculateVektorV($vektorS);

        // dd($vektorV);

        foreach (Alternative::all() as $key => $alternative) {
            $key = $alternative->id;
            $nilaiS = $vektorS->get($key);
            $nilaiV = $vektorV->get($key);

            HasilRekomendasi::create([
                'user_id' => $user->id,
                'alternative_id' => $key,
                'vektor_s' => $nilaiS,
                'vektor_v' => $nilaiV,
                'rangking' => 0,
            ]);

            // rangking 
            $hasil = HasilRekomendasi::where('user_id', $user->id)
                ->orderBy('vektor_v', 'desc')
                ->get();

            $rank = 1;

            foreach ($hasil as $item) {
                $item->rangking = $rank;
                $item->save();
                $rank++;
            }


        }

    }
    public function getHasilRekomendasi($user)
    {
        return HasilRekomendasi::where('user_id', $user->id)
            ->orderBy('rangking', 'asc')
            ->get();
    }


    public function deleteSpk($user){
        UserJawaban::where('user_id',$user->id)->delete();
        HasilRekomendasi::where('user_id',$user->id)->delete();

    }
}
