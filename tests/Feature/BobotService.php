<?php

namespace Tests\Feature;

use App\Service\BobotService as ServiceBobotService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BobotService extends TestCase
{
    protected $bobotService;
    public function setUp(): void {
        parent::setUp();
        $this->bobotService = app(ServiceBobotService::class);

    }
    public function testService(): void
    {
        self::assertNotNull($this->bobotService);
    }


    public function testgetNormalisation() {
        $bobots = $this->bobotService->bobotNormalization();
        
    }


    public function testSetNormalisationBobotToKriteria() {
        $this->bobotService->setNormalizaionBobotToKriteria();
        $this->assertTrue(true);

    }
}
