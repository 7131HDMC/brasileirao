<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clashes extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clashes';

	/**
     * 
     * 
     * @author Hari Dasa
	 * @param clash
     * @return object
     */
    public static function setClashe($clash)
    {
		$clashes = new Clashes();

		$clashes->home_gols = $clash->home_gols;
		$clashes->home_team = $clash->home_team;
		$clashes->away_team = $clash->away_team;
		$clashes->away_gols = $clash->away_gols;
		$clashes->save();

		if($clash->home_gols == $clash->away_gols){
			Classification::tie($clash);

		} else {
			$loss = [
				"team" => 0 ,
				"gp" => 0,
				"gc" => 0,
			];
			$win = $loss;

			if($clash->home_gols > $clash->away_gols){
				$win['team'] = $clash->home_team;
				$win['gp'] = $clash->home_gols;
				$win['gc'] = $clash->away_gols;

				$loss['team'] = $clash->away_team;
				$loss['gp'] = $win['gc'];
				$loss['gc'] = $win['gp'];
			} else {
				$win['team'] = $clash->away_team;
				$win['gp'] = $clash->away_gols;
				$win['gc'] = $clash->home_gols;

				$loss['team'] = $clash->home_team;
				$loss['gp'] = $win['gc'];
				$loss['gc'] = $win['gp'];
			}
			Classification::victory((object)$win);
			Classification::loss((object)$loss);
		}
		
    }

	/**
     * 
     * @author Hari Dasa
     */
    public static function getClashes()
    {
        return self::select('id')->get();
    }
}
