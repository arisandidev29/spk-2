<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class spktest extends TestCase
{
    public $spkService;

    public function setUp(): void
    {
        parent::setUp();

        $this->spkService = app(\App\Service\SpkService::class);
    }
    public function testservice(): void
    {
        self::assertNotNull($this->spkService);
    }

    public function testCalculateVektorS(): void
    {
        $result = $this->spkService->calculateVektorS(User::where('name', 'nandi')->first());
        $this->assertEquals(3, count($result));
    }

    public function testCalculateVektorV()
    {
        $result = $this->spkService->calculateVektorV(User::where('name', 'nandi')->first());
        $this->assertEquals(3, count($result));
    }

    public function testCreateSpk()
    {
        $user = User::where('name', 'nandi')->first();
        $this->spkService->createSpk($user);
    }
}
