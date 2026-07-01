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
   public function create(Request $request)
{
    $validated = $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'subject' => 'required|string|max:255',
        'message' => 'required',
    ]);

    Contact::create([
        'fullname' => $validated['fullname'],
        'email'    => $validated['email'],
        'number'   => $validated['phone'],
        'topic'    => $validated['subject'],
        'massage'  => $validated['message'],
    ]);

    return redirect()->route('pages.contact');
}
public function index(){
    $contacts=Contact::all();
    return view('contact.index',compact('contacts'));
}
}
