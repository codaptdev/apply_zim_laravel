<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('schools.index', compact('school'));
        }

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
            'confirm-password' => ['required', 'same:password'],
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
    public function show(Request $request)
    {
        $schools = [];

        if (strtoupper($request->name) == 'ALL') {
            $schools = School::all();
            $query = $request->name;
            return view('students.search', compact('query', 'schools'));
        }

        if($request->name !== null) {
            $model = new School();
            $schools = $model->searchLike($request->name);
            $query = $request->name;
        } else {
            $query = '';
        }

        return view('students.search', compact('query', 'schools'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        $school = School::all()->where('id', auth()->user()->id)->first();
        $cities = $this->cities;
        return view('schools.edit', compact('school', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'address' => 'required',
            'town_city' => 'required',
            'year_established' => 'required|numeric',
        ]);


        $school = School::all()->where('id', auth()->user()->id)->first();

        $school->id = auth()->user()->id;
        $school->name = $request->name;
        $school->year_established = $request->year_established;
        $school->level =  strtoupper($request->level);
        $school->town_city = $request->town_city;
        $school->address = $request->address;
        $school->update();

        return redirect('/myschool')->with('message','Your school information was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }

    public function myschool()

    {

        if(auth()->user()->user_type == 'SCHOOL') {

            $school = School::all()->where('id', auth()->user()->id)->first();
            return view('schools.myschool', [
                'school' => $school
            ]);
        } else {
            return redirect('/home');
        }
    }
}
