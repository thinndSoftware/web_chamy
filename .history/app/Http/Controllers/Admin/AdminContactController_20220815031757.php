<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function index()
    {
        $contacts = $this->contact->paginate(5);
        return view('admin.contacts.contact',compact('contacts'));
    }
    public function view($id)
    {
        $contact =  Contact::find($id);
        return view('admin.contacts.contact-detail',compact('contact'));
    }
    public function sendContact(Request $request)
    {
        if(empty($request->message)){
            return redirect()->back();
        }
        $mailable = new ContactMail($email,$message);

    }
}

