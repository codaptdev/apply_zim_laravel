<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */


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


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("auth.create_school", [
            "cities" => $this->cities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password'=> 'required',
            'address' => 'required',
            'town_city' => 'required',
            'year_established' => 'required|numeric',
        ]);

        $user = new User([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'user_type' => 'SCHOOL',
        ]);

        if (User::all()->where('email', $request->email)->count() > 0) {

            redirect()->back()->withErrors([
                'This email is already in use'
            ]);
        } else {
            $user->save();
        }


        if (Auth::attempt($request->only(['email','password']))) {

            $school = new School();
            $school->id = auth()->user()->id;
            $school->name = $request->name;
            $school->email = $request->email;
            $school->year_established = $request->year_established;
            $school->level =  strtoupper($request->level);
            $school->town_city = $request->town_city;
            $school->address = $request->address;
            $school->save();
            return redirect('/home');
        } else {
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
