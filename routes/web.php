<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('website.home');
});

Route::get('contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('contact', [\App\Http\Controllers\ContactController::class, 'save'])->name('contact');

Auth::routes([
    'register' => false // Disable new account registration
]);

/**
 * Display the dashboard.
 */
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

/**
 * Display messages list.
 */
Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages');

/**
 * Display single message.
 */
Route::get('/messages/{message}/view', [App\Http\Controllers\MessageController::class, 'show'])->name('message');

/**
 * Message settings.
 */
Route::get('/messages/settings', [App\Http\Controllers\MessageController::class, 'settings'])->name('message-settings');

/**
 * Delete message.
 */
Route::delete('messages/{message}', [App\Http\Controllers\MessageController::class, 'delete']);

/**
 * Save new subject.
 * This will add new subjects to the contact form's subjecy item.
 */
Route::post('messages/settings', [App\Http\Controllers\MessageController::class, 'message_settings_add_subject'])->name('message-settings-add-subject');

/**
 * Delete subject from list
 */
Route::delete('/messages/settings/subject/{subject}', [App\Http\Controllers\MessageController::class, 'message_settings_delete_subject'])->name('message-settings-delete-subject');

/**
 * Save email where notifications will be sent to.
 */
Route::post('/settings/email/save', [App\Http\Controllers\GlobalSettingsController::class, 'settings_add_email'])->name('settings-add-email');

