<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the messages screen
     */
    public function index()
    {
        return view('app.messages', [
            'messages' => Message::all(),
        ]);
    }

    /**
     * Show single message
     */
    public function show(Message $message)
    {
        return view('app.message', [
            'name' => $message->name,
            'email' => $message->email,
            'subject' => $message->subject,
            'message' => $message->message,
            'date' => $message->created_at,
        ]);
    }

    /**
     * Delete message
     */
    public function delete(Message $message)
    {

    }

    /**
     * Settings
     */
    public function settings() {
        dd(
            'Hello Settings'
        );
    }
}
