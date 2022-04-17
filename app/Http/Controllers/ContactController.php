<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function send(ContactRequest $request)
    {
        Mail::to(env('MAIL_TO'))->send(new ContactMessage($request->user, $request->message));

        return redirect(back())->with('message', 'Zpráva byla úspěšně odeslána.');
    }
}
