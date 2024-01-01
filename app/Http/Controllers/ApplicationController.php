<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->user_type == 'STUDENT') {

            // For Students
            $student = Student::withUserId(auth()->user()->id);

            $applications = Application::studentsAll($student->id);
            $students_applications = []; // The array of applications sent to the front end

            foreach($applications as $application) {
                $school = School::all()->find($application->school_id);
                $school['date_applied'] = date_format($application->created_at, 'D d M y');;
                $students_applications[] = $school;
            }

            return view("students.applications", [
                'schools' => $students_applications,
            ]);

        } else {

            // For Schools

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

        if(auth()->user()->user_type != 'STUDENT') {
            return redirect()->back()->with('error','Only student accounts can apply to schools');
        }

        $school = School::find( $request->school_id );

        if( $school != null) {

            // Get the student model of the currently logged in account
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
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if(auth()->user()->user_type == 'STUDENT') {

            $student = Student::withUserId(auth()->user()->id);

            Application::find($id, $student->id)
            ->delete();

            $school = School::find($id);

            return redirect('/applications')->with('notice', 'Application to ' . $school->name . ' was deleted successfully');

        } else {

            $school = School::withUserId(auth()->user()->id);

            Application::find($school->id, $id)
            ->delete();

            $student = School::find($id);

            return redirect()->back()->with('notice', 'Application from ' . $student->first_name . ' was deleted successfully ');

        }
    }
}
