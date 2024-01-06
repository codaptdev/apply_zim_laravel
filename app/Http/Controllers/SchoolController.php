<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use App\Models\Student;
use App\Models\Bookmark;
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

        $user->save();

        if (Auth::attempt($request->only(['email','password']))) {

            $school = new School();
            $school->user_id = auth()->user()->id;
            $school->name = $request->name;
            $school->email = $request->email;
            $school->year_established = $request->year_established;
            $school->level =  strtoupper($request->level);
            $school->town_city = $request->town_city;
            $school->address = $request->address;
            $school->save();
            return redirect('/myschool')->with('message', 'Welcome ' .$school->name . '. We are glad to have you on board');
        } else {
            return redirect()->back()->withError('Sorry something went wrong try again');
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
        $school = School::withUserId(auth()->user()->id);
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


        $school = School::withUserId(auth()->user()->id);

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
        $school = School::withUserId(auth()->user()->id);
        return view('schools.myschool', [
            'school' => $school
        ]);
    }
}
