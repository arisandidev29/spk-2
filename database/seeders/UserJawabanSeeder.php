<?php

namespace Database\Seeders;

use App\Models\Alternative;
use App\Models\Kriteria;
use App\Models\User;
use App\Models\UserJawaban;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserJawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        foreach (User::where('role',  'user')->get() as $user) {
            foreach (Kriteria::all() as $kriteria) {
                foreach (Alternative::all() as $alternative) {
                    UserJawaban::create([
                        'user_id' => $user->id,
                        'kd_kriteria' => $kriteria->kd_kriteria,
                        'alternative_id' => $alternative->id,
                        'jawaban' => rand(1, 5)
                    ]);
                }
            }
        }
    }
}
