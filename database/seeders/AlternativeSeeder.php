<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alternative::create([
            'kode_alternative' => "SI",
            'name' => 'sistem informasi'
        ]);
        Alternative::create([
            'kode_alternative' => "MI",
            'name' => 'Manajemen Informatika'
        ]);
        Alternative::create([
            'kode_alternative' => "KA",
            'name' => 'Komputerisasi Akuntansi'
        ]);
        
    }
}
