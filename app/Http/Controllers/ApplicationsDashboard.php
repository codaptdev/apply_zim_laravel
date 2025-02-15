<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicationAnswer;
use App\Models\ApplicationQuestion;

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

    /** Returns a view with the reponses of a student to an application form */
    public function history_index($application_id) {

        $application = Application::find($application_id);
        $questions = ApplicationQuestion::questionAndAnswersFor($application_id);

        return view('applications.dashboard.history_index', compact('application', 'questions'));

    }
}
