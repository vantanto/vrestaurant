<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('contact.index');
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validateWithBag('contacts', [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|string',
        ]);

        Mail::to(config('mail.contact_us'))->send(new ContactUs($validated));
        return redirect()->route('members.contacts.index')->with('success', 'Mail Successfully Sended.');
    }
}
