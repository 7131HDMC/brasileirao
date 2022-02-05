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
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTieClashTest()
    {

        $home =  Classification::where('PTS','>=',0)
                                ->inRandomOrder()
                                ->first();
        $away =  Classification::where('id','<>',$home->id)
                                ->inRandomOrder()
                                ->first();
        $clash = [
            "home_team" =>  $home->team_id,
            "away_team" =>  $away->team_id,
            "away_gols" => 1,
            "home_gols" => 1,
        ];
        $class = Classification::tie((object)$clash);
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLossClashTest()
    {

        $loss =  Classification::where('PTS','>=',0)
                                    ->inRandomOrder()
                                    ->first();
        $clash = [
            "team" =>  $loss->team_id,
            "gp" => 3,
            "gc" => 5,
        ];

        $class = Classification::loss((object)$clash);

        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testVictoryClashTest()
    {

        $win =  Classification::where('PTS','>=',0)
                                    ->inRandomOrder()
                                    ->first();
        $clash = [
            "team" =>  $win->team_id,
            "gp" => 6,
            "gc" => 1,
        ];

        $class = Classification::victory((object)$clash);

        $this->assertTrue(true);
    }


}
