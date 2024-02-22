<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationQuestion extends Model
{
    use HasFactory;

    /** Returns the number of questions for a schools form
     * given a `schools id`
     */
    public static function count(int $school_id) : int {
        $questions = static::all()
        ->where('school_id', $school_id);

        return $questions->count();
    }

    /** Get all the questions for a schools form given its `school id` */
    public static function getSchoolsQuestions(int $school_id) {
        return static::all()
        ->where('school_id', $school_id);
    }

    /** Returns the reponse types for questions */
    public static function response_types () {
        // return ['Integer','Text','Image','Boolean', 'File'];
        return ['Integer','Text','Boolean', 'Date'];
    }

    // public static function getEnumForResponseType() {

    // }

    public function answers() {
        return $this->hasMany(ApplicationAnswer::class);
    }

    public function answersFor($application_id, $student_id) {
        return $this->answers
        ->where('application_id', $application_id)
        ->where('student_id', $student_id);
    }
}
