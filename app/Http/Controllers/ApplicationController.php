<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicationQuestion;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->user_type == 'STUDENT') {

            $student = Student::withUserId(auth()->user()->id);
            $applications = Application::studentsAll($student->id);

            return view("students.applications", [
                'applications' => $applications->all(),
                'student' => $student
            ]);

        } else {
            return redirect('/applications/dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $school = School::find( $request->school_id );

        if( $school != null) {

            $student = Student::withUserId(auth()->user()->id);

            // Save application attempt if it doesn't exist already
            if(!Application::exists($request->school_id, $student->id)) {
                $application = new Application();
                $application->student_id = $student->id;
                $application->school_id = $request->school_id;
                $application->save();
            }

            return redirect($school->application_url);

        } else {
            return view('schools.404', [
                'nameOrId' => $request->school_id,
                'isId' => true,
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $application_id)
    {
        $student = Student::withUserId(auth()->user()->id);

        $application = Application::all()->find($application_id);

        $school = School::find($application->school_id);

        $application->delete();

        return redirect('/applications')->with('notice', 'Application to ' . $school->name . ' was deleted successfully');
    }

    /** Returns a view with details about a student's application to a school */
    public function student_application_index($application_id) {
        $application = Application::find($application_id);
        $questions = ApplicationQuestion::questionAndAnswersFor($application_id);

        return view('students.application_index', compact('application', 'questions'));
    }
}
