<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BobotController extends Controller
{
    public function show(Bobot $bobot)
    {
        return view('admin.bobot', [
            'bobots' => Bobot::all()
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'nilai' => 'required|numeric',
            'keterangan' => 'required|string|max:255'
        ]);

        Bobot::create([
            'normalisasi' => '0.1',
            ...$validated
        ]);

        return redirect()->route('admin.bobot')->with('success', 'Bobot created successfully.');
    }


    public function update(Request $request, Bobot $bobot)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:bobots,id',
            'nilai' => 'required|numeric',
            'keterangan' => 'required|string|max:255'
        ]);


        if ($validator->fails()) {
            return back()
                    ->withErrors($validator, 'edit')
                    ->withInput()
                    ->with('bobot_id',$request->input('id'));
        }


        $validated  = $validator->validate();

        $newBobot = Bobot::find($validated['id']);
        $newBobot->nilai = $validated['nilai'];
        $newBobot->keterangan = $validated['keterangan'];
        $newBobot->save();

        return back()->with('success','Bobot Successfully Updated');
    }


    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $bobot = Bobot::findOrFail($id);
        $bobot->delete();

        return back()->with('success', 'Bobot deleted successfully.');
    }
}
