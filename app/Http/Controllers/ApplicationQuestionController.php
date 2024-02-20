<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\ApplicationQuestion;

class ApplicationQuestionController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'label' => ['required']
        ]);

        $question = new ApplicationQuestion();
        $school = School::withUserId(auth()->user()->id);

        $question->label = $request->label;
        $question->placeholder = $request->placeholder ?? '';
        $question->response_type = $request->response_type;
        $question->school_id = $school->id;

        // dd($question);

        $question->save();

        return redirect('/applications/dashboard/forms/edit');
    }

    public function edit() {

        $reponse_types = ApplicationQuestion::response_types();

        $school = School::withUserId(auth()->user()->id);
        $questions = ApplicationQuestion::getSchoolsQuestions($school->id);
        return view('applications.dashboard.edit-form', compact('questions', 'school', 'reponse_types'));
    }

    public function destroy($question_id) {
        $question = ApplicationQuestion::all()->find($question_id);
        $question->delete();

        return redirect()->back()->with('notice', 'Question was deleted');
    }

    public function preview() {
        $school = School::withUserId(auth()->user()->id);
        $questions = $school->application_questions;

        return view('applications.dashboard.preview', compact('school', 'questions'));
    }
}
