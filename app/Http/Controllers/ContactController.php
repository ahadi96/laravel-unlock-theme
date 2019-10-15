<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index()
    {
        return view('contact_us');
    }

    public function store(ContactUsRequest $request)
    {

        // to return specific request value
        //dd($request->input('first_name'));
        // or
        //dd($request->first_name);

        // to return all request values
        //dd($request->all());

        // insert request values to Database

        // the first way
        // $contact = new ContactUs;
        // $contact->first_name = $request->first_name;
        // $contact->last_name = $request->last_name;
        // $contact->email = $request->email;
        // $contact->message = $request->message;
        // $contact->save();

        // the second way 
        // $contact = ContactUs::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'message' => $request->message
        // ]);

        // the third way
        //$contact = ContactUs::create($request->all());

        // server validate data 
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required',
        //     'message' => 'required|min:10'
        // ]);

        // insert data to database
        $contact = ContactUs::create($request->all());

        // redirect the request 
        return redirect('contact')->with('success', 'Your message has been sent, and your message id is: #' . $contact->id);
    }
}
