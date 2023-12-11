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
    public function show(Profile $profile)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {

        if (auth()->user()->user_type == 'STUDENT') {
            return redirect('/home');
        }

        $school = School::find(auth()->user()->id);

        return view("profiles.edit", [
            'school' => $school
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
