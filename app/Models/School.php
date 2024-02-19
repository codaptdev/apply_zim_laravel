<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    use HasFactory;

    public function searchLike(string $search) {
        return $this->where("name","LIKE","%". $search ."%")
        ->get();
    }

    /** Returns a filtered list of schools
     *
     * If the `$key` param is an empty string it will return all schoools
     */
    public function filter(string $key = '', string $value = '') {

        if($key == '') {
            $student = Student::withUserId(auth()->user()->id);
            return $this->all()->where('level', $student->level)->shuffle();
        } else {
            return $this->all()->where($key, $value)->shuffle();
        }
    }

    // Relationship with the user account that created the school account
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Refference to applications for made by students
    public function applications() {
        return $this->hasMany(Application::class);
    }

    public function gallery_items() {
        return $this->hasMany(SchoolGalleryItem::class);
    }

    public static function withUserId(int $user_id) {
        return self::all()
        ->where("user_id", $user_id)
        ->first();
    }

    public function application_questions() {
        return $this->hasMany(ApplicationQuestion::class);
    }

    /** Returns true if the school has any application questions */
    public function has_application_questions() {
        return $this->application_questions->count() > 0;
    }

    public function hasApplied($student_id) {
        $applications = Application::where('school_id', $this->id)
        ->where('student_id', $student_id)
        ->get();

        return $applications->count() > 0;
    }

    public function hasNotApplied($student_id) {
        return $this->hasApplied($student_id) == false;
    }

    public function userHasNotApplied($user_id) {
        return $this->hasNotApplied(Student::withUserId($user_id)->id);
    }
}
