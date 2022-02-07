<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Classification;
use App\Models\Clashes;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClashesTest extends TestCase
{

    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSetClashTieTest()
    {

        $win =  Classification::where('PTS','>=',0)
                                    ->inRandomOrder()
                                    ->first();
        $clash = [
            "home_gols" => 3,
            "home_team" => 4,
            "away_team" => 5,
            "away_gols" => 3,
        ];

        $class = Clashes::setClashe((object)$clash);

        $this->assertTrue(!empty(Clashes::getClashes()));
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSetClashWinLossTest()
    {

        $win =  Classification::where('PTS','>=',0)
                                    ->inRandomOrder()
                                    ->first();
        $loss =  Classification::where('id','<>',$win->id)
                                    ->inRandomOrder()
                                    ->first();
        $clash = [
            "home_gols" => 6,
            "home_team" => $win->team_id,
            "away_team" => $loss->team_id,
            "away_gols" => 3,
        ];

        $class = Clashes::setClashe((object)$clash);

        $this->assertTrue(!empty(Clashes::getClashes()));
    }

}
