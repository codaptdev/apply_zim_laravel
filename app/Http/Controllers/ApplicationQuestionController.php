<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\ApplicationQuestion;

class ApplicationQuestionController extends Controller
{
    public function create() {
        return view('applications.dashboard.create-form');
    }

    public function edit() {

        // check if form exists

        $school = School::withUserId(auth()->user()->id);

        $questions = ApplicationQuestion::getSchoolsQuestions($school->id);

        if ($questions->count() > 0) {
            return view('applications.dashboard.edit-form', compact('questions', 'school'));
        } else {
            return redirect('/applications/dashboard/forms/create')
            ->with('notice', 'You will need to create a form first before you can edit one');
        }

    }
}
