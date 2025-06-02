<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlternativeController extends Controller
{

    public function show(Alternative $alternative) {
        $AllAlternative = $alternative->all(); 
        return view('admin.alternative', [
            'alternatives' => $AllAlternative
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'kode_alternative' => 'required|string',
            'name' => 'required|string',
        ]);


        $alternative = new Alternative();
        $alternative->kode_alternative = $validated['kode_alternative'];
        $alternative->name = $validated['name'];
        $alternative->save();


        return back()->with('success', 'Alternative created successfully.');
    }



   public function update(Request $request, Alternative $alternative)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:alternatives,id',
            'kode_alternative' => 'required',
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return back()
                ->withErrors($validator,'edit')
                ->withInput()
                ->with('edit_id',$request->input('id'));

        }


        $validated = $validator->validated();

        $newAlternative = $alternative->find($validated['id']);
        $newAlternative->kode_alternative = $validated['kode_alternative'];
        $newAlternative->name = $validated['name'];
        $newAlternative->save();
        

        return back()->with('success', 'Alternative updated successfully.');

    }

    public function destroy(Request $request , Alternative $alternative)
    {
        $id = $request->input('alternative_id'); 


        $alternative->find($id)->delete();

        return back()->with('success', 'Alternative Successfully delete');
    }
}
