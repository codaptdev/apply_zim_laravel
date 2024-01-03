<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $cities = [
        "Harare",
        "Bulawayo",
        "Chitungwiza",
        "Mutare",
        "Gweru",
        "Kwekwe",
        "Zvishavane",
        "Ruwa",
        "Epworth",
        "Masvingo",
        "Marondera",
        "Norton",
        "Bindura",
        "Hwange",
        "Beitbridge",
        "Gwanda",
        "Chinhoyi",
        "Kariba",
        "Kadoma",
        "Rusape",
        "Plumtree",
    ];

    /** Get a school by its name */
    public function index(string $name)
    {
        $school = School::all()->where('name' , $name)->first();

        if($school === null) {
            return view('schools.404', [
                'isId' => false,
                'nameOrId' => $name
            ]);
        } else {
            return view('schools.index', compact('school'));
        }
    }

    /** Get a school by its id */
    public function indexWithID($id)
    {
        $school = School::find( $id );



        if($school === null) {
            return view('schools.404', [
                'isId' => true,
                'nameOrId' => $id
            ]);
        } else {

            if(auth()->guest()) {
                return view('schools.index', compact('school'));
            }

            if(auth()->user()->user_type === 'STUDENT') {
                $student = Student::withUserId(auth()->user()->id);
                $is_bookmarked = Bookmark::exists($id, $student->id);
                return view('schools.index', compact('school', 'is_bookmarked'));
            } else {
                return view('schools.index', compact('school'));
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        if (auth()->user()->user_type == 'STUDENT') {
            return redirect('/home');
        }

        $school = School::withUserId(auth()->user()->id);;
        $fallBack = $request->headers->get('referer');

        return view("profiles.edit", [
            'school' => $school,
            'fall_back' => $fallBack
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'tuition_min' => ['required', 'numeric', 'min:0'],
            'tuition_max' => ['required', 'numeric', 'min:0'],
        ]);

        $school = School::withUserId(auth()->user()->id);;

        $school->about = $request->about;
        $school->body = $request->body;
        $school->website_url = $request->website_url;
        $school->application_url = $request->application_url;
        $school->instagram = $request->instagram;
        $school->facebook = $request->facebook;
        $school->twitter = $request->twitter;
        $school->application_process = $request->application_process;
        $school->tuition_min = $request->tuition_min;
        $school->tuition_max = $request->tuition_max;

        $school->update();

        return redirect('/schools/'. $school->id)->with('message', 'Your profile was updated successfully');
    }
}
