<?php

namespace App\Http\Controllers;

use App\Models\HasilRekomendasi;
use App\Models\Token;
use App\Models\User;
use App\Models\UserJawaban;
use App\Service\SpkService;
use App\Service\TokenService;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class adminUserController extends Controller
{
    public function show(TokenService $tokenService) {
        $users = User::where('role',"<>",'admin')->get();



        return view('admin.user', [
            'token' => $tokenService->getToken(),
            'users' => $users
        ]);
    }

    public function deleteUser(Request $request,SpkService $spkService) {
        $user = User::find($request->input('userId'));

        if($user->hasilRekomendasi->isNotEmpty()) {
            $spkService->deleteSpk($user);
        }


        User::find($user->id)->delete();

        return back()->with('success','user success deleted');

    }


    public function detailUser($id) {
        $user = User::find($id);
        $hasil = HasilRekomendasi::where('user_id',$user->id)->get();
        $alternatives = $hasil->map(fn($h) => $h->alternative->name);
        $jawaban = UserJawaban::where('user_id',$user->id)->get();



        return view('admin.user_detail', [
            'user' => $user,
            'hasil' => $hasil,
            'alternatives' => $alternatives,
            'jawabans' => $jawaban
        ]);
    }

    public function showUserSpk() {
        $userSpk = User::whereHas('hasilRekomendasi')->get();
        return view('admin.user_spk', [
            'userSpk' => $userSpk
        ]);
    }

    // export 

    public function userExport() {
        $users = User::where('role',"<>",'admin')->get();
        $exportDate = date('Y-m-d H:i:s'); // Format: Tahun-Bulan-Tanggal Jam:Menit:Detik
        
        
        return FacadePdf::loadView('pdf.users_only_report',[
            "users" => $users,
            "exportDate" => $exportDate
            ])->setPaper('a4')->stream('userReport');
            
        }
        
        public function userSpkExport() {
            $userSpk = User::whereHas('hasilRekomendasi')->get();
            $exportDate = date('Y-m-d H:i:s'); // Format: Tahun-Bulan-Tanggal Jam:Menit:Detik
         return FacadePdf::loadView('pdf.users_spk_report', [
           "userSpk" => $userSpk ,
           "exportDate" => $exportDate
         ])->setPaper('a4')->stream('userspkReport');
    }



    public function refreshToken(TokenService $tokenService) {
        $tokenService->generateToken();
        return back()->with('success','success generate new token');
    }
}
