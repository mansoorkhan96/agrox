<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandleAuthController extends Controller
{
    public function index() {
        $redirect = null;

        if(request()->redirect) {
            $redirect = request()->redirect;
        }

        if(auth()->user()->role_id && auth()->user()->proficiency_id) {

            if(auth()->user()->role_id == 5) {
                
                return redirect()->route('home');
            } else if(auth()->user()->role_id == 1) {

                return redirect()->route('admin.index');
            } else if(auth()->user()->role_id == 2) {

                return redirect()->route('farmer.index');
            } else if(auth()->user()->role_id == 3) {

                return redirect()->route('consultant.index');
            } else if(auth()->user()->role_id == 4) {

                return redirect()->route('academic.index');
            }
        } else {

            return redirect()->route('profile.edit', auth()->user()->id);
        }
    }
}
