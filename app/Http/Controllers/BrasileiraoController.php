<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;

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
        dd($params);
    }

    /**
     * 
     * @author Hari Dasa
     */
    public function getClassification(Request $request)
    {
        $params = $request->all();
        return Classification::getClassification();
    }
}
