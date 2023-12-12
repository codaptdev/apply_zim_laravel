<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Student;
use PhpParser\Parser;
use Ramsey\Uuid\Type\Integer;

class HomePageController extends Controller
{
    public function index(Request $request) {
        if(auth()->user()->user_type == 'STUDENT') {
            $student = Student::find(auth()->user()->id);

            $school_model = new School();
            $schools= $school_model->filter($request->key ?? '', $request->value ?? '');

            return view('students.home', [
                'greeting' => $this->greeting($student->first_name),
                'schools' => $schools,
                'filter_message' => $this->filterMessage($request->key ?? '', $request->value ?? ''),
                'key' => $request->key ?? '',
            ]);

        } else {
            $this->schoolsHome();
        }
    }

    // Example request home?key=town_city&value=Harare
    public function studentsHome(Request $request) {
        $student = Student::find(auth()->user()->id);

        $school_model = new School();
        $schools= $school_model->filter($request->key ?? '', $request->value ?? '');

        return view('students.home', [
            'greeting' => $this->greeting($student->first_name),
            'schools' => $schools
        ]);
    }

    public function schoolsHome() {
        return view('schools.home');
    }

    public function greeting(string $name) : string {
        $hour = now()->format('H');
        $period_of_day = '';

        if ($hour >= 12) {
            $period_of_day = 'Afternoon ';
        } else {
            $period_of_day = 'Morning ';
        }

        $greeting = 'Good ' . $period_of_day . $name;

        return $greeting;

    }

    public function filterMessage(string $key, string $value) {

        $out_str = '';

        switch ($key) {
            case 'level':
                $out_str = 'Filtering by ' . $value  . ' Schools';
                break;
            case 'town_city':
                $out_str = 'Filtering by Schools In ' . $value;
                break;
            case '':
                $out_str  = 'All Schools';
                break;
            default:
                $out_str  = "Invalid Filter with key: '" . $key . "'";
                break;
        }

        return $out_str;
    }
}
