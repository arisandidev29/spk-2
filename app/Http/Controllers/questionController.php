<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Kriteria;
use App\Models\UserJawaban;
use App\Service\SpkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class questionController extends Controller
{
    public function view() {
        return view('user.question',[
            "kriterias" => Kriteria::all(),
            "alternatives" => Alternative::all()
        ]);
    }



    public function create(Request $request, SpkService $spkService) {


        $validatationData = [];

        foreach(Kriteria::all() as $kriteria) {
            $validatationData["{$kriteria->kd_kriteria}.*.jawaban"] = 'required|numeric';
        }

        // valdate input 

        $validator = Validator::make($request->all(), $validatationData);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        foreach($request->input('userAnswer') as $jawabanKriteria) {
            foreach($jawabanKriteria as $jawaban) {
                // dd($jawaban);
                UserJawaban::create([
                    'user_id' => auth()->user()->id,
                    'kd_kriteria' => $jawaban['kd_kriteria'],
                    'alternative_id' => $jawaban['alternative_id'],
                    'jawaban' => $jawaban['jawaban']
                ]);
            }
        }

        $spkService->createSpk(auth()->user());


        return Redirect()->route('user.result');

        









    }
}
