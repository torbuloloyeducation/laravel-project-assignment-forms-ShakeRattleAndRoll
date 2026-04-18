<?php

use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/formtest', function(){
    $emails = session()->get('$emails', []);

    return view('formtest',[
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function(){
    $email = request('email');

    // check if email is empty
    if ($email == null) {
        session()->flash('error-message', 'Email input is invalid!');

        return redirect()->back();
    };

    request()->validate([
        'email' => 'email|required' ]);

    $duplicatefinder = session()->get('$emails', []);

    // check if the email save reach the limit of 5
    if (count($duplicatefinder) >= 5) {
        session()->flash('error-message', 'Email reach maximum limit 5!');
    
        return redirect()->back();
    }

    // check if the email already exist. if it exist this run
    if (in_array($email,$duplicatefinder)) {
        session()->flash('error-message', 'This email already exist!');

        return redirect()->back();
    };

    session()->flash('message', 'Email added successfully!');

    session()->push('$emails', $email);

    return redirect('/formtest');
});

// the delete button route
Route::post('/delete-email', function() {
    $id = request('index');
    $emails = session()->get('$emails', []);

    unset($emails[$id]);

    session()->flash('message', 'Email deleted successfully!');
    session()->put('$emails', array_values($emails));
    return redirect() -> back();
});

Route::get('/delete-emails', function(){
    session()->forget('$emails');
    return redirect('/formtest');
});