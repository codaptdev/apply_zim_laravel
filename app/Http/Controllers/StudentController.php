<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
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
    public function create()
    {
        return view("auth.create_student", [
            "cities" => $this->cities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password'=> 'required',
            'first_name' => 'required',
            'town_city' => 'required',
            'surname' => 'required',
            'confirm-password' => ['required', 'same:password'],
        ]);

        $user = new User([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->first_name . ' ' . $request->surname,
            'user_type' => 'STUDENT',
        ]);

        // Create a user record in the database
        $user->save();

        // Sign in and Create a student record in the database
        if (Auth::attempt($request->only(['email','password']))) {

            $student = new Student();
            $student->user_id = auth()->user()->id;
            $student->first_name = $request->first_name;
            $student->email = $request->email;
            $student->surname = $request->surname;
            $student->level =  strtoupper($request->level);
            $student->town_city = $request->town_city;

            $student->save();
            return redirect('/home')->with('message', 'Welcome ' .$student->first_name . '. We are glad to have you on board');
        } else {
            return redirect()->back()->withError('Sorry, Something went wrong. Please try again');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
