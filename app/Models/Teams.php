<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teams';
	
	/**
     * Get all teams
     * @author Hari Dasa
     */
    public static function getTeams()
    {
        return self::select('id', 'team_name', 'team_flag')->get();
    }

	 
}
