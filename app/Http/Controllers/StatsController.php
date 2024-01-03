<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\ProfileVisit;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    // Get all the stats for a school
    public function index() {
        $school = School::withUserId(auth()->user()->id);

        $profile_visits_count = $this->getProfileVisits($school);

        $city_data = $this->getCitiesThatVistedProfile($school);
        $city_counts = $city_data['counts'];
        $city_names = $city_data['cities'];
        $max_city = $city_names[$city_data['max_index']];

        // Profile visits number
        return view('stats.index', compact('profile_visits_count', 'city_counts', 'city_names', 'max_city'));
    }

    private function getProfileVisits(School $school) : int {

        $profileVisits = ProfileVisit::all()
        ->where('school_id', $school->id);

        return $profileVisits->count();
    }

    /** Returns an array with cities and the number of times student's from them have visited them **/
    private function getCitiesThatVistedProfile(School $school ) {

        // Get all profileVisits by authenticated students
        $profile_visits = ProfileVisit::all()
        ->where('school_id', $school->id)
        ->where('student_id', '!=', null);

        $counts = [];
        $cities = [];
        $max_index = 0;
        $max_count = 0;

        foreach ($profile_visits as $visit)  {

            $student = Student::find($visit->student_id);
            $city = $student->town_city;

            if(array_key_exists($city, $counts)) {
                $counts[$city] += 1;
            } else {
                $cities[] = $city;
                $counts[$city] = 1;
            }

        }

        foreach ($cities as $key => $city) {
            $count = $counts[$city];
            if($count > $max_count) {
                $max_count = $count;
                $max_index = $key;
            }
        }

        return [
            'counts' => $counts,
            'cities' => $cities,
            'max_index' => $max_index
        ];

    }
}
