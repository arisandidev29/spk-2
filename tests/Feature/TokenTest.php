<?php

namespace Tests\Feature;

use App\Service\TokenService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class TokenTest extends TestCase
{

    public $tokenService; 

    public function setUp(): void {
        parent::setUp();
        $this->tokenService = $this->app->make(TokenService::class);
        DB::delete('delete  from tokens');
    }



    public function testToken() {
       $service = app(TokenService::class);

        $this->assertInstanceOf(TokenService::class, $service);
    }

    public function testCreateToken(): void
    {
        $this->tokenService->generateToken();
        $this->assertDatabaseCount('tokens',1);
    }
    
    public function testGetToken() {
        $token = $this->tokenService->generateToken();
        $this->assertNotEmpty($token);
        echo $token;

    }


}
