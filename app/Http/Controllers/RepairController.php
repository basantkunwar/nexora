<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepairRequest;
use App\Models\Repair;
use Illuminate\Http\Request;
use Pest\Support\View;

class RepairController extends Controller
{
    //
    public function repair(){
        return view('frontend.repairs.repair');
    }
    public function store(RepairRequest $request){
$validate=$request->validated();
Repair::create($validate);
return View('frontend.repairs.repair');
    }

    public function index(){
        $repairs=Repair::get();
        return view('repair.index',compact('repairs'));
    }
}
