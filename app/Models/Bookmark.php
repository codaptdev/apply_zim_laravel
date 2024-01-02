<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    public static function find(int $school_id, int $student_id) {
        $application = static::all()
        ->where('student_id', $student_id)
        ->where('school_id', $school_id)
        ->first();

        return $application;
    }

    public static function findAndDelete(int $school_id, int $student_id) {
        static::where('student_id', $student_id)
        ->where('school_id', $school_id)
        ->delete();
    }

    protected $fillable = [
        'school_id',
        'student_id'
    ];

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
        $bookmarks = static::all()
        ->where('student_id', $student_id);

        foreach($bookmarks as $bookmark) {
            $school = School::all()->find($bookmark->school_id);
            $bookmark['date_marked'] = date_format($bookmark->created_at, 'D d M y');
            $bookmark['school'] = $school;
        }

        return $bookmarks;
    }


}

