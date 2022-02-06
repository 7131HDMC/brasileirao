<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;
use App\Models\Teams;
use App\Models\Clashes;

class BrasileiraoController extends Controller
{
    /**
     * Index function to show brasileirão list
     */
    public function index()
    {
        return view("brasileirao");
    }

    /**
     * 
     * @author Hari Dasa
     */
    public function setClashe(Request $request)
    {
        $params = $request->all();
        Clashes::setClashe($request);
    }

    /**
     * 
     * @author Hari Dasa
     */
    public function getClassification(Request $request)
    {
        return Classification::getClassification();
    }


    /**
     * 
     * @author Hari Dasa
     */
    public function getTeams(Request $request)
    {
        return Teams::getTeams();
    }
}
