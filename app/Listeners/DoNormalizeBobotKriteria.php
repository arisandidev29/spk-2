<?php

namespace App\Listeners;

use App\Events\NormalizeBobotkriteria;
use App\Service\BobotService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DoNormalizeBobotKriteria
{
    protected $bobotService;
    public function __construct(BobotService $bobot)
    {
        $this->bobotService = $bobot;
    }

    /**
     * Handle the event.
     */
    public function handle(NormalizeBobotkriteria $event): void
    {
        $this->bobotService->setNormalizaionBobotToKriteria();
    }
}
