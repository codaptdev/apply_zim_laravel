<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /** ### Index Route
     *
     * Redirects the user to the appropriate page based on their
     * authentication state.
    */
    public function index() {

        if(auth()->guest()) {
            return redirect('/guest');
        } else {
            return redirect('/home');
        }
    }
}
