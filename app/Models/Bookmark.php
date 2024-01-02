<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $primaryKey = ['school_id','student_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }



    /** Check if a bookmark exists given a school and student id */
    public static function exists(int $school_id, int $student_id): bool
    {
        $bookmarks = static::all()
            ->where('school_id', $school_id)
            ->where('student_id', $student_id);

        return $bookmarks->count() > 0;
    }

    public static function forStudentWithId($student_id) {
        $applications = static::all()
        ->where('student_id', $student_id);

        foreach($applications as $application) {
            $school = School::all()->find($application->school_id);
            $application['created_at'] = date_format($application->created_at, 'D d M y');
            $application['school'] = $school;
        }

        return $applications;
    }
}

