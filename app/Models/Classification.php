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

    /**
     * 
     * @author Hari Dasa
     */
    public static function getClassification()
    {
        $query = self::join('teams','classification.team_id', 'teams.id')
                    ->orderBy('classification.PTS', 'desc');
        
        return $query->select('teams.*', 'classification.*')->get();
    }
}
