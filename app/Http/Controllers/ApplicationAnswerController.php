<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationAnswerController extends Controller
{
    /** returns a form for the student to fill out */

    public function create() {
        return view('applications.repond.form');
    }
}
