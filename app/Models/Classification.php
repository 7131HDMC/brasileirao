<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'classification';    


	const WIN = 3;
	const TIE = 1;

    /**
     * Get classification order by amount of points
     * 
     * @author Hari Dasa
     * @return object
     */
    public static function getClassification()
    {
        $query = self::join('teams','classification.team_id', 'teams.id')
                    ->orderBy('classification.PTS', 'desc');
        
        return $query->select('teams.*', 'classification.*')->get();
    }

    /**
     * 
     * 
     * @author Hari Dasa
     * @return object
     */
    public static function victory($clash)
    {
        $win = Classification::where('team_id',$clash->team)
                                ->first();

            $win->PTS += Classification::WIN;
            $win->J  += 1;
            $win->V  += 1;
            $win->GP += $clash->gp;
            $win->GC += $clash->gc;
            // $loss->SG = ;

            $win->save();

    }

    /**
     * 
     * 
     * @author Hari Dasa
     * @return object
     */
    public static function loss($clash)
    {
        $loss = Classification::where('team_id',$clash->team)
                                ->first();

        // $classification->PTS += ;
        $loss->J  += 1;
        $loss->D  += 1;
        $loss->GP += $clash->gp;
        $loss->GC += $clash->gc;
        // $loss->SG = ;

        $loss->save();

    } 
    
    /**
     * Save a tie
     * 
     * @author Hari Dasa
     */
    public static function tie($clash)
    {
        $home = Classification::where('team_id',$clash->home_team)
                            ->first();

        $home->PTS += Classification::TIE;
        $home->E   += Classification::TIE;

        $home->J += 1;
        $home->GP += $clash->home_gols;
        $home->GC += $clash->away_gols;
        // $classification->SG +=  ;

        $home->save();

        $away = Classification::where('team_id',$clash->away_team)
                            ->first();

        $away->PTS += Classification::TIE;
        $away->E   += Classification::TIE;

        $away->J += 1;
        $away->GP += $clash->away_gols;
        $away->GC += $clash->home_gols;
        // $classification->SG +=  ;

        $away->save();


    }

}
