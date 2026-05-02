<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
public function store(Request $request)
    {
        $data=$request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Create a new subscriber
        Subscriber::create($data);
        // Redirect back with a success message
        return redirect()->back()->with('success-siddeber', 'Thank you for subscribing to our newsletter!');
    }


    public function storeSubscriberFooter(Request $request)
    {
        $data = $request->validate([
            'email_footer' => 'required|email|unique:subscribers,email',
        ]);

        // Create a new subscriber
        Subscriber::create(['email' => $data['email_footer']]);
        // Redirect back with a success message
        return redirect()->back()->with('success-footer', 'Thank you for subscribing to our newsletter!');
    }

    //
}
