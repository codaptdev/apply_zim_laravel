<?php

namespace App\Http\Controllers;

use App\Models\ApplicationAnswer;
use App\Models\School;
use App\Models\Student;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationsDashboard extends Controller
{
    public function index() {
        return view('applications.dashboard.index');
    }

    public function history() {
        $school = School::withUserId(auth()->user()->id);

            $applications = Application::schoolsAll($school->id);

            /* Will hold the array of students who have made applications */
            $students = [];

            foreach($applications as $application) {
                $application['date_applied'] = date_format($application->created_at, 'D d M y');
            }

            return view("schools.applications", [
                'applications' => $applications
            ]);
    }

    public function history_index($application_id) {

        $application = Application::find($application_id);
        $questions = $application->school->application_questions;

        foreach ($questions as $key => $question) {
            $answer = ApplicationAnswer::all()
            ->where('question_id', $question->id)
            ->where('application_id', $application_id)
            ->first();

            $question['answer'] = $answer;

        }


        return view('applications.dashboard.history_index', compact('application', 'questions'));

    }
}
