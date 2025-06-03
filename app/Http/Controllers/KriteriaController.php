<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Kriteria;
use App\Service\BobotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KriteriaController extends Controller
{
    public function show()
    {
        return view('admin.kriteria', [
            'kriterias' => Kriteria::all(),
            'bobots' => Bobot::all()
        ]);
    }

    public function create(Request $request, BobotService $bobotService)
    {
        $validated = $request->validate([
            'kd_kriteria' => 'required|unique:kriterias,kd_kriteria',
            'nama' => 'required',
            'bobot_id' => 'required|exists:bobots,id',
            'desc' => 'nullable|string'
        ]);




        Kriteria::create([
            'kd_kriteria' => $validated['kd_kriteria'],
            'nama' => $validated['nama'],
            'bobot_id' => $validated['bobot_id'],
            'desc' => $validated['desc']
        ]);


        $bobotService->setNormalizaionBobotToKriteria();
        
        
        return back()
        ->with('success', 'Kriteria successfully created');
    }


    public function update(Request $request, Kriteria $kriteria, BobotService $bobotService)
    {
        $validator = Validator::make($request->all(), [
            'kd_kriteria' => ['required', Rule::unique('kriterias')->ignore($request->input('kd_kriteria' ),'kd_kriteria')],
            'nama' => 'required',
            'bobot_id' => 'required|exists:bobots,id',
            'desc' => 'nullable|string'
        ]);
        
        
        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'edit')
                ->withInput()
                ->with('kriteria_id', $request->input('kd_kriteria'));
            }
            
            
            $validated  = $validator->validate();

            
            $newKriteria = Kriteria::updateOrCreate(
                ['kd_kriteria' => $request->input('old_kd_kriteria')],
                [...$validated]
            );
            
            $bobotService->setNormalizaionBobotToKriteria();

        return back()->with('success', 'Bobot Successfully Updated');
    }


    public function destroy(Request $request, Kriteria $kriteria)
    {
        $id = $request->input('id');
        $kriteria->where('kd_kriteria', $id)->delete();

        return back()
            ->with('success', 'Kriteria successfully deleted');
    }
}
