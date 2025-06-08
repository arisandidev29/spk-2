<?php

namespace Database\Seeders;

use App\Service\TokenService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tokenservice = app(TokenService::class);

        $tokenservice->generateToken();
    }
}
