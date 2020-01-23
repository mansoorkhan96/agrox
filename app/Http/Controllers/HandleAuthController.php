<?php

namespace App\Http\Controllers;

use App\Library\Cart;
use App\Library\DBCart;
use Illuminate\Http\Request;

class HandleAuthController extends Controller
{
    public function index() {
        $redirect = null;

        if(session()->has('mcart')) {
            foreach(session()->get('mcart') as $item) {
                DBCart::add(
                    $item['id'],
                    $item['image'],
                    $item['name'],
                    $item['details'],
                    $item['qty'],
                    $item['price'],
                    $item['slug']);
            }

            Cart::destroy();
        }

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
