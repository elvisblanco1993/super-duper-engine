<?php

namespace App\Http\Controllers;

use App\Models\GlobalSettings;
use Illuminate\Http\Request;

class GlobalSettingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Save email
     */
    public function settings_add_email(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email']
        ]);

        // Settings First Run
        if (GlobalSettings::count() == 0) {
            $email = new GlobalSettings([
                'email_to' => $request->get('email'),
            ]);

            $email->save();
        } else {
            // Grab System Settings (first item in table)
            $settings = GlobalSettings::first();

            $settings->update([
                'email_to' => $request->get('email'),
            ]);
        }

        return redirect( route('message-settings') )->with('message', 'Email notification settings updated.');
    }
}
