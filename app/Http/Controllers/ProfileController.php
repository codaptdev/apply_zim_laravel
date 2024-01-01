<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
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

        return redirect('/myschool')->with('message', 'Your profile was updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
