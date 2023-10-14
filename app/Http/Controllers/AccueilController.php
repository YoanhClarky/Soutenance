<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Image;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index (){
        $cycles=Cycle::All();
        $images=Image::All();
        return view('index')->with(compact('cycles','images'));
        }

        public function api (){
            return view('api');
            }

        public function liste(){
            
            $cycles=Cycle::All();
            return view('FrontOffice.liste')->with(compact('cycles'));
            }
}

