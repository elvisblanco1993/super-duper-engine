<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Rules\Recaptcha;

class ContactController extends Controller
{
    /**
     *
     */


    /**
     * Display contact page
     */
    public function index()
    {
        return view('website.contact');
    }

    /**
     * Submit contact form
     */
    public function save(Request $request)
    {
        request()->validate([
            'g-recaptcha-response' => ['required', new Recaptcha],
            'name' => ['required',],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'subject' => ['required'],
            'message' => ['max:500'],
        ]);

        $message = new Message([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        $message->save();

        return redirect('/contact')
            ->with('message', 'We have received your request. A member from our team will reach out to you soon.');
    }
}
