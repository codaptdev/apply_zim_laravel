<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationQuestionController extends Controller
{
    public function create() {
        return view('applications.dashboard.create-form');
    }

    public function edit() {
        return view('applications.dashboard.edit-form');
    }
}
