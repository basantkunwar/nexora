<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    //
    public function index(){
        $users=User::all();
        return view('users.index',compact('users'));
    }
    public function delete($id){
        $user=User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
    
}
