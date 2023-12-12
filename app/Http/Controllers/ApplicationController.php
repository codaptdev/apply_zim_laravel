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

            $applications = Application::all()->where('student_id', auth()->user()->id);
            $students = []; // The array of applications sent to the front end

            foreach($applications as $application) {
                $school = School::all()->find($application->school_id);
                $school['date_applied'] = date_format($application->created_at, 'D d M y');;
                $students[] = $school;
            }

            return view("students.applications", [
                'schools' => $students,
            ]);

        } else {

            // For Schools

            $applications = Application::all()->where('school_id', auth()->user()->id)->all();
            $students = []; // The array of students sent to the front end

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
        $school = School::find( $request->school_id );

        if(auth()->user()->user_type != 'STUDENT') {
            return redirect()->back()->with('error','Only student accounts can apply to schools');
        }

        // Check if school exists!
        if( $school != null) {

            // Check if appliction does not exis
            $application = Application::all()->where('school_id', $request->school_id)
            ->where('student_id', auth()->user()->id)
            ->first();

            if( $application == null ) {
                // Create the application
                $application = new Application();
                $application->student_id = auth()->user()->id;
                $application->school_id = $request->school_id;

                $application->save();


                return redirect($school->application_url);

            } else {
                return redirect($school->application_url);
            }
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
    public function destroy(Application $application, int $id)
    {
        if(auth()->user()->user_type == 'STUDENT') {

            // dd('Tried to delete application with school: ' . $id);

            Application::where('school_id', $id)
            ->where('student_id', auth()->user()->id)

            ->delete();


            $school = School::find($id);

            return redirect('/applications')->with('notice', 'Application to ' . $school->name . ' was deleted successfully');

        } else {

            $application = Application::all()
            ->where('student_id', $id)
            ->where('school_id', auth()->user()->id)
            ->firstOrFail();

            $application->delete();
            $student = School::find($id);

            return redirect()->back()->with('notice', 'Application from ' . $student->first_name . ' was deleted successfully ');

        }
    }
}
