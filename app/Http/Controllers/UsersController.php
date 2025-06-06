<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\HasilRekomendasi;
use App\Models\UserJawaban;
use App\Service\SpkService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(SpkService $spkService) {
        $alreadyChosen = HasilRekomendasi::where('user_id',auth()->id())->exists();
        return view('user.homepage', [
            'alreadyChosen' => $alreadyChosen,
            'hasil' => $spkService->getHasilRekomendasi(auth()->user()), 
        ]);
    }

    public function result() {
        $nilai = HasilRekomendasi::where('user_id',auth()->user()->id)->orderBy('rangking','asc')->get();
        $alternative = $nilai->map(fn($n) => $n->alternative->name);
        $jawaban = UserJawaban::where('user_id',auth()->user()->id)->get();

        return view('user.result', [
            "hasil" => $nilai,
            "alternative" => $alternative,
            "jawabans" => $jawaban  
        ]);
    }

    public function delete(SpkService $spkService) {
       $spkService->deleteSpk(auth()->user()); 
       return redirect()->route('user.homepage');
    }
}
