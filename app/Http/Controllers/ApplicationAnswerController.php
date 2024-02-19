<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class ApplicationAnswerController extends Controller
{
    /** returns a form for the student to fill out */

    public function create(Request $request) {

        $school = School::find($request->school_id);
        $questions = $school->application_questions;

        return view('applications.repond.form', compact('school', 'questions'));
    }
}
