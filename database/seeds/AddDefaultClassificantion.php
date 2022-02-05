<?php

use Illuminate\Database\Seeder;
use App\Models\Teams;
use App\Models\Classification;

class AddDefaultClassificantion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $teams = Teams::getTeams();
       foreach($teams as $team)
       {
            Classification::create([
                "PTS" => 0,
                "J"   => 0,
                "V"   => 0,
                "E" => 0,
                "D" => 0,
                "GP" => 0,
                "GC" => 0,
                "SG" => 0,
                "team_id" => $team->id
            ]);
       }
    }
}
