<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\LaravelPdf\Facades\Pdf;
use Tests\TestCase;

class PdfTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Pdf::view('tes')->disk('public')->save('tst.pdf');
    }
}
