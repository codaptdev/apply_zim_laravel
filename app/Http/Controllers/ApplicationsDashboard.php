<?php

namespace App\Http\Controllers;

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
                $student = Student::find($application->student_id);
                $student['date_applied'] = date_format($application->created_at, 'D d M y');
                $students[] = $student;
            }

            return view("schools.applications", [
                'students' => $students,
            ]);
    }
}
