<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Classification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassificationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(!empty(Classification::getClassification()));
        // dd(Classification::getClassification());
    }
}
