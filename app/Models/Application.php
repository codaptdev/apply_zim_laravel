<?php

namespace App\Models;

use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'student_id',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }

    /**
     * Takes positional arguements `school_id` and a `student_id`
     *
     * Return true if an application already exists.
     *
     * Returns false if the the application doesn't exists
     */
    public static function exists(int $school_id, int $student_id) {

        $applications = static::all()
        ->where('student_id', $student_id)
        ->where('school_id', $school_id);

        return $applications->count() > 0;
    }

    /** Get a specific application by the student's id and school's id */
    public static function find(int $school_id, int $student_id) {
        $application = static::all()
        ->where('student_id', $student_id)
        ->where('school_id', $school_id)
        ->first();

        return $application;
    }

    public static function schoolsAll(int $school_id) {
        return static::all()
        ->where('school_id', $school_id);
    }

    public static function studentsAll(int $student_id) {
        return static::all()
        ->where('student_id', $student_id);
    }

    public static function findAndDelete(int $school_id, int $student_id) {
        static::where('student_id', $student_id)
        ->where('school_id', $school_id)
        ->delete();
    }
}
