<?php

namespace Database\Seeders;

use App\Models\Alternative;
use App\Models\Kriteria;
use App\Models\User;
use App\Models\UserJawaban;
use App\Service\SpkService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class HasilRekomendasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10 ; $i++) {
            $user = User::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'role' => 'user', 
                'password' => Hash::make('pass'),
            ]);

            foreach (Kriteria::all() as $kriteria) {
                foreach (Alternative::all() as $alternative) {
                    $UserJawaban = UserJawaban::create([
                        'user_id' => $user->id,
                        'kd_kriteria' => $kriteria->kd_kriteria,
                        'alternative_id' => $alternative->id,
                        'jawaban' => rand(1, 5)
                    ]);

                }
            }
            $spkService = app(SpkService::class);
            $spkService->createSpk($user);
        }
    }
}
