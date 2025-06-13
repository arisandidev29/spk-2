<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\HasilRekomendasi;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function show()
    {


        $dataAlternative = HasilRekomendasi::where('rangking', 1)
            ->whereHas('user', function ($query) {
                $query->where('role', 'user');
            })
            ->select( DB::raw('COUNT(*) as jumlah_user'))
            ->groupBy('alternative_id')
            ->orderBy('alternative_id')
            ->pluck('jumlah_user')->toArray();
        


        $data = DB::table('users')
            ->select(DB::raw("MONTH(created_at) as bulan"), DB::raw('COUNT(*) as jumlah'))
            ->whereYear('created_at', '=', 2025) // <-- filter tahun jika perlu
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->orderBy('bulan')
            ->pluck('jumlah', 'bulan') // key = bulan, value = jumlah
            ->toArray();


        $userRegistration = [];

        for ($i = 1; $i <= 12; $i++) {
            $userRegistration[] = $data[$i] ?? 0;
        }




        return view('admin.dashboard', [
            'userRegisration' => $userRegistration,
            'totalUser' => User::where('role', '<>', 'admin')->count(),
            'totalKriteria' => Kriteria::count(),
            'totalAlternative' => Alternative::count(),
            'dataAlternative' => $dataAlternative
        ]);
    }
}
