<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    public function index(){
        $cycles=Cycle::All();
        return view('BackOffice.Cycle.index')->with(compact('cycles'));
    }
}
