<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        return view('guest.index');
    }

    public function register() {
        return view('guest.register');
    }

    public function about(Request $request) {
        return view('guest.about');
    }
}
