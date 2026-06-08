<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepairController extends Controller
{
    //
    public function repair(){
        return view('frontend.repairs.repair');
    }
}
