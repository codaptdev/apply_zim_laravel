<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Student;
class AuthUserHomePageController extends Controller

{

    /** Returns an appropriate view based on a user's account type.*/
    public function index(Request $request) {
        if(auth()->user()->user_type == 'STUDENT') {
            return $this->studentsHomeHelper($request);

        } else {
            return $this->schoolsHomeHelper($request);
        }
    }

    /** Helper function that  Returns the students home view */
    private function studentsHomeHelper(Request $request) {
        $student = Student::find(auth()->user()->id);

        $school_model = new School();
        $schools= $school_model->filter($request->key ?? '', $request->value ?? '');

        return view('students.home', [
            'greeting' => $this->greeting($student->first_name),
            'schools' => $schools,
            'filter_message' => $this->filterMessageHelper($request->key ?? '', $request->value ?? ''),
            'key' => $request->key ?? '',
        ]);
    }

    /** Helper function that Returns the schools `myschool` home page */
    private function schoolsHomeHelper(Request $request) {
        return redirect('/myschool');
    }

    /** Generate a greeting based on the time of day */
    private function greeting(string $name) : string {
        $hour = now()->format('H');
        $period_of_day = '';

        if ($hour < 12) {
            $period_of_day = 'Morning ';
        } else if ($hour >= 12 and $hour < 16) {

            $period_of_day = 'Afternoon ';
        } else {

            $period_of_day = 'Evening ';
        }

        $greeting = 'Good ' . $period_of_day . $name;

        return $greeting;

    }

    /** A helper that generates a filter message based on the query params passed */
    private function filterMessageHelper(string $key, string $value) {

        $out_str = '';

        switch ($key) {
            case 'level':
                $out_str = 'Filtering by ' . $value  . ' Schools';
                break;
            case 'town_city':
                $out_str = 'Filtering by Schools In ' . $value;
                break;
            case '':
                $out_str  = 'Suggested Schools Based On Your Grade';
                break;
            default:
                $out_str  = "Invalid Filter with key: '" . $key . "'";
                break;
        }

        return $out_str;
    }
}
