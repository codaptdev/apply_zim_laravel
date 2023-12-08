<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function edit() {
        return view('schools.logo');
    }

    public function update(Request $request) {
        dd($request->file('logo'));
    }
}
