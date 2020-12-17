<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Subject;
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
        return view('app.messages.index', [
            'messages' => Message::all()->sortByDesc('created_at')->sortBy('read'),
        ]);
    }

    /**
     * Show single message
     */
    public function show(Message $message)
    {

        $message->update([
            'read' => 1
        ]);

        return view('app.messages.show', [
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
        $message->delete();
        return redirect( route('messages') )->with('message', 'Message successfully deleted.');
    }

    /**
     * Settings
     */
    public function settings() {
        return view('app.messages.settings', [
            'subjects' => Subject::all(),
        ]);
    }

    /**
     * Save new subject
     */
    public function message_settings_add_subject(Request $request) {
        $request->validate([
            'subject' => ['required', 'string', 'unique:subjects,name']
        ]);

        $value = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($request->get('subject')));

        $subject = new Subject([
            'name' => $request->get('subject'),
            'value' => $value,
        ]);

        $subject->save();

        return redirect( route('message-settings') )->with('message', 'Subject successfully added.');
    }

    /**
     * Delete subject from list
     */
    public function message_settings_delete_subject(Subject $subject) {
        $subject->delete();

        return redirect( route('message-settings') )->with('message', 'Subject successfully deleted.');
    }
}
