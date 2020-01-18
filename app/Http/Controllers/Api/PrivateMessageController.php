<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\PrivateMessage;
use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store() {
        $data = request()->validate([
            'consultancy_id' => 'required',
            'to' => 'required',
            'message' => 'required'
        ]);

        $data['from'] = auth()->user()->id;

        if(PrivateMessage::create($data)) {
            return back()->with('success', 'Message was sent!');
        }

        return back()->with('success', 'Could not send message!');
    }
}
