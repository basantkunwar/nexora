<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function contact(){
        return view('pages.contact');
    }
    public function create(request $request){
        $validate=$request->validate([
'fullname'=>$request->fullname,
'email'=>$request->email,
'number'=>$request->phone,
'topic'=>$request->subject,
'message'=>$request->massage
        ]);
        $create=Contact::create($validate);
        return redirect()->route('pages.contact');
    }
}
