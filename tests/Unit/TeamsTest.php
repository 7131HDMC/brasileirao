<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Teams;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(!empty(Teams::getTeams()));
    }
}
