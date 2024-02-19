<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicationAnswer;

class ApplicationAnswerController extends Controller
{
    /** returns a form for the student to fill out */

    public function create(Request $request) {

        $school = School::find($request->school_id);
        $questions = $school->application_questions;

        return view('applications.respond.form', compact('school', 'questions'));
    }

    public function store(Request $request) {
        $school = School::find($request->school_id);
        $questions = $school->application_questions;
        $application = new Application();

        $application->student_id = auth()->user()->id;
        $application->school_id = $request->school_id;

        $application->was_internal = true;


        $application->save();

        foreach ($questions as $key => $question) {
            $answer = new ApplicationAnswer();

            $answer->question_id = $question->id;
            $answer->response = $request[$this->to_snake_case($question->label)];
            $answer->application_id = $application->id;

            $answer->save();
        }


        return redirect('/schools/' . $school->id)->with('message', 'School application successfully made to ' . $school->name);

    }

    // Return snake case
    public function to_snake_case ($str) {
        $out_str = '';

        foreach (str_split($str) as $key => $char) {
            if($char == ' ') {
                $out_str = $out_str . '_';
            } else {
                $out_str = $out_str . $char;
            }
        }

        return $out_str;
    }
}
